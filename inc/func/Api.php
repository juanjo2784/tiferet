<?php
error_reporting(0);
class BD {
  private static $user;
  private static $password;
  private static $host;
  private static $bd;
  private $conn;
  private $consulta;
  private $respuesta = [];
  private $titulo;
  private $contenido;
  private $icono;
  private $tcr;
  private $pb;
  

  public function __construct() {
    self::$user = 'admin';
    self::$password = 3125480765;
  }

//Metods
  function cnx(){
    try {
      $this->conn = new PDO("mysql:host=localhost;dbname=bdtiferet",self::$user,self::$password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch (Exception $e) {
      echo "Error al conectar con la App";       
    }
  }

  function ListadoArticulos($tipo){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("select titulo, idArticulos from articulos where tipo = $tipo");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll();
      foreach ($this->respuesta as $value){
        echo '<ul>';
        echo '<li><a href="?a='.(int)$value['idArticulos'].'">'.$value['titulo'].'</a></li>';
        echo '</ul>';
      }
      $this->pb = $value['idArticulos'];
      //echo $this->gPb();
      } catch (Exception $e) {
      echo "Error al realizar la consulta";   
    }
    $this->dbClose();
  }

  function mParasha(){
    $this->cnx();
    $this->respuesta=NULL;
    $item = $_COOKIE['item'];
    try{
      $this->consulta = $this->conn->prepare("select contenido, titulo, subtitulo, autor, fecha, tcr from articulos where titulo = '$item'");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC); 
      if ($this->respuesta){
        foreach($this->respuesta as $valor){
          $this->titulo = $valor['titulo'];
          $this->subtitulo = $valor['subtitulo'];
          $this->autor = $valor['autor'];
          $this->contenido = $valor['contenido'];
          $this->tcr = $valor['tcr'];
          $this->fecha = $valor['fecha'];
        } 
      } else {
        throw new Exception("Estamos trabajando para mantener nuestros contenidos actualizados");
      }
    } catch (Exception $e) {
      echo 'Aun no se ha registrado información: ', $e->getMessage(), "\n";
    }
    $this->dbClose();
  }

  function bArticulo($p){
    $this->cnx();
    $this->consulta = $this->conn->prepare("SELECT contenido, titulo, subtitulo, autor, fecha, tcr FROM articulos WHERE idArticulos = $p");
    $this->consulta->execute();
    $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($this->respuesta as $valor){
      $this->titulo = $valor['titulo'];
      $this->subtitulo = $valor['subtitulo'];
      $this->autor = $valor['autor'];
      $this->contenido = $valor['contenido'];
      $this->tcr = $valor['tcr'];
      $this->fecha = $valor['fecha'];
    }
    $this->dbClose();
  }

  function gImagenes($a){
    $this->cnx();
    $this->consulta = $this->conn->prepare("SELECT nombre, idarchivo FROM multimedia WHERE categoria = $a AND tipo = 1");
    $this->consulta->execute();
    $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
    $k=0;
    $j=count($this->respuesta);
      foreach($this->respuesta as $value){
        if($k==0){
          echo "<div class='row justify-content-center align-items-center'>";
        }
      ?><a data-toggle='modal' data-target='#myModal<?php echo $value['idarchivo']?>' class='col-4'><img class='img-galeria img-fluid img-circle' src='/upload/<?php echo $value['nombre']?>'></a>
        
      
      <div class='modal fade' id='myModal<?php echo $value['idarchivo']?>'>
        <div class='modal-dialog modal-xl'><div class='modal-content'>
            <div class='modal-header'><button type='button' class='close' data-dismiss='modal'>&times;</button></div>         
            <div class='modal-body'>
            <center><img src='/upload/<?php echo $value['nombre']?>' class='img-fluid rounded' style="width: 100%;"></img></center>
            </div>    
         </div>
      </div></div>
      <?php   
        $k+=1;
        if($k==3 || $k==$j){
          echo "</div>";
          $k=0;
        }  
    }
    echo "</div>";
    $this->dbClose();
  }


  function gSrc($name, $tipo, $id){
    $src="/../../upload/".$name;
    switch($tipo){
      case 1:
         $mostrar = "<button type='button' class='close' data-dismiss='modal' ><i class='material-icons md50 cfi7'>close</i></button><img src=".$src." class='img-fluid rounded'  >";
      break;
      case 3:
        $mostrar = "<button type='button' class='close' data-dismiss='modal' onclick='document.getElementById(\"archivo".$id."\").pause();'><i class='material-icons cfi7'>close</i></button><video id='archivo".$id."' src=".$src." width='640' height='480' preload='auto' controls controlslist='nodownload'>Tu navegador no soporta MP4.</video>";
        $this->icono = "local_movies";
      break;
      
      case 2:
        $mostrar = "<button type='button' class='close' data-dismiss='modal' onclick='document.getElementById(\"archivo".$id."\").pause();'><i class='material-icons cfi7'>close</i></button><div class='cv'><audio id='archivo".$id."' src=".$src." preload='auto' controls controlslist='nodownload'>Tu navegador no Soporta MP3.</audio></div>";
        $this->icono = "music_video";
      break;
    };
    echo $mostrar;
  }

  function gIcono($a){
    switch($a){
      case 3:
        $icono = "local_movies";
      break;
      case 2:
        $icono = "music_video";
      break;
    } 
    return $icono;
  }

  function gMultimedia($categoria, $tipo){
    $this->cnx();
    $this->consulta = $this->conn->prepare("SELECT nombre, titulo, idarchivo FROM multimedia WHERE categoria = $categoria AND tipo = $tipo");
    $this->consulta->execute();
    $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
    $k=0;
    $j=count($this->respuesta);
      foreach($this->respuesta as $value){
        if($k==0){
          echo "<div class='row justify-content-center align-items-center'>"; 
        }
    ?>
    <div class = 'col-xs-12 col-lg-4'>
      <a data-toggle='modal' data-target="#myModal<?php echo $value['idarchivo'] ?>" data-backdrop="static" data-keyboard="false" onclick="document.getElementById('archivo<?php echo $value['idarchivo'] ?>').play();" class="col-4">
        <div class='carta color5' id='sdc'>
            <div class='card-encabezado text-center'><i class='material-icons md50 cfi7'><?php echo $this->gIcono($tipo) ?></i></div>
            <div class='card-body'><h4 class='text-center'><?php echo $value['titulo'] ?></h4></div>
        </div></a>
    </div>
        
        <div class='modal fade' id="myModal<?php echo $value['idarchivo'] ?>"  tabindex='5' role='dialog' >
          <div class='modal-dialog modal-xl'><div class='modal-content'></div>
          <div class='modal-content'><center><?php $this->gSrc($value['nombre'],$tipo,$value['idarchivo']) ?></center></div>           
        </div>
      </div>
    <?php  
        $k+=1;
        if($k==3 || $k==$j){
          echo "</div>";
          $k=0;
        }  
    }

    $this->dbClose();
  }

  function gTitulo(){
    echo $this->titulo;
  }

  function gSubtitulo(){
    echo $this->subtitulo;
  }

  function gAutor(){
    echo $this->autor;
  }

  function gFecha(){
    echo $this->fecha;
  }  

  function gContenido(){
    echo nl2br($this->contenido);
  }

  function gTcr(){
   echo $this->tcr;
  }
  
  function gPb(){
    return $this->pb;
   }

  function dbClose(){
    $this->conn = NULL;
    $this->consulta = NULL;
  }

 }

?>