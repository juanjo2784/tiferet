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
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      echo "Error al conectar con la App";       
    }
  }

  function addFile($ruta, $tmp_name){
    try{
     move_uploaded_file($ruta, $tmp_name);
     $_SESSION['msg']=6;
    }catch(Exception $e){
     $_SESSION['msg']=7;
    }
  }

  function Eventos(){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("SELECT title, inicio as start, textColor, backgroundColor, dir, id, img, audio FROM eventos");
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

  function AddEvento($title, $inicio, $color, $fondo, $dir, $img){
    $this->cnx();
      $this->consulta = $this->conn->prepare("INSERT INTO eventos (title, inicio, backgroundColor, textColor, dir, img) VALUES (:title, :inicio, :backgroundColor, :textColor, :dir, :img)");
      $this->consulta->execute(array(":title"=>$title, ":inicio" => $inicio, ":backgroundColor"=>$fondo, ":textColor"=>$color, ":dir"=>$dir,":img"=> $img));
      $this->dbClose();
  }

  function upEvento($id, $title, $inicio, $color, $fondo, $dir, $img, $audio){
    $inicio='\''.$inicio.'\'';
    $img='\''.$img.'\'';
    $audio='\''.$audio.'\'';
    $color='\''.$color.'\'';
    $fondo='\''.$fondo.'\'';
    echo "imagen ".$img." auido: ".$audio;
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("UPDATE eventos set title=:title, inicio=$inicio, textColor=$color, backgroundColor=$fondo, dir=:dir, img=$img, audio=$audio  WHERE (id=$id)");
      $this->consulta->execute(array(":title"=>$title, ":dir"=>$dir));
    }catch(Exception $e){
      echo "Error en la consulta: ".$e;
    }finally{
      $this->dbClose();
    }
  }

  function delEvento($id){
    $this->cnx();
    try{
      $this->consulta = $this->conn->prepare("DELETE FROM eventos WHERE (id=$id)");
      $this->consulta->execute();
    } catch (Exception $e){
      echo "Error al eliminar";
    }
  $this->dbClose();
  }


 }
?>