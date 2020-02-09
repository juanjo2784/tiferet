<?php 
session_start();
include_once("ApiAdmin.php");

  $titulo = $_POST['titulo'];
  $subtitulo = $_POST['subtitulo'];
  $autor = $_POST['autor'];
  $tipo = $_POST['tipo'];
  $contenido = $_POST['contenido'];
  $tcr = $_POST['tcr'];
  $fecha = $_POST['fecha'];
  $ruta = '../../upload/'.$_FILES['archivo']['name'];
  $ntf= $_FILES['archivo']['tmp_name'];
  $nimg = $_FILES['archivo']['name'];
  print_r($_FILES['archivo']['tmp_name']);
  //move_uploaded_file($ntf,$ruta);
echo $nimg;

  /*$registro = new Admin;

  try{
    $registro->AddArticulo($titulo, $subtitulo, $autor, $tipo, $contenido, $tcr, $fecha,$nimg);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=UpdateArticulo");
  } catch (Exception $e){
      $_SESSION['result']=0;
  }*/

?>