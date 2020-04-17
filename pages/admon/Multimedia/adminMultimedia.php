<?php
include_once("Model/mMultimedia.php");
$article = new Multimedia;
$_SESSION['tipo']=(isset($_SESSION['tipo']))?$_SESSION['tipo']:1;
$_SESSION['contenido']=(isset($_SESSION['contenido']))?$_SESSION['contenido']:6;
$_SESSION['formulario']=(isset($_SESSION['formulario']))?$_SESSION['formulario']:6;

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
  include_once('Config/msg.php');
  ?>
<form method="POST" action="vardatos.php" class="container">
<h2>Actualizar <?php $article->txtTipo($_SESSION['tipo']); $article->txtContenido($_SESSION['contenido']) ?></h2>

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
</form>
  
<form method="POST" action="upMultimedia.php" enctype="multipart/form-data" class="container">
  <div class="form-group row">
  <input type="hidden" name="tipo" value="<?php echo $_SESSION['tipo']?>">
  <input type="hidden" name="contenido" value="<?php echo $_SESSION['contenido']?>">
    <input type="text" name="name" class="form-control col-6" value="<?php echo $article->gNombre()?>" placeholder="Nombre">
  </div>

  <?php if ($_SESSION['formulario'] != 2) {?>
    <div class="form-group row">
    <input type="text" name="titulo" class="col-6 form-control" value="<?php $article->gTitulo()?>"  placeholder="Titulo">
    </div>

    <div class="form-group row">
    <input type="text" name="descripcion" class="col-6 form-control" value="<?php $article->gDescripcion()?>"  placeholder="Descripción">
    </div>
  <?php } 
  if ($_SESSION['formulario'] == 3) { ?>
    <div class="form-group row">
    <input type="text" name="direccion" class="col-6 form-control" value="<?php $article->gDir()?>"  placeholder="Dirección">
    </div>
  <?php } ?>

  <div class="form-group row">
    <input type="file" class="col-6 form-control" name="archivo" />
  </div>

  <input type="hidden"  name="id"  value="<?php $article->gIdfile()?>">
  <!--Mostrar contenido multimedia-->
<div>
 <?php 
 switch($article->gTipo()){
   case 1:
    $src="/../../upload/Imagenes/".$article->gNombre();
      echo "<center><img src=".$src." max-height='240'></center>";
   break;
   case 3:
    $src="/../../upload/Videos/".$article->gNombre();
    echo "<center><video src=".$src." width='320' height='240' controls preload='auto'>Tu navegador no soporta MP4.</video></center>";
   break;
   
   case 2:
    $src="/../../upload/Audio/".$article->gNombre();
    echo "<center><audio src=".$src." controls autoplay>Tu navegador no Soporta MP3.</audio></center>";
   break;
 };

 ?>

</div>
  <div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
      <a href="?p=<?php $article->gIdfile();?>&a=delMultimedia"  class="lbnt btn btn-danger btn-lg">Eliminar</a>
      <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
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