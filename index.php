<?php 
session_start();
include_once("config/config.php");
?>
<!DOCTYPE html>

<html lang="es">

<head>
  <title><?php echo $sigla ?></title>
  <meta charset="UTF-8">
  <meta name="keywords" content="tiferet, TIFERET, Tiferet, Jerusalem, jerusalen, Ayudas, nuevos inmigrantes, parashat, segulot, lugares para visitar, Israel" />
  <meta name="description" content="Tiferet es el centro de integración de la comunidad latinoamericana ortodoxa en Jerusalén. Busca conectar las diferentes fundaciones sin ánimo de lucro que trabajan en beneficio de la comunidad latinoamericana de esta ciudad, somos soporte para direccionar las solicitudes y demandas que la población latina religiosa de Jerusalén requiera para su absorción en Israel, direccionandoles a las diferentes fundaciones que existen para tal fin." />
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
<?php 
$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"Home";
if ($evento[0] == "eventos"){
 include_once("pages/event/fEvento.php");
}else{
echo "<script src='/js/loader.js'></script>";
}
?>
</head>
<body id="miDiv">

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $ruta ?>Home/"><img src="<?php echo $ruta ?>img/icon2.png" alt="logo TIFERET"> </a>
  </nav>
</header>
<div class="loader" style="display:block;" id="loader" ></div>
<div  class="pal container-fluid animate-bottom" style="display:none;" id="myDiv">

<?php 
  include_once ("config/mapa.php"); 
  require $contenido; 
?>
  
</div>

<?php 
  include_once ("component/footer.php"); 
  include_once ('component/menu.php');
?>

</body>
</html>