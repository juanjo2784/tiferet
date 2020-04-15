<?php 
//echo getcwd();
include_once("Model/mArticulo.php");

if($_POST){
  $titulo = $_POST['titulo'];
  $subtitulo = $_POST['subtitulo'];
  $autor = $_POST['autor'];
  $tipo = $_POST['tipo'];
  $contenido = $_POST['contenido'];
  $tcr = $_POST['tcr'];
  $fecha = $_POST['fecha'];
  $nimg = $_FILES['archivo']['name'];
  $ntf= $_FILES['archivo']['tmp_name'];
  $ruta = '../../upload/Imagenes/'.$nimg;
   move_uploaded_file($ntf,$ruta);

  $registro = new Articulo;

  try{
    $registro->AddArticulo($titulo, $subtitulo, $autor, $tipo, $contenido, $tcr, $fecha,$nimg);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=UpdateArticulo");
  } catch (Exception $e){
      $_SESSION['result']=0;
  }
}

?>
<div class="container cartag">
<form action="" method="post" enctype="multipart/form-data">
<fieldset><legend class="text-center">Agregar un Articulo de Texto</legend>
<div class="form-group row">
  <label for="titulo" class="col-xs-12  col-lg-2 col-form-label">Titulo</label>
  <div class="col-xs-12  col-lg-10">
    <input type="text" class="form-control col-8 float-left" id="titulo" name="titulo"  placeholder="Titulo 240 caracteres">
    <input type="file" class="form-control col-4" name="archivo" />
  </div>
</div>

<div class="form-group row">
  <label for="subtitulo" class="col-xs-12  col-lg-2 col-form-label">SubTitulo</label>
  <div class="col-xs-12  col-lg-10">
    <input type="text" class="form-control col-8 float-left" id="subtitulo" name="subtitulo"  placeholder="SubTitulo 240 caracteres">
    <input type="date" class="form-control col-4 float-right" id="fecha" name="fecha" value="<?php echo date('Y-m-d') ?>">
  </div>
</div>

<div class="form-group row">
  <label for="Autor" class="col-xs-12  col-lg-2 col-form-label">Autor</label>
  <div class="col-xs-12  col-lg-10">
    <input type="text" class="form-control col-8 float-left" id="autor" name="autor"  placeholder="Nombre del autor, 200 caracteres">
    <select name="tipo" id="tipo"  class="form-control col-4">
      <option value="1">Parasha</option>
      <option value="2">Segula</option>
      <option value="3">Articulo</option>
      <option value="4">Recetas</option>
      <option value="5">Tziniut</option>
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="tcr" class="col-xs-12  col-lg-2 col-form-label">Texto de Derechos de Autor</label>
  <div class="col-xs-12  col-lg-10">
    <textarea rows="2" class="form-control" id="tcr" name="tcr"  placeholder="ingrese el texto que indique las condiciones del Derecho de Autor"></textarea>
  </div>
</div>

<div class="form-group row">
  <label for="tcr" class="col-xs-12  col-lg-2 col-form-label">Contenido</label>
  <div class="col-xs-12  col-lg-10">
    <textarea rows="6" class="form-control" id="contenido" name="contenido"  placeholder="Pegue el texto, se respentaran los parrafos"></textarea>
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-12 d-flex justify-content-between">
    <a href="?a=UpdateArticulo"  class="btn btn-success btn-lg">Listar Articulos</a>
    <button type="submit" class="btn btn-primary btn-lg">Guardar Articulo</button>
  </div>
</div>
</fieldset>
</form>
</div>