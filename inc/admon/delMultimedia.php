<?php 
include_once("apiMultimedia.php");
$registro = new Multimedia;

$id = $_GET['p'];
try{
    $registro->delMultimedia($id);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=adminmultimedia");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>