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
 <div class="row text-justify">

    <div class="col-sx-11 col-md-2">
       <h5>Parashot</h5>
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
        <?php $status->gImg() ?>
        <h4><?php $status->gTitulo() ?></h4>
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
        <?php $status->gYoutube($_SESSION['tipo'])?>
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