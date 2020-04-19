<?php 
include_once("../Model/mMultimedia.php");
$registro = new Multimedia;

$categoria = (isset($_POST['contenido']))?$_POST['contenido']:NULL;
$tipo = (isset($_POST['tipo']))?$_POST['tipo']:NULL;
$nombre =(isset($_POST['name']))?$_POST['name']:$_FILES['archivo']['name'];
$titulo = (isset($_POST['titulo']))?$_POST['titulo']:NULL;
$descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:NULL;
$dir = (isset($_POST['dir']))?$_POST['dir']:NULL;
$idarchivo = (isset($_POST['id']))?$_POST['id']:NULL;
var_dump($_FILES);
try {
  if(!empty($_FILES['archivo']['name'])){
    $ruta=$registro->gRuta($tipo);
    move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta.$_FILES['archivo']['name']);
    if(!empty($_POST['name'])){
      unlink($ruta.$_POST['name']);
    }
  }
  $registro->UpMultimedia($categoria, $tipo, $nombre, $titulo, $descripcion, $dir, $idarchivo);
  header("location: /pages/admon/admin.php?a=adminmultimedia&msg=3");
  } catch (\Throwable $th) {
    header("location: /pages/admon/admin.php?a=adminmultimedia&msg=0");
  }

?>