<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php 
require_once('Api.php');
//archivo de parasha del listado
$status = new BD();
$vb = (isset($_GET['a']))?explode("/", $_GET['a']):1;
if(!isset($_SESSION['tipo']) && !isset($vb[1])){
   $_SESSION['tipo']=1;
}elseif(isset($vb[1])){
   $_SESSION['tipo']=$vb[1];
};
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
       <?php $status ->ListadoArticulos($_SESSION['tipo']); $_SESSION['pb']=$status->gPb();?>
    </div>

    <div class="col-sx-11 col-md-9 cartag">
<!------ tabs ---------->
    <div class="tabs">
      <div class="tab-button-outer">
        <ul id="tab-button">
          <li><a href="#Articulo">Articulo</a></li>
          <li><a href="#Video">Video</a></li>
          <li><a href="#Audio">Audio</a></li>
          <li><a href="#Canal">YouTube</a></li>
        </ul>
      </div>
      <div class="tab-select-outer">
        <select id="tab-select">
          <option value="#Articulo">Articulo</option>
          <option value="#Video">Videos</option>
          <option value="#Audio">Audio</option>
          <option value="#Canal">YouTube</option>
        </select>
      </div>
      <?php 
      $var = explode("/", $_GET['a']);
        if ($var[0]=="article"){
          $pb = $_SESSION['pb'];
          $status -> bArticulo($pb);
        }else{
        $status-> bArticulo($var[1]);
        }
      ?>
      <div id="Articulo" class="tab-contents">
        <h4><?php $status->gTitulo() ?></h4>
        <?php $status->gImg() ?>
        <p class="text-left">Por: <?php $status -> gAutor();echo"<br/>fecha: ";$status->gFecha(); ?></p>
          <p><?php $status -> gContenido(); ?></p>
          <h6><?php $status -> gTcr(); ?></h6>
      </div>

      <div id="Video" class="tab-contents">
        <h2>Videos exclusivos de nuestra Página</h2>
        <?php $status->gMultimedia($_SESSION['tipo'],3)?>
      </div>

      <div id="Audio" class="tab-contents">
        <h2>Audios</h2>
        <?php $status->gMultimedia($_SESSION['tipo'],2)?>
      </div>

      <div id="Canal" class="tab-contents">
        <h2>Videos de Nuestro Canal</h2>
        <?php $status->gYoutube($_SESSION['tipo'])?>
      </div>

    </div>
<!------ tabs ---------->
    </div>
  </div>
</div>

<script>
$(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});

</script>