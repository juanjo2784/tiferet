<?php 
require_once('Api.php');
//echo getcwd();
//archivo de pasahat hayom
$item = $_COOKIE['item'];
$status = new BD();
$status -> mParasha();
$_SESSION['tipo']=1;
?>

<div class="container-fluid">
 <div class="row cp text-justify">
     <div class="col-sx-11 col-xl-2">
       <h5>Parashot</h5>
       <?php $status -> ListadoArticulos($_SESSION['tipo']); ?>
    </div>

    <div class="col-sx-11 col-xl-9 cartag">
      <h4><?php echo $item ?></h4>
      <h1><?php $status -> gSubtitulo()?></h1>
      <p class="text-left">Por: <?php $status -> gAutor();echo"<br/>fecha: ";$status->gFecha(); ?></p>
      <p><?php $status -> gContenido(); ?></p>
      <h6><?php $status -> gTcr(); ?></h6>
    </div>

 </div>
</div>