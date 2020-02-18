<?php 
require_once('Api.php');
$imagen = new BD();
$_SESSION['tipo']=6;?>

<div class="container">
<h1>Galeria de Imagenes</h1>
  <div class="container page-top">
    <div class="row">
    <?php $imagen->gImagenes(6)?>    
    </div>
  </div>
</div>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
<script>
$(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
</script>