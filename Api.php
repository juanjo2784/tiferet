<?php
error_reporting(0);
class BD {
  private static $user;
  private static $password;
  private $conn;
  private $consulta;
  private $respuesta = [];
  private $titulo;
  private $contenido;
  private $tcr;
  private $pb;
  

  public function __construct() {
    self::$user = 'n260m_24705181';
    self::$password = '27Ch4v3z';
  }

//Metods
  function cnx(){
    try {
      $this->conn = new PDO("mysql:host=sql104.260mb.net;dbname=n260m_24705181_bdtiferet",self::$user,self::$password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch (Exception $e) {
      echo "Error al conectar con la App";       
    }
  }

  function ListadoArticulos($tipo){
    $this->cnx();
    echo $p;
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