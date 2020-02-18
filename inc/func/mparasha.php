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
          <li><a href="#tab01">Articulo</a></li>
          <li><a href="#tab02">Video</a></li>
          <li><a href="#tab03">Audio</a></li>
          <li><a href="#tab04">YouTube</a></li>
        </ul>
      </div>
      <div class="tab-select-outer">
        <select id="tab-select">
          <option value="#tab01">Articulo</option>
          <option value="#tab02">Videos</option>
          <option value="#tab03">Audio</option>
          <option value="#tab04">YouTube</option>
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
      <div id="tab01" class="tab-contents">
        <?php $status->gImg() ?>
        <h4><?php $status->gTitulo() ?></h4>
        <p class="text-left">Por: <?php $status -> gAutor();echo"<br/>fecha: ";$status->gFecha(); ?></p>
          <p><?php $status -> gContenido(); ?></p>
          <h6><?php $status -> gTcr(); ?></h6>
      </div>
      <div id="tab02" class="tab-contents">
        <h2>Videos exclusivos de nuestra Página</h2>
        <?php $status->gMultimedia($_SESSION['tipo'],3)?>
      </div>
      <div id="tab03" class="tab-contents">
        <h2>Audios</h2>
        <?php $status->gYoutube($_SESSION['tipo'])?>
      </div>
      <div id="tab04" class="tab-contents">
        <h2>Videos de Nuestro Canal</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quos aliquam consequuntur, esse provident impedit minima porro! Laudantium laboriosam culpa quis fugiat ea, architecto velit ab, deserunt rem quibusdam voluptatum.</p>
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