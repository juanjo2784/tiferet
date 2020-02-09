<?php 
session_start();
include_once("ApiAdmin.php");
$registro = new Admin;

$id = $_GET['p'];
try{
    $registro->DelArticulo($id);
    $_SESSION['result']=1;
    header("location: indexAdmin.php?a=UpdateArticulo");
} catch (Exception $e){
    $_SESSION['result']=0;
}
?>