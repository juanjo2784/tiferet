<?php 
  session_start();
  $_SESSION['sr'] = "http://localhost/";
  if(!isset($_SESSION['user'])){
    header("location: login.php");
  }
include_once ('crdEvento.php');
  
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
$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"articulos";
if ($evento[0] == "eventos"){
  ?>
<link href='../../calendario/core/main.css' rel='stylesheet' />
<link href='../../calendario/daygrid/main.css' rel='stylesheet' />
<link href="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js">
<script src='../../calendario/core/main.js'></script>
<script src='../../calendario/daygrid/main.js'></script>
<script src='../../calendario/interaction/main.js'></script>
<script src="callendar.js"></script>

<!-- The Modal NUEVO EVENTO -->
<div class="modal fade" id="nevento">
    <div class="modal-dialog">
      <div class="modal-content color3">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar Evento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group row">
              <label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title" name="title"  placeholder="Nombre del Evento" value="Prueba">
            </div>
            <div class="form-group row">
            <input type="hidden" name="fecha" id="fecha" value="11">
             <label for="start" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start" name="inicio" value="17:00:00">
            </div>
            <div class="form-group row">
              <label for="textColor" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor" name="textColor" value="#FFFFFF">
              <label for="backgroundColor" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor" name="backgroundColor" value="#6699CC">
            </div>
            <div class="form-group row">
              <label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" name="dir" value="esto es Prueba">
            </div>
            <div class="form-group row">
              <label for="img" class="col-4 col-form-label">Archivo</label><input type="file" class="form-control col-8 float-left" id="img" name="img" accept="image/jpg">
              <input type="hidden" id="action" name="action" value="2">
            </div>

              <div class="col-12 d-flex justify-content-between">
                <button type="button" class="btn btn-success btn-lg" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
              </div>

          </div>

          </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<!-- The Modal UPDATE EVENTO -->
<div class="modal fade" id="upevento">
    <div class="modal-dialog">
      <div class="modal-content color3">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Evento</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="crdEvento.php?action=<?php echo $boton ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" id="rfile">
          <div class="container p-2 d-flex aling-content-center"><img src="" class="img-thumbnail" id="img2" ></div>
          <div class="form-group row">
              <label for="title" class="col-4 col-form-label">Nombre</label><input type="text" class="form-control col-8 float-left" id="title2" name="title" >
            </div>
            <div class="form-group row">
            <label for="fecha2" class="col-4 col-form-label">Fecha</label><input type="date" name="fecha" class="form-control col-8 float-left" id="fecha2">
             <label for="start2" class="col-4 col-form-label">Inicia</label><input type="time" class="form-control col-8 float-left" id="start2"  value="16:00:00" name="inicio">
            </div>
            <div class="form-group row">
              <label for="textColor2" class="col-4 col-form-label">Color-texto</label><input type="color" class="form-control col-2 float-left" id="textColor2" name="textColor" value="#FFFFFF">
              <label for="backgroundColor2" class="col-4 col-form-label">Color-cinta</label><input type="color" class="form-control col-2 float-left" id="backgroundColor2" name="backgroundColor" value="#6699CC">
            </div>
            <div class="form-group row">
              <label for="dir" class="col-4 col-form-label">Dirección</label><input type="text" class="form-control col-8 float-left" id="dir" name="dir" value="esto es Prueba">
            </div>
            <div class="form-group row">
              <label for="img2" class="col-4 col-form-label">Nueva Imagen</label><input type="file" class="form-control col-8 float-left" id="img" name="img2" accept="image/jpg">
            </div>
            <div class="form-group row">
              <label for="audio" class="col-4 col-form-label">Audio</label><input type="file" class="form-control col-8 float-left" id="audio" name="audio" >
              <input type="hidden" id="action" name="action" value="3">
              <input type="hidden" id="idevento2" name="idevento">
            </div>

              <div class="col-12 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary btn-lg" id="actualizar" value="update">Actualizar</button>
              </div>
          </div>
          </form>
          <form action="delEvento.php" method="POST">
            <input type="hidden" id="idevento" name="idevento">
            <button type="submit" class="btn btn-danger btn-lg" id="Eliminar" value="delete">Eliminar</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  
</div>


<?php
}else{
?>
<script src="loader.js"></script>
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

<?php 
$evento = (isset($_GET['a']))?explode("/", $_GET['a']):"articulos";
if ($evento[0] == "eventos" && (isset($_SESSION['msg']))){
if(isset($_SESSION['msg'])){
  switch($_SESSION['msg']){
    case 2:
      ?><div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      Registro <strong>Agregado</strong>  Exitosamente</div><?php
      $_SESSION['msg']=NULL;
      break;
    case 3:
      ?><div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Actualizado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
      break;
    case 4:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Eliminado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 6:
      ?><div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Infomacion!</strong>Se ha agregado un registro con imagen</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 7:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Infomacion!</strong>Se ha agregado solo el Evento, se debe agregar una imagen!!!</div><?php
      $_SESSION['msg']=NULL;
    break;
    case 9:
      ?><div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong>Registro Eliminado Exitosamente</div><?php
      $_SESSION['msg']=NULL;
    break;
    default:
    $_SESSION['msg']=NULL;
  }
}
}
?>

<div  class="pal container-fluid">

<?php 

  require "mapaLogin.php"; 
  require $contenido; 
?>
  
</div>

</body>
</html>