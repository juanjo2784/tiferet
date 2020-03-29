<?php 
session_start();
$_SESSION['sr'] = "http://localhost/";
?>
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
  <link href= "<?php echo $_SESSION['sr'] ?>css/style.css" rel="stylesheet">
  <link href="<?php echo $_SESSION['sr'] ?>css/menu.css" rel="stylesheet">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="<?php echo $_SESSION['sr'] ?>inc/validar.js"></script>
<?php 
$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"Home";
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
    color: "#FF0F0",
    textColor: "#FFFFFF",
    eventClick:function(info){
      options = {weekday: 'long', month: 'long', day: 'numeric' };
      let inicio = new Date(info.event.start);
      datetime = new Date(info.event.start);
      day = (datetime.getDate()<10)?"0"+datetime.getDate():datetime.getDate();
      month =((datetime.getMonth() + 1)<10)?"0"+(datetime.getMonth() + 1):datetime.getMonth() + 1; //month: 0-11
      year = datetime.getFullYear();
      date = year + "-" + month + "-" + day;
      hours = (datetime.getHours()<10)?"0"+datetime.getHours():datetime.getHours();
      minutes =(datetime.getMinutes()<10)?"0"+datetime.getMinutes():datetime.getMinutes();
      time = hours + ":" + minutes + ":00";
      Swal.fire({
          title: info.event.title,
          icon: 'info',
          html:
          '<div class = "container">'+
            '<div class="form-group row">'+
            '<label for="date" class="col-4 col-form-label">Fecha</label><input type="date" class="form-control col-8 float-left" id="date" name="inicio" value="'+date+'" disabled>'+
              '<label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="'+time+'" disabled>'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="dir" class="col-4 col-form-label">Dirección</label><label for="dir" class="col-4 col-form-label">'+info.event.extendedProps.dir+'</label>'+
            '</div>'+
          '</div>',
          showCloseButton: true,
          focusConfirm: false,
          confirmButtonText: 'OK',
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
<body id="miDiv">

<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo $_SESSION['sr'] ?>Home/"><img src="<?php echo $_SESSION['sr'] ?>img/icon2.png" alt="logo TIFERET"> </a>
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