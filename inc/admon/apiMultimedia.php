<?php 
class Multimedia {
  private static $user;
  private static $password;
  private static $host;
  private $conn;
  private $consulta;
  private $respuesta = [];
  public $titulo;
  public $nombre;
  public $categoria;
  public $descripcion;
  public $dir;
  public $nfile;
  public $tipo;
  public $url;
  public $id;
  public $ext;
  public $src;

  public function __construct() {
    self::$user = 'admin';
    self::$password = 3125480765;
    self::$host = "mysql:host=localhost;dbname=bdtiferet";
  }

//Metods
  function cnx(){
    try {
      $this->conn = new PDO(self::$host,self::$user,self::$password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch (Exception $e) {
      echo "Error al conectar con la App";       
    }
  }

  function dbClose(){
    $this->conn = NULL;
    $this->consulta = NULL;
  }

 function Vfile($nfile){
  $this->ext = strstr($nfile, '.', false); //tomara el string despues del punto indicado
  switch ($this->ext){
    case ".jpg":
      $this->tf = 1;
    break;
    case ".mp3":
      $this->tf =2;
    break;
    case ".mp4":
      $this->tf = 3;
    break;
    default:
    $this->tf = 0;
  }
  return $this->tf;
 }

 function gExt(){
   return $this->ext;
 }

 function gSrc($a){
    $this->src="/../../upload/".$article->gNombre();
    switch($article->gTipo()){
      case 1:
         echo "<center><img src=".$this->src."></center>";
      break;
      case 3:
       echo "<center><video src=".$this->src." width='640' height='480' controls preload='auto'>Tu navegador no soporta MP4.</video></center>";
      break;
      
      case 2:
       echo "<center><audio src=".$this->src."  preload='auto' controls>Tu navegador no Soporta MP3.</audio></center>";
      break;
    };
  
 }

 function Mfile($nfile, $titulo, $descripcion, $categoria, $tipo, $direccion, $ntf){
  $ruta = '../../upload/'.$nfile;
  move_uploaded_file($ntf,$ruta);
  $this->cnx();
  $this->consulta = $this->conn->prepare("INSERT INTO multimedia (nombre, titulo, descripcion, categoria, tipo, dir) values(:nombre,:titulo,:descripcion,:categoria,:tipo, :direccion)");
  $this->consulta->execute(array(":nombre"=>$nfile, ":titulo"=>$titulo, ":descripcion"=>$descripcion, ":categoria"=>$categoria, ":tipo"=>$tipo, ":direccion"=>$direccion));
 }

 function BMultimedia($p){
  $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("SELECT * FROM multimedia WHERE idarchivo = $p");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($this->respuesta as $valor){
          $this->titulo = $valor['titulo'];
          $this->nombre = $valor['nombre'];
          $this->categoria = $valor['categoria'];
          $this->dir = $valor['dir'];
          $this->descripcion = $valor['descripcion'];
          $this->idfile = $valor['idarchivo'];
          $this->nfile = $valor['nombre'];
          $this->tipo = $valor['tipo'];
        } 
    } catch (Exception $e){
      echo "No hay resultados para mostrar";
    }
  $this->dbClose();
}

function Listado($tipo, $categoria){
  $this->cnx();
  try{
    $this->consulta = $this->conn->prepare("SELECT nombre, idarchivo FROM multimedia WHERE tipo = $tipo AND categoria = $categoria");
    $this->consulta->execute();
    $this->respuesta = $this->consulta->fetchAll();
    echo '<ul class="tlink">';
    foreach ($this->respuesta as $value){
      echo '<li><a href="?c=2&a='.(int)$value['idarchivo'].'">'.$value['nombre'].'</a></li>';
    }
    echo '</ul>';
    $src="";
  } catch (Exception $e) {
    $_SESSION['result']=3;  
  }
  $this->dbClose();
}

function txtTipo($tipo){
 switch($tipo){
   case 1:
    echo " Imagen de";
   break;
   case 2:
    echo " Audio de";
   break;
   case 3:
    echo " Video de";
   break;
 }
}

function txtContenido($categoria){
  switch($categoria){
    case 1:
     echo " Parasha";
    break;
    case 2:
     echo " Segula";
    break;
    case 3:
     echo " Articulo de Emuna y Bitajon";
    break;
    case 4:
      echo " Recetas";
     break;
     case 5:
      echo " Tziniut";
     break;
     case 6:
      echo " Galeria";
     break;
     case 7:
      echo " Lugares";
     break;
  }
 }

function gTitulo(){
  echo $this->titulo;
}

function gNombre(){
  return $this->nombre;
}

function gCategoria(){
  return $this->categoria;
}

function gDir(){
  echo $this->dir;
}

function gDescripcion(){
  echo $this->descripcion;
}

function gIdfile(){
  echo $this->idfile;
}

function gNfile(){
  echo $this->nfile;
}

function gTipo(){
  return $this->tipo;
}


function DelMultimedia($p){
  $this->cnx();
  try{
    $this->consulta = $this->conn->prepare("DELETE FROM multimedia WHERE (idarchivo=$p)");
    $this->consulta->execute();
  } catch (Exception $e){
    echo "Error al eliminar";
  }
$this->dbClose();
}

function UpMultimedia($categoria, $tipo, $nombre, $titulo, $descripcion, $dir, $idarchivo){
  $this->cnx();
  try{
    $this->consulta = $this->conn->prepare("UPDATE articulos set categoria = :categoria, descripcion = :descripcion, dir = :dir, nombre = :nombre, tipo = :tipo, titulo = :titulo, dir = :dir WHERE (idarchivo= :idarchivo)");
    $this->consulta->execute(array(":categoria"=>$categoria, ":tipo"=>$tipo, ":nombre"=>$nombre, ":titulo"=>$titulo, ":descripcion"=>$descripcion, ":dir"=>$dir, ":idarchivo"=>$idarchivo));
  } catch (Exception $e){
    echo "Error al actualizar";
  }
$this->dbClose();
}

}
?>