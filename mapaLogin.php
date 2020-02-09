<?php 
if($_SESSION['user']){
  if(!isset($_GET['a'])){
    $contenido = "AddArticulo.php";
  }else{
    $a = ($_GET['a']);
    switch(true){
      case ($a=="articulos"):
        $contenido = "AddArticulo.php";
      break;
      case ($a=="UpdateArticulo"):
        $contenido = "adminArticulo.php";
      break;
      case ($a=="multimedia"):
        $contenido = "addmultimedia.php";
      break;
      case ($a=="adminmultimedia"):
        $contenido = "adminmultimedia.php";
      break;
      case ($a=="video"):
        $contenido = "addVideo.php";
      break;
      case ($a=="adminvideo"):
        $contenido = "adminvideo.php";
      break;
      case ($a > 0):
        switch($_GET['c']){
          case 1:
            $contenido = "adminArticulo.php";
          break;
          case 2:
            $contenido = "adminMultimedia.php";
          break;
          }
        
      break;
      default:
      session_destroy();
      $contenido = "salir.php";
      header("location:login.php");
    }
  }
}else{
  header("location:login.php");
}


?>