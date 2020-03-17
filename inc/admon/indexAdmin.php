<?php 
  session_start();
  $_SESSION['sr'] = "http://localhost/";
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
<link href='../../calendario/core/main.css' rel='stylesheet' />
<link href='../../calendario/daygrid/main.css' rel='stylesheet' />
<link href="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js">
<script src='../../calendario/core/main.js'></script>
<script src='../../calendario/daygrid/main.js'></script>
<script src='../../calendario/interaction/main.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
let texto;

  document.addEventListener('DOMContentLoaded', function(){
  var calendarEl = document.getElementById('calendar');
  $("#loader").css("display","none");
  $("#myDiv").css("display", "block");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid', 'interaction' ],
    events: "http://localhost/inc/admon/eventos.php",
    
    dateClick:function(info){
      (async () => {
        const { value: formValues } = await Swal.fire({
          title: 'Agregar Evento',
          html:
          '<div class = "container">'+
            '<div class="form-group row">'+
              '<label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title" name="title"  placeholder="Nombre del Evento" value="Prueba">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="17:00:00">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="textColor" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor" name="textColor" value="#FFFFFF">'+
              '<label for="backgroundColor" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor" name="backgroundColor" value="#6699CC">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" name="dir" value="esto es Prueba">'+
            '</div>'+
          '</div>',

          focusConfirm: false,
          showCancelButton: true,
          confirmButtonText: 'Agregar Evento',
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#3085d6',
          preConfirm: () => {
            return [
              this.title="'"+document.getElementById('title').value+"'",
              this.inicio="'"+info.dateStr + " "+ document.getElementById('start').value+"'",
              this.fin="'"+info.dateStr + " "+ document.getElementById('end').value+"'",
              this.color="'"+document.getElementById('textColor').value+"'",
              this.fondo="'"+document.getElementById('backgroundColor').value+"'",
              this.dir="'"+document.getElementById('dir').value+"'",
            ]
          }
        })
        if (formValues) {
          if(this.title=="" || this.start=="" || this.dir==""){
              Swal.fire({type: 'info', title: 'Datos Incompletos'})
            }else{
              axios.post('addEvento.php', {
                formValues
              })

                .then(response => {
                  console.log('respuesta:' + response.data)
                })
                .catch(error => {
                  console.log(error)
                })
                .finally(function () {
                  location.reload();
                })           
            }
          /*Swal.fire(JSON.stringify(formValues))*/
        }
        })()
    },
    eventClick:function(info){
      options = {weekday: 'short', month: 'short', day: 'numeric' };
      datetime = new Date(info.event.start);
      day = datetime.getDate();
      month = datetime.getMonth() + 1; //month: 0-11
      year = datetime.getFullYear();
      date = year + "-" + day + "-" + month;
      hours = (datetime.getHours()<10)?"0"+datetime.getHours():datetime.getHours();
      minutes =(datetime.getMinutes()<10)?"0"+datetime.getMinutes():datetime.getMinutes();
      time = hours + ":" + minutes + ":00";
      console.log(time);
      (async () => {
        const { value: formValues } = await Swal.fire({
          title: 'Actualizar Evento',
          html:
          '<div class = "container">'+
            '<div class="form-group row">'+
              '<label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title" name="title" value="'+info.event.title+'">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="'+time+'">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="textColor" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor" name="textColor" value="'+info.event.textColor+'">'+
              '<label for="backgroundColor" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor" name="backgroundColor" value="'+info.event.backgroundColor+'">'+
            '</div>'+
            '<div class="form-group row">'+
              '<label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" value="'+info.event.extendedProps.dir+'">'+
            '</div>'+
          '</div>',

          focusConfirm: false,
          showCancelButton: true,
          showCloseButton: true,
          confirmButtonText: 'Actualizar Evento',
          confirmButtonColor: '#1cc88a',
          cancelButtonColor: '#3085d6',
          cancelButtonText: 'Eliminar',
          
          preConfirm: () => {
            return [
              this.title="'"+document.getElementById('title').value+"'",
              this.inicio="'"+info.dateStr + " "+ document.getElementById('start').value+"'",
              this.fin="'"+info.dateStr + " "+ document.getElementById('end').value+"'",
              this.color="'"+document.getElementById('textColor').value+"'",
              this.fondo="'"+document.getElementById('backgroundColor').value+"'",
              this.dir="'"+document.getElementById('dir').value+"'",
            ]
          }
        })

        if (formValues) {
          if(this.title=="" || this.start=="" || this.dir==""){
              Swal.fire({type: 'info', title: 'Datos Incompletos'})
            }else{
              axios.post('upEvento.php', {
                formValues
              })

                .then(response => {
                  console.log('respuesta:' + response.data)
                })
                .catch(error => {
                  console.log(error)
                })
                .finally(function () {
                  location.reload();
                })           
            }
        }
        
        })()
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