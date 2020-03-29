<?php 
$id = (isset($_POST['idevento']))?$_POST['idevento']:null;

var_dump($_POST);
   require_once('ApiEventos.php');
    $evento = new Evento(); 
    $evento->delEvento($id);
    $_SESSION['msg']=4;
    header("location: indexAdmin.php?a=eventos");
?>
