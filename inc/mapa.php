<?php
if(!isset($_GET['a'])){
  $contenido="inc/Home.php";
}else{
  $a = $_GET['a'];
  switch (true) {
    case ($a == "contacto" ):
    $contenido="inc/contactenos.php";
  break;
    case ($a == "Home"):
    $contenido="inc/Home.php";
  break;
    case ($a == "proyecto"):
    $contenido="inc/proyecto.php";
  break;
    case ($a == "Parashat"):
    $contenido = "inc/func/mparasha.php";
    break;
  case ($a == "galeria"):
   $contenido="inc/func/galeria.php";
  break;
  case ($a == "juegos"):
    $contenido="inc/func/sd.php";
   break;
   case ($a == "eventos"):
    $contenido="inc/func/sd.php";
   break;
    case ($a == "article"):
    $contenido="inc/func/bArticulo.php";
  break;
  case ($a <=99):
    $contenido="inc/func/bArticulo.php";
  break;
  }
}
?>