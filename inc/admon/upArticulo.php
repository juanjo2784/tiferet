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
$nimg =(isset($_POST['filename']))?$_POST['filename']:$_FILES['fname']['name'];


if(isset($_FILES)){
    try{
        if(isset($_POST['filename'])){
            unlink("../../upload/".$_POST['filename']);
        }
        $ruta = "../../upload/".$nimg;
        move_uploaded_file($_FILES['fname']['tmp_name'],$ruta);
    }catch(Exception $e){
        $_SESSION['result']=3;
    }
}

print_r($_FILES);
echo "</br>".$_POST['filename']."</br>";
print_r($_POST);

try{
    $registro->UpdateArticulo($titulo, $subtitulo, $autor, $contenido, $tcr, $fecha, $id, $nimg);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=UpdateArticulo");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>