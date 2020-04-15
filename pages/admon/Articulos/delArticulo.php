<?php 
session_start();
include_once("Articulos/Model/mArticulo.php");
$registro = new Articulo;
$ruta=(isset($_GET['n']))?"../../upload/Imagenes/".$_GET['n']:null;
$id = $_GET['p'];
try{
    $registro->DelArticulo($id);
    $_SESSION['result']=1;
    if($ruta != null){
        unlink($ruta);
    }
    header("location: indexAdmin.php?a=UpdateArticulo");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>