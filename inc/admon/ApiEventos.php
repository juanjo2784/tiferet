<?php

class Evento {
  private static $user;
  private static $password;
  private static $host;
  private $conn;
  private $consulta;
  private $respuesta = [];

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

  function Eventos(){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("SELECT title, inicio as start, textColor, backgroundColor, dir, id FROM eventos");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($this->respuesta);
      } catch (Exception $e) {
      echo "Error al realizar la consulta";   
    }
    $this->dbClose();
  }

  function dbClose(){
    $this->conn = NULL;
    $this->consulta = NULL;
  }

  function AddEvento($json){
    $this->cnx();
    $title=$json[0];
    $inicio=$json[1];
    $color=$json[2];
    $fondo=$json[3];
    $dir=$json[4];
    $id = $json[5];
    try{
      $this->consulta = $this->conn->prepare("INSERT INTO eventos (title, inicio, backgroundColor, textColor, dir) VALUES ($title,$inicio,$fondo, $color, $dir)");
      $this->consulta->execute();
    } catch(PDOException $e){
      echo "Errores al guardar el registro";
    }
    $this->dbClose();
  }

  function upEvento($json){
    $this->cnx();
    $title=$json[0];
    $inicio=$json[1];
    $color=$json[2];
    $fondo=$json[3];
    $dir=$json[4];
    $id = $json[5];
    try{
      $this->consulta = $this->conn->prepare("UPDATE eventos set title = :title, inicio = :inicio, color = :color, fondo = :fondo, dir = :dir WHERE (id= :id)");
      $this->consulta->execute(array(":title"=>$title, ":inicio"=>$inicio, ":color"=>$color, ":fondo"=>$fondo, ":dir"=>$dir, ":id"=>$id));
    } catch (Exception $e){
      echo "Error al actualizar";
    }
  $this->dbClose();
  }

 }
?>