<?php 
include_once("conexion.php");
class Multimedia extends CNX {
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
  
  function BMultimedia($p){
  $conn = $this->cnx();
    try{
      $this->consulta = $conn->prepare("SELECT * FROM multimedia WHERE idarchivo = $p");
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

  function addFile($ruta, $tmp_name){
    try{
     move_uploaded_file($tmp_name,$ruta);
     $_SESSION['msg']=6;
    }catch(Exception $e){
     $_SESSION['msg']=7;
    }
  }

  function Mfile($nfile, $titulo, $descripcion, $categoria, $tipo, $direccion, $ntf){
    switch($tipo){
      case 1:
        $ruta = '../../upload/Imagenes/'.$nfile;
      break;
      case 2:
        $ruta = '../../upload/Audio/'.$nfile;
      break;
      case 3:
        $ruta = '../../upload/Video/'.$nfile;
      break;
    }
    
    move_uploaded_file($ntf,$ruta);
    $conn = $this->cnx();
    $this->consulta = $conn->prepare("INSERT INTO multimedia (nombre, titulo, descripcion, categoria, tipo, dir) values(:nombre,:titulo,:descripcion,:categoria,:tipo, :direccion)");
    $this->consulta->execute(array(":nombre"=>$nfile, ":titulo"=>$titulo, ":descripcion"=>$descripcion, ":categoria"=>$categoria, ":tipo"=>$tipo, ":direccion"=>$direccion));
   }

  function Listado($tipo, $categoria){
   $conn = $this->cnx();
   try{
     $this->consulta = $conn->prepare("SELECT nombre, idarchivo FROM multimedia WHERE tipo = $tipo AND categoria = $categoria");
     $this->consulta->execute();
     $this->respuesta = $this->consulta->fetchAll();
     echo '<ul class="tlink">';
     foreach ($this->respuesta as $value){
       echo '<li><a href="?c=2&a='.(int)$value['idarchivo'].'&n='.$value['nombre'].'&t='.$tipo.'">'.$value['nombre'].'</a></li>';
     }
     echo '</ul>';
     $src="";
   } catch (Exception $e) {
    echo "error";  
   }
   $this->dbClose();
 }
 
 function DelMultimedia($p){
   $conn = $this->cnx();
   try{
     $this->consulta = $conn->prepare("DELETE FROM multimedia WHERE (idarchivo=$p)");
     $this->consulta->execute();
   } catch (Exception $e){
     echo "Error al eliminar";
   }
 $this->dbClose();
 }
 
 function UpMultimedia($categoria, $tipo, $nombre, $titulo, $descripcion, $dir, $idarchivo){
  $conn = $this->cnx();
  try{
    $this->consulta = $conn->prepare("UPDATE multimedia set categoria = :categoria, descripcion = :descripcion, dir = :dir, nombre = :nombre, tipo = :tipo, titulo = :titulo, dir = :dir WHERE (idarchivo= :idarchivo)");
    $this->consulta->execute(array(":categoria"=>$categoria, ":tipo"=>$tipo, ":nombre"=>$nombre, ":titulo"=>$titulo, ":descripcion"=>$descripcion, ":dir"=>$dir, ":idarchivo"=>$idarchivo));
  } catch (Exception $e){
    echo "Error al actualizar";
  }
  $this->dbClose();
 }

  function dbClose(){
    $conn = NULL;
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
    switch($article->gTipo()){
      case 1:
        $this->src="/../../upload/Imagenes/".$this->gNombre();
         echo "<center><img src=".$this->src."></center>";
      break;
      case 3:
        $this->src="/../../upload/Videos/".$this->gNombre();
       echo "<center><video src=".$this->src." width='640' height='480' controls preload='auto'>Tu navegador no soporta MP4.</video></center>";
      break;
      
      case 2:
        $this->src="/../../upload/Audio/".$this->gNombre();
       echo "<center><audio src=".$this->src."  preload='auto' controls>Tu navegador no Soporta MP3.</audio></center>";
      break;
    };
  
 }

function itipo($a){
  switch ($a) {
    case 1:
        $listado = "Lista de Imagenes";
        break;
    case 2:
        $listado = "Lista de Audios";
        break;
    case 3:
        $listado = "Lista de Videos";
        break;
    default:
    $listado = "Debe seleccionar un opción";
  }
  echo $listado;
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
  switch($this->tipo){
    case 1:
     $src="/../../upload/Imagenes/".$this->gNombre();
       echo "<center><img src=".$src." max-height='240' class='p-3'></center>";
    break;
    case 3:
     $src="/../../upload/Videos/".$this->gNombre();
     echo "<center><video src=".$src." height='240' controls preload='auto' class='p-3'>Tu navegador no soporta MP4.</video></center>";
    break;
    
    case 2:
     $src="/../../upload/Audio/".$this->gNombre();
     echo "<center><audio src=".$src." controls autoplay class='p-3'>Tu navegador no Soporta MP3.</audio></center>";
    break;
  };
}

function gRuta($tipo){
  switch($tipo){
    case 1:
      $pruta="../../upload/Imagenes/";
    break;
    case 2:
      $pruta="../../upload/Audio/";
    break;
    case 3:
      $pruta="../../upload/Videos/";
    break;
  }
  return $pruta;
}

}
?>