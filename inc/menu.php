<!--a class='flotante' href='#' ><img src='img/km.png'/></a-->
<ul class="flotante d-none d-sm-none d-md-block">
  <li ><a href="<?php echo $_SESSION['sr'] ?>Home/" title="Link para acceso al Home"><i class="material-icons md5 cfm">home</i></a></li> 
  <li><a href="<?php echo $_SESSION['sr'] ?>contacto/" title="Link para acceso al formulario de Contactanos"><i class="material-icons md5 cfm">account_circle</i></a></li>
  <li><a href="<?php echo $_SESSION['sr'] ?>Parashat/" title="Link para acceso a Pasasha haShavua"><i class="material-icons md5 cfm">local_parking</i></a></li>
  <li><a href="<?php echo $_SESSION['sr'] ?>eventos/" title="Link para acceso a Pasasha haShavua"><i class="material-icons md5 cfm">today</i></a></li>
  <!--li><a title="Disminuir fuente" id="B"><span class="Iletras cfm">-A</span></a></!--li>-->
</ul>



<div class="containerbt"> 

<input type="checkbox" id="toggle">
<label for="toggle" class="button color3" title="Boton del Menú"></label>

<nav class="nav color3" id="pp">
  <ul class="d-flex flex-column">
  <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>Home/" title="Link para acceso al HOME de la pagina"><span class="float-left">Home</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>proyecto/" title="Link para acceso a Información sobre la Asociación"><span class="float-left">¿Quienes Sómos?</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>Parashat/" title="Link para acceso a Información de la Parashat"><span class="float-left">Parashat</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>article/2/" title="Link para acceso a Información de las segulot recomendadas por los miembros de tiferet"><span class="float-left">Segulot</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>article/4/" title="Link para acceso a Información las mejores recetas de nuestra comunidad Tiferet"><span class="float-left">Recetas</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>article/5/" title="Link para acceso a Información sobre leyes de Tziniut"><span class="float-left">Tziniut</span></a>
    </li>
    <li>
      <a class="nav-link" href="#problema" title="Link para acceso a Información sobre lugares recomendados para visitar"><span class="float-left">Lugares recomendados</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>article/3/" title="Link para acceso a Información articulos de Emuna y Bitajon"><span class="float-left">Articulos de Emuna y Bitajon</span></a>
    </li>
    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>contacto/" title="Link para acceso al formulario de contacto de la Asociación"><span class="float-left">Contactanos</span></a>
    </li>    <li>
      <a class="nav-link" href="<?php echo $_SESSION['sr'] ?>galeria/" title="Link para acceso a la Galeria de Imagenes de Tiferet"><span class="float-left">Galeria</span></a>
    </li>   

  </ul>  
</nav>

</div>