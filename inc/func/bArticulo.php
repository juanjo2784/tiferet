<?php 
require_once('Api.php');
//archivo de parasha del listado
$status = new BD();

if(!isset($_SESSION['tipo']) && !isset($_GET['p'])){
   $_SESSION['tipo']=1;
}elseif(isset($_GET['p'])){
   $_SESSION['tipo']=$_GET['p'];
}

switch($_SESSION['tipo']){
   case 0:
     $listado = "Debe seleccionar un opción";
   break;
   case 1:
     $listado = "Parashot";
   break;
   case 2:
     $listado = "Segulot";
   break;
   case 3:
     $listado = "Emuna y Bitajon";
   break;
   case 4:
     $listado = "Recetas";
   break;
   case 5:
     $listado = "Tziniut";
   break;
 }

?>

<div class="container-fluid">
 <div class="row text-justify">

    <div class="col-sx-11 col-md-2">
       <h5><?php echo $listado?></h5>
       <?php $status -> ListadoArticulos($_SESSION['tipo']); 
       $_SESSION['pb']=$status->gPb();
       ?>
    </div>
<?php 
 if ($_GET['a']=="article"){
  $pb = $_SESSION['pb'];
  $status -> bArticulo($pb);
}else{
 $status-> bArticulo($_GET['a']);
}

?>
    <div class="col-sx-11 col-md-9 cartag">
    <?php $status->gImg() ?>
      <h4><?php $status->gTitulo() ?></h4>
      <h1><?php $status -> gSubtitulo()?></h1>
      <p class="text-left">Por: <?php $status -> gAutor();echo"<br/>fecha: ";$status->gFecha(); ?></p>
      <p><?php $status -> gContenido(); ?></p>
      <h6><?php $status -> gTcr(); ?></h6>
      <div>
        <?php $status->gMultimedia($_SESSION['tipo'],2)?>
        <?php $status->gMultimedia($_SESSION['tipo'],3)?>
      </div>
    </div>

 </div>
</div>