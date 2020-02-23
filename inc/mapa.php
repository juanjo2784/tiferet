<?php
if(!isset($_GET['a'])){
  $contenido="inc/Home.php";
}else{
  $a = explode("/",$_GET['a']);
  switch (true) {
    case ($a[0] == "contacto" ):
    $contenido="inc/contactenos.php";
  break;
    case ($a[0] == "Home"):
    $contenido="inc/Home.php";
  break;
    case ($a[0] == "proyecto"):
    $contenido="inc/proyecto.php";
  break;
    case ($a[0] == "Parashat"):
    $contenido = "inc/func/mparasha.php";
    break;
  case ($a[0] == "galeria"):
   $contenido="inc/func/galeria.php";
  break;
  case ($a[0] == "juegos"):
    $contenido="inc/func/sd.php";
   break;
   case ($a[0] == "eventos"):
    $contenido="inc/func/cronograma.php";
   break;
    case ($a[0] == "article"):
    $contenido="inc/func/bArticulo.php";
  break;
  case ($a[0] <=99):
    $contenido="inc/func/bArticulo.php";
  break;
  }
}
?>