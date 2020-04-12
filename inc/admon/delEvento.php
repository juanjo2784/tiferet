<?php 
$id = (isset($_POST['idevento']))?$_POST['idevento']:null;

   require_once('ApiEventos.php');
    $evento = new Evento(); 
    if(!empty($_POST['fimg'])){
        unlink($_POST['fimg']);
      }
      if(!empty($_POST['faudio'])){
        unlink($_POST['faudio']);
      }
    $evento->delEvento($id);
    $_SESSION['msg']=4;
    header("location: indexAdmin.php?a=eventos");
?>
