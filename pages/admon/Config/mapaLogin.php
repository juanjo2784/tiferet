<?php 
if($_SESSION['user']){
  if(!isset($_GET['a'])){
    $contenido = "Articulos/AddArticulo.php";
  }else{
    $a = ($_GET['a']);
    switch(true){
      case ($a=="articulos"):
        $contenido = "Articulos/AddArticulo.php";
      break;
      case ($a=="UpdateArticulo"):
        $contenido = "Articulos/adminArticulo.php";
      break;
      case ($a=="delArticulo"):
        $contenido = "Articulos/delArticulo.php";
      break;
      case ($a=="multimedia"):
        $contenido = "Multimedia/Lev/addMultimedia.php";
      break;
      case ($a=="adminmultimedia"):
        $contenido = "Multimedia/Lev/adminMultimedia.php";
      break;
      case ($a=="delMultimedia"):
        $contenido = "Multimedia/Lev/delMultimedia.php";
      break;
      case ($a=="video"):
        $contenido = "Youtube/Lev/addVideo.php";
      break;
      case ($a=="adminvideo"):
        $contenido = "Youtube/Lev/adminvideo.php";
      break;
      case ($a=="eventos"):
        $contenido = "Eventos/View/cronograma.php";
      break;
      case ($a > 0):
        switch($_GET['c']){
          case 1:
            $contenido = "Articulos/adminArticulo.php";
          break;
          case 2:
            $contenido = "Multimedia/Lev/adminMultimedia.php";
          break;
          case 3:
            $contenido = "Youtube/Lev/adminvideo.php";
          break;
          }
      break;
      case ($a=="salir"):
        session_destroy();
        header("location:Pages/login.php");
      break;
      default:
      session_destroy();
      header("location:Pages/login.php");
    }
  }
}else{
  header("location:Pages/login.php");
}
?>