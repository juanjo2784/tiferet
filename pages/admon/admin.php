<?php 
  include_once('Config/config.php');
?>
<!DOCTYPE html>

<html lang="es">

<head>
<title>Administrador</title>
  <meta charset="UTF-8">
  <meta name="Author" content="Juan José Charry" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link href= "<?php echo $ruta ?>css/style.css" rel="stylesheet">
  <link href="<?php echo $ruta ?>css/menu.css" rel="stylesheet">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="<?php echo $ruta ?>inc/validar.js"></script>
<?php 

$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"articulos";
if ($evento[0] == "eventos"){
  include 'Eventos/View/modalCalendar.php';
}else{
  echo "<script src='../../../js/loader.js'></script>";
}
?>
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
        <li class="nav-item"><a class="nav-link" href="?a=eventos">Eventos</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=salir"><i class="material-icons cfi7">account_circle</i></a></li>
      </ul>
    </div>

  </nav>
</header>

<div  class="pal container-fluid">

<?php 
  require "Config/mapaLogin.php"; 
  require $contenido;   
  echo "</div>";
  include_once ("Component/footer.php"); 
?>
</body>
</html>