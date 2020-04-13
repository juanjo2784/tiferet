<?php

class Admin {
  private static $user;
  private static $password;
  private static $host;
  private $conn;
  private $consulta;
  private $respuesta = [];
  public $titulo;
  public $subtitulo;
  public $autor;
  public $tcr;
  public $contenido;
  public $fecha;
  public $id;
  public $tipo;
  public $tf; //tipo de archivo
  public $nfile;

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

  function ListadoArticulos($tipo){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("select titulo, idArticulos from articulos where tipo = $tipo");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll();
      echo '<ul>';
      foreach ($this->respuesta as $value){
        echo '<li class="nav-item"><a class="slink"  href="?c=1&a='.(int)$value['idArticulos'].'">'.$value['titulo'].'</a></li>';
      }
      echo '</ul>';
    } catch (Exception $e) {
      echo "Error al realizar la consulta";   
    }
    $this->dbClose();
  }
 
  public function AddArticulo($titulo, $subtitulo, $autor, $tipo,  $tcr, $contenido, $fecha, $nimg){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("INSERT INTO articulos (idArticulos,titulo, subtitulo, autor, tipo,  tcr, contenido, fecha, nimg) VALUES (null,:titulo,:subtitulo,:autor,:tipo,:contenido, :tcr, :fecha, :nimg)");
      $this->consulta->execute(array(":titulo"=>$titulo, ":subtitulo"=>$subtitulo, ":autor"=>$autor, ":tipo"=>$tipo, ":contenido"=>$contenido, ":tcr"=>$tcr, ":fecha"=>$fecha, ":nimg"=>$nimg));
    } catch(PDOException $e){
        echo "Errores al guardar el registro";
    }
  }
  
  function BuscarArticulo($p){
    $this->cnx();
      try{
        $this->consulta = $this->conn->prepare("SELECT * FROM articulos WHERE idArticulos = $p");
        $this->consulta->execute();
        $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
          foreach($this->respuesta as $valor){
            $this->titulo = $valor['titulo'];
            $this->subtitulo = $valor['subtitulo'];
            $this->autor = $valor['autor'];
            $this->contenido = $valor['contenido'];
            $this->tcr = $valor['tcr'];
            $this->fecha = $valor['fecha'];
            $this->nfile = $valor['nimg'];
            $this->id = $p;
          } 
      } catch (Exception $e){
        echo "No hay resultados para mostrar";
      }
    $this->dbClose();
  }

  function UpdateArticulo($titulo,$subtitulo,$autor,$contenido,$tcr,$fecha,$p,$nimg){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("UPDATE articulos set titulo = :titulo, subtitulo = :subtitulo, autor = :autor, contenido = :contenido, tcr = :tcr, fecha = :fecha, nimg = :nimg WHERE (idArticulos= :id)");
      $this->consulta->execute(array(":titulo"=>$titulo, ":subtitulo"=>$subtitulo, ":autor"=>$autor, ":contenido"=>$contenido, ":tcr"=>$tcr, ":fecha"=>$fecha, "id"=>$p, ":nimg"=>$nimg));
    } catch (Exception $e){
      echo "Error al actualizar";
    }
  $this->dbClose();
  }

  function DelArticulo($p){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("DELETE FROM articulos WHERE (idArticulos=$p)");
      $this->consulta->execute();
    } catch (Exception $e){
      echo "Error al eliminar";
    }
  $this->dbClose();
  }


  function Eventos(){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("SELECT * FROM eventos");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($this->respuesta);
      } catch (Exception $e) {
      echo "Error al realizar la consulta";   
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

  function gContenido(){
    echo $this->contenido;
  }

  function gTcr(){
    echo $this->tcr;
  }

  function gFecha(){
    echo $this->fecha;
  }  

  function gId(){
    echo $this->id;
  }

  function gNimg(){
    echo $this->nfile;
  } 

  function dbClose(){
    $this->conn = NULL;
    $this->consulta = NULL;
  }

 }
?>