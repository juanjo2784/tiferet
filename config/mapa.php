<?php
if(!isset($_GET['a'])){
  $contenido="component/Home.php";
}else{
  $a = explode("/",$_GET['a']);
  switch (true) {
    case ($a[0] == "contacto" ):
    $contenido="pages/contactenos.php";
  break;
    case ($a[0] == "Home"):
    $contenido="component/Home.php";
  break;
    case ($a[0] == "proyecto"):
    $contenido="pages/proyecto.php";
  break;
    case ($a[0] == "Parashat"):
    $contenido = "pages/mparasha.php";
    break;
  case ($a[0] == "galeria"):
   $contenido="pages/galeria.php";
  break;
  case ($a[0] == "juegos"):
    $contenido="pages/sd.php";
   break;
   case ($a[0] == "eventos"):
    $contenido="pages/event/cronograma.php";
   break;
    case ($a[0] == "article"):
    $contenido="pages/bArticulo.php";
  break;
  case ($a[0] <=99):
    $contenido="pages/bArticulo.php";
  break;
  }
}
?>