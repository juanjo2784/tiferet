<?php
include_once "apiMultimedia.php";
$article = new Multimedia;
$_SESSION['tipo']=(!isset($_POST['tipo']))?1:$_POST['tipo'];
$_SESSION['contenido'] = (!isset($_POST['contenido']))?6:$_POST['contenido'];
$_SESSION['formulario'] = (!isset($_POST['formulario']))?2:$_POST['formulario'];
if (isset($_GET['a'])) {
    $article->BMultimedia($_GET['a']);
}

function itipo($a){
  switch ($a) {
    case 1:
        $listado = "Lista de Imagenes";
        break;
    case 2:
        $listado = "Lista de Audios";
        break;
    case 3:
        $listado = "Lista de Videos";
        break;
    default:
    $listado = "Debe seleccionar un opción";
  }
  echo $listado;
}
?>

<div class="row ficha">

<div class="col-9">
              <?php
              if (isset($_SESSION['result'])) {
                switch($_SESSION['result']){
                  case 1:
                    echo "<div class='alert alert-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Proceso finalizado sin errores!</strong></div>";
                    $_SESSION['result']=null;
                  break;
                  case 2:
                    echo "<div class='alert danger-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Error! No se pudo terminar el proceso</strong></div>";
                    $_SESSION['result']=null;
                  break;
                  case 3:
                    echo "<div class='alert danger-success alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>No hay resultados en la busqueda</div>";
                    $_SESSION['result']=null;
                  break;
                  default:
                  $_SESSION['result']=NULL;
                }

              }
              ?>
<form method="POST" action="upmultimedia.php" enctype="multipart/form-data" class="container">
<h2>Actualizar <?php $article->txtTipo($_SESSION['tipo']); $article->txtContenido($contenido) ?></h2>

  <div class="form-group row">
    <select name="formulario" id="formulario"  class="col-3 form-control float-right" onchange="Cambiar()">
      <option value=0></option>
      <option value=1>Articulo</option>
      <option value=2>Galeria</option>
      <option value=3>Lugar</option>
    </select>
    <select name="contenido" class="col-3 form-control float-right" id="contenido">
      <option value=0></option>
    </select>
    <select name="tipo" class="col-3 form-control float-right" id="tipo">
      <option value=0></option>
    </select>
    <button type="submit" class="col-3 btn btn btn-outline-success btn-sm">Generar Formulario</button>
  </div>

  <div class="form-group row">
    <label for="name" class="col-3 col-form-label">Nombre del Archivo</label>
    <input type="text" name="name" class="form-control col-9" value="<?php echo $article->gNombre()?>">
  </div>

  <?php if ($_SESSION['formulario'] != 2) {?>
    <div class="form-group row">
    <label for="titulo" class="col-3 col-form-label">Titulo</label>
    <input type="text" name="titulo" class="col-9 form-control" value="<?php $article->gTitulo()?>">
    </div>

    <div class="form-group row">
    <label for="descripcion" class="col-3 col-form-label">Descripción</label>
    <input type="text" name="descripcion" class="col-9 form-control" value="<?php $article->gDescripcion()?>">
    </div>
  <?php } 
  if ($_SESSION['formulario'] == 3) { ?>
    <div class="form-group row">
    <label for="direccion" class="col-3 col-form-label">Dirección</label>
    <input type="text" name="direccion" class="col-9 form-control" value="<?php $article->gDir()?>">
    </div>
  <?php } ?>

  <div class="form-group row">
    <label for="archivo" class="col-3 col-form-label">Seleccione el archivo</label>
    <input type="file" class="col-9 form-control" name="archivo" />
  </div>

  <input type="hidden"  name="id"  value="<?php $article->gIdfile()?>">
  <!--Mostrar contenido multimedia-->
<div>
 <?php 
 $src="/../../upload/".$article->gNombre();
 switch($article->gTipo()){
   case 1:
      echo "<center><img src=".$src."></center>";
   break;
   case 3:
    echo "<center><video src=".$src." width='640' height='480' controls preload='auto'>Tu navegador no soporta MP4.</video></center>";
   break;
   
   case 2:
    echo "<center><audio src=".$src." controls autoplay>Tu navegador no Soporta MP3.</audio></center>";
   break;
 };

 ?>

</div>
  <div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
      <a href="?p=<?php $article->gIdfile();?>&a=delMultimedia"  class="lbnt btn btn-danger btn-lg">Eliminar Articulo</a>
      <button type="submit" class="btn btn-primary btn-lg">Actualizar Articulo</button>
    </div>
  </div>
</form>
</div>

<div class="col-3">
  <div class="container">
    <?php echo "<h4>".itipo($_SESSION['tipo'])." ".$article->txtContenido($_SESSION['contenido'])."</h4>"; $article->Listado($_SESSION['tipo'],$_SESSION['contenido']); ?>
  </div>
</div>

</div>

<script type="text/javascript">
  let opc1 = new Array("Parasha","Segula","Emuna y Bitajon","Receta","Tziniut")
  let opc2 = new Array("Galeria")
  let opc3 = new Array("Lugar")
  let opct1 = new Array("Audio","Video")
  let opct2 = new Array("Imagen")
  let opct3 = new Array("Imagen")

  function Cambiar(){
    let contenido = document.getElementById('formulario').value
    if(contenido){
      let b=parseInt(contenido)
      //primer select
      let ceo = eval("opc"+contenido)
      cant = ceo.length //tamaño del array
      switch(b){
        case 1:
          b=1;
          break;
        case 2:
          b=6;
          break;
        case 3:
          b=7
          break;          
      }
      document.getElementById('contenido').length = cant //cantidad de elementos que se agregaran al selection
      for(i=0; i<cant; i++){
        document.getElementById('contenido').options[i].value=i+b
        document.getElementById('contenido').options[i].text=ceo[i]
      }
      //segundo select
      let ceo2 =eval("opct"+contenido) 
      cant2 = ceo2.length
      c=(cant2==2)?2:1
      document.getElementById('tipo').length = cant2  
      for(j=0; j<cant; j++){
        document.getElementById('tipo').options[j].value=j+c
        document.getElementById('tipo').options[j].text=ceo2[j]
      } 
    }else{
      document.getElementById('tipo').length =1
      document.getElementById('tipo').options[i].value=0
      document.getElementById('tipo').options[i].text="-"      
    }
    document.getElementById('tipo').options[0].selected=true
  }
</script>