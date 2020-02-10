<?php 
session_start();
include_once("apiMultimedia.php");
$registro = new Multimedia;

print_r($_POST);


$categoria = (isset($_POST['categoria']))?$_POST['categoria']:NULL;
$tipo = (isset($_POST['tipo']))?$_POST['tipo']:NULL;
$nombre =(isset($_POST['nombre']))?$_POST['nombre']:$_FILES['archivo']['tmp_name'];
$titulo = (isset($_POST['titulo']))?$_POST['titulo']:NULL;
$descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:NULL;
$dir = (isset($_POST['dir']))?$_POST['dir']:NULL;
$idarchivo = (isset($_POST['idarchivo']))?$_POST['idarchivo']:NULL;

if(isset($_FILES)){
    try{
        if(isset($_POST['nombre'])){
            unlink("../../upload/".$_POST['nombre']);
        }
        $ruta = "../../upload/".$nombre;
        move_uploaded_file($ruta,$nombre);
    }catch(Exception $e){
        $_SESSION['result']=3;
    }
}
try{
    $registro->UpMultimedia($categoria, $tipo, $nombre, $titulo, $descripcion, $dir, $idarchivo);
    $_SESSION['result']=1;
    echo $categoria;
    header("location: indexAdmin.php?a=adminmultimedia");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>