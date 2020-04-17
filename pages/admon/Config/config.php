<?php 
    session_start();
    $ruta = "http://localhost/";
    if(!isset($_SESSION['user'])){
        header("location:Pages/login.php");
      }
?>