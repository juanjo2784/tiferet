<?php session_start()?>
<!DOCTYPE html>

<html lang="es">

<head>
  <?php 
    $nombre = "Tiferet Nashim Latina";
    $sigla = "תפראת";
    $representante ="Ruth Stroe";
    $telefono = "52-300-3456";
    $telefono1 = "523003456";
    $lugar = " Jerusalem - Israel";
    $mailf = "tiferetmujereslatinas@gmail.com";
    $cboton = "success";
?>
  <title><?php echo $sigla ?></title>
  <meta charset="UTF-8">
  <meta name="keywords" content="tiferet, TIFERET, Tiferet, Jerusalem, jerusalen, Ayudas, nuevos inmigrantes, parashat, segulot, lugares para visitar, Israel" />
  <meta name="description" content="Tiferet es el centro de integración de la comunidad latinoamericana ortodoxa en Jerusalén. Busca conectar las diferentes fundaciones sin ánimo de lucro que trabajan en beneficio de la comunidad latinoamericana de esta ciudad, somos soporte para direccionar las solicitudes y demandas que la población latina religiosa de Jerusalén requiera para su absorción en Israel, direccionandoles a las diferentes fundaciones que existen para tal fin." />
  <meta name="Author" content="Juan José Charry" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">
  <!--script-- src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></!--script-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="inc/validar.js"></script>
  <!--script-- src="inc/ApiHebCal.js"></!--script-->
</head>

<script>
  var myVar;

  function myFunction() {
    myVar = setTimeout(showPage, 500);
  }

  function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
  }

</script>

<body onload="myFunction()">

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?a=Home"><img src="img/icon2.png" alt="logo TIFERET"> </a>

    <div class="d-none d-md-block mx-auto">
      <ul class="navbar-nav ">
        <li class="nav-item"><a class="nav-link" href="?a=Home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="?a=proyecto">Nuestro Proyecto</a></li>
        <li class="nav-item"><a class="nav-link" href="">Fundaciones de Apoyo</a></li>
      </ul>
    </div>

  </nav>
</header>
<div class="loader" style="display:block;" id="loader" ></div>
<div  class="pal container-fluid animate-bottom" style="display:none;" id="myDiv">

<?php 
  require "inc/mapa.php"; 
  require $contenido; 
?>
  
</div>

<?php include "inc/footer.php"; ?>
<?php include 'inc/menu.php';?>
</body>
</html>