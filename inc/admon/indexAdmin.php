<?php 
  session_start();
  echo $_SESSION['user'];
  if(!isset($_SESSION['user'])){
    header("location: login.php");
  }

?>
<!DOCTYPE html>

<html lang="es">

<head>
  <title>Administrador</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="tiferet, TIFERET, Tiferet, Jerusalem, jerusalen, Ayudas, nuevos inmigrantes, parashat, segulot, lugares para visitar, Israel" />
  <meta name="description" content="Tiferet es el centro de integración de la comunidad latinoamericana ortodoxa en Jerusalén. Busca conectar las diferentes fundaciones sin ánimo de lucro que trabajan en beneficio de la comunidad latinoamericana de esta ciudad, somos soporte para direccionar las solicitudes y demandas que la población latina religiosa de Jerusalén requiera para su absorción en Israel, direccionandoles a las diferentes fundaciones que existen para tal fin." />
  <meta name="Author" content="Juan José Charry" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link href="../../css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?a=Home"><img src="/../img/icon2.png" alt="logo TIFERET"> </a>

    <div class="d-none d-md-block mx-auto">
      <ul class="navbar-nav ">
        <li class="nav-item"><a class="nav-link" href="?a=articulos">Articulos de texto</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=multimedia">Multimedia</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=video">Videos</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=cronograma">Eventos</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=salir"><i class="material-icons cfi7">account_circle</i></a></li>
      </ul>
    </div>

  </nav>
</header>

<div  class="pal container-fluid">

<?php 
//error_reporting(0);
//echo getcwd() . "\n";
  require "mapaLogin.php"; 
  require $contenido; 
?>
  
</div>

</body>
</html>