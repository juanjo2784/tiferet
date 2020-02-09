<?php 
require_once('Api.php');
$imagen = new BD();
$_SESSION['tipo']=6;
?>
<div class="container">
<?php $imagen->gImagenes(6)?>
</div>