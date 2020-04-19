<?php 
include_once("Model/mMultimedia.php");

$archivo = new Multimedia;

if (!isset($_POST['clase'])){
  $_POST['clase']=1;
  $tipo = 1;
}else{
  $tipo=$_POST['clase'];
}

if($_FILES){
  $archivo->Vfile($_FILES['archivo']['name']);
  if($_POST['name']!=''){
    $nfile = $_POST['name'].$archivo->ext;
    //echo "digitado-".$nfile;
  }else{
    $nfile =  $_FILES['archivo']['name'];
    //echo "auto-".$nfile;
  }
  $titulo = (!isset($_POST['titulo'])?NULL:$_POST['titulo']);
  $tipo = $archivo->Vfile($_FILES['archivo']['name']);
  $descripcion = (!isset($_POST['descripcion'])?NULL:$_POST['descripcion']);
  $ntf= $_FILES['archivo']['tmp_name'];
  $dir=(!isset($_POST['direccion']))?NULL:$_POST['direccion'];
  $categoria=$_POST['tipo'];
  $archivo->Mfile($nfile, $titulo, $descripcion, $categoria, $tipo,$dir,$ntf);
}
?>

<div class="container cartag">
  <form action="" method="post">
  <div class="form-group row">
     <h2 class="col-6">Agregar <?php 
     switch ($_POST['clase']){
       case 1:
        $a= "contenido Multimedia";
       break;
       case 2:
        $a="Foto a Galeria";
       break;
       case 3:
        $a="un Lugar";
       break;
     } echo $a;
     ?></h2>
    <select name="clase" class="col-3 form-control">
      <option value=0></option>
      <option value=1>Articulo</option>
      <option value=2>Galeria</option>
      <option value=3>Lugar</option>    
    </select>
    <button type="submit" class="col-3 btn btn btn-outline-success btn-sm">Generar Formulario</button>
  </div>

  </form>


<form method="POST" action="" enctype="multipart/form-data">

<div class="form-group row">
    <label for="name" class="col-3 col-form-label">Nombre del Archivo</label>
    <input type="text" name="name" class="form-control col-9">
  </div>


  <div class="form-group row">
    <label for="tipo" class="col-3 col-form-label">Categoria del Contenido</label>
    <select name="tipo" class="col-9 form-control">
      <?php if($_POST['clase']==2){?>
      <option value=6 selected="selected">Galeria</option>
      <?php };
      if($_POST['clase']==3){?>
      <option value=7 selected="selected">Lugar</option>
      <?php };
      if($_POST['clase']==1){?>
      <option value=1>Parasha</option>
      <option value=2>Segula</option>
      <option value=3>Emuna y Bitajon</option>
      <option value=4>Receta</option>
      <option value=5>Tziniut</option>
      <?php }?>
    </select>
  </div>
  <?php if($_POST['clase']!=2){ ?>
  <div class="form-group row">
  <label for="titulo" class="col-3 col-form-label">Titulo</label>
  <input type="text" name="titulo" class="col-9 form-control">
  </div>

  <div class="form-group row">
  <label for="descripcion" class="col-3 col-form-label">Descripción</label>
  <input type="text" name="descripcion" class="col-9 form-control">
  </div>
<?php } 

 if($_POST['clase']==3){
?>
  <div class="form-group row">
  <label for="direccion" class="col-3 col-form-label">Dirección</label>
  <input type="text" name="direccion" class="col-9 form-control">
  </div>
<?php
 }
?>


  <div class="form-group row">
    <label for="archivo" class="col-3 col-form-label">Seleccione el archivo</label>
    <input type="file" class="col-9 form-control" name="archivo" />
  </div>

  <div class="form-group row">
    <div class="col-sm-12 d-flex justify-content-between">
      <a href="?a=adminmultimedia"  class="btn btn-success btn-lg">Listar Medios</a>
      <button type="submit" class="btn btn-primary btn-lg">Guardar Medio</button>
    </div>
  </div>

  </form>
</div>
