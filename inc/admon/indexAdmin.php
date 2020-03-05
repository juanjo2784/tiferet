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
  <link href= "<?php echo $_SESSION['sr'] ?>css/style.css" rel="stylesheet">
  <link href="<?php echo $_SESSION['sr'] ?>css/menu.css" rel="stylesheet">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="<?php echo $_SESSION['sr'] ?>inc/validar.js"></script>
<?php 
$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"";
if ($evento[0] == "eventos"){
  ?>
<link href='../calendario/core/main.css' rel='stylesheet' />
<link href='../calendario/daygrid/main.css' rel='stylesheet' />

<script src='../calendario/core/main.js'></script>
<script src='../calendario/daygrid/main.js'></script>
<script src='../calendario/interaction/main.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"></script>
<script>
let texto;

  document.addEventListener('DOMContentLoaded', function(){
  var calendarEl = document.getElementById('calendar');
  $("#loader").css("display","none");
  $("#myDiv").css("display", "block");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    events: 'http://localhost/inc/func/eventos.php',
    eventClick:function(info){
      options = {weekday: 'long', month: 'long', day: 'numeric' };
      let inicio = new Date(info.event.start);
      texto = 'Incia: ' + inicio.toLocaleDateString("es-ES", options)  + ' Descripcion: '+ info.event.extendedProps.description;
      Swal.fire({
        icon: 'info',
        title: info.event.title,
        text: texto,
        footer: '<a href>Why do I have this issue?</a>'
      })
    }
  });

  calendar.setOption('locale','Es');
  calendar.render(); 
});</script>

<?php
}else{
?>
  <script>
  var myVar;

  function myFunction() {
    myVar = setTimeout(showPage, 500);
  }

  function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("myDiv").style.display = "block";
  }

 $(document).ready(myFunction);

</script>
<?php
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
//error_reporting(0);
//echo getcwd() . "\n";
  require "mapaLogin.php"; 
  require $contenido; 
?>
  
</div>

</body>
</html>