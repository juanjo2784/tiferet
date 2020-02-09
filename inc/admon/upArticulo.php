<?php 
session_start();
include_once("ApiAdmin.php");
$registro = new Admin;

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$autor = $_POST['autor'];
$contenido = $_POST['contenido'];
$tcr = $_POST['tcr'];
$fecha = $_POST['fecha'];
$id = $_POST['id'];
$nimg = $_FILES['fname']['name'];

if(isset($_POST['filename'])){
    try{
        unlink("../../upload/".$_POST['filename']);
    }catch( exeption $e){
        echo "no se pudo eliminar el archivo";
    }
}
if(isset($_FILES)){
    try{
        $ruta = "../../upload/".$_FILES['fname']['nombre'];
        move_uploaded_file($ruta,$_FILES['fname']['tmp_name']);
    }catch(Exception $e){
        $_SESSION['result']=3;
    }
}
try{
    $registro->UpdateArticulo($titulo, $subtitulo, $autor, $contenido, $tcr, $fecha, $id, $nimg);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=UpdateArticulo");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>