<?php 
include_once("../Model/mArticulo.php");
$registro = new Articulo;

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$autor = $_POST['autor'];
$contenido = $_POST['contenido'];
$tcr = $_POST['tcr'];
$fecha = $_POST['fecha'];
$id = $_POST['id'];
$nimg =(!empty($_POST['filename']))?$_POST['filename']:$_FILES['fname']['name'];

try {
  if(isset($_FILES)){
    move_uploaded_file($_FILES['fname']['tmp_name'],"../../../upload/Imagenes/".$_FILES['fname']['name']);
    if(isset($_POST['filename'])){
        unlink("../../../upload/Imagenes/".$_POST['filename']);
    }
  }
  $registro->UpdateArticulo($titulo, $subtitulo, $autor, $contenido, $tcr, $fecha, $id, $nimg);
    header("location: /pages/admon/admin.php?a=UpdateArticulo&msg=3");
} catch (\Throwable $th) {
  header("location: /pages/admon/admin.php?a=UpdateArticulo&msg=0");
}
?>