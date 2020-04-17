<?php 
session_start();
    $_SESSION['tipo']=$_POST['tipo'];
    $_SESSION['contenido'] = $_POST['contenido'];
    $_SESSION['formulario'] = $_POST['formulario'];
    header("location: indexAdmin.php?a=adminmultimedia");
?>