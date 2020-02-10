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
      case ($a=="delArticulo"):
        $contenido = "delArticulo.php";
      break;
      case ($a=="multimedia"):
        $contenido = "addMultimedia.php";
      break;
      case ($a=="adminmultimedia"):
        $contenido = "adminMultimedia.php";
      break;
     /* case ($a=="upMultimedia"):
        $contenido = "upMultimedia.php";
      break;*/
      case ($a=="delMultimedia"):
        $contenido = "delMultimedia.php";
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