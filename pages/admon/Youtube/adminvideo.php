<?php 
include_once("Model/mVY.php");
$video = new Video;

if($_POST){
  $_SESSION['tipo']=$_POST['ltipo'];
}else{
  $_SESSION['tipo']=(isset($_SESSION['tipo']))?$_SESSION['tipo']:1;
}

if (isset($_GET['a'])) {
  $video->Bvideo($_GET['a']);
}


if(isset($_SESSION['msg'])){
  switch($_SESSION['msg']){
    case 2:
      ?><div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Registro <strong>Agregado</strong>  Exitosamente</div><?php
      $_SESSION['msg']=NULL;
      break;
    case 3:
      ?><div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Actualizado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
      break;
    case 4:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Eliminado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 6:
      ?><div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Infomacion!</strong>Se ha agregado un registro con imagen</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 7:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Infomacion!</strong>Se ha agregado solo el Evento, se debe agregar una imagen!!!</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 9:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Eliminado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
    break;
  }
}
?>
<div class="d-flex">
  <div class="col-9">
  <h2>Administrar Videos de YouTube</h2>
    <form method="POST" action="Youtube/crudVideo.php" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="titulo" class="col-3 col-form-label">Titulo del video</label>
        <input type="text" name="titulo" class="form-control col-9" value="<?php $video->gTitulo(); ?>">
      </div>

       <div class="form-group row">
        <label for="tipo" class="col-3 col-form-label">Tipo</label>
        <input type="text" name="tipo" class="col-9 form-control" value="<?php $video->gTipo(); ?>">
      </div>


      <div class="form-group row">
        <label for="url" class="col-3 col-form-label">Url de YouTube</label>
        <input type="text" name="url" class="col-9 form-control" value="<?php $video->gVurl(); ?>"> 
        <input type="hidden" name="id" id="idvideo" value="<?php $video->gId(); ?>">
        <input type="hidden" name="action" class="form-control col-9" value="3">
      </div>

      <div class="form-group row">
        <div class="col-sm-12 d-flex justify-content-between">
          <a href="crudVideo.php?action=4&id=<?php $video->gId(); ?>"  class="btn btn-success btn-lg">Eliminar</a>
          <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
        </div>
      </div>

      </form>
  </div>

<div class="col-3">
<div class="container">
<form action="" method="post">
<div class="form-group row">
    <select name="ltipo" id="ltipo" class="col-12 form-control" >
      <option value=1>Parasha</option>
      <option value=2>Segula</option>
      <option value=3>Articulo</option>
      <option value=4>Receta</option>
      <option value=5>Tziniut</option>
    </select>
    <button type="submit" class="btn btn-primary btn-lg col-12">Listar</button>
  </div>
</div>

</form>
<?php 
$video->Listado($_SESSION['tipo']);
?>
</div>
</div>
