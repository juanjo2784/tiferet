<?php
include_once("../../../config/tiferet/conexion.php");
class Evento extends CNX {
  private $consulta;
  private $respuesta = [];

  function addFile($ruta, $tmp_name){
    try{
     move_uploaded_file($ruta, $tmp_name);
     $_SESSION['msg']=6;
    }catch(Exception $e){
     $_SESSION['msg']=7;
    }
  }

  function Eventos(){
    $conn = $this->cnx();
    try{
      $this->consulta = $conn->prepare("SELECT title, inicio as start, textColor, backgroundColor, dir, id, img, audio FROM eventos");
      $this->consulta->execute();
      $this->respuesta = $this->consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($this->respuesta);
      } catch (Exception $e) {
      echo "Error al realizar la consulta";   
    }
    $this->dbClose();
  }

  function dbClose(){
    $conn = NULL;
    $this->consulta = NULL;
  }

  function AddEvento($title, $inicio, $color, $fondo, $dir, $img){
    $conn = $this->cnx();
      $this->consulta = $conn->prepare("INSERT INTO eventos (title, inicio, backgroundColor, textColor, dir, img) VALUES (:title, :inicio, :backgroundColor, :textColor, :dir, :img)");
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
    $conn = $this->cnx();
    try{
      $this->consulta = $conn->prepare("UPDATE eventos set title=:title, inicio=$inicio, textColor=$color, backgroundColor=$fondo, dir=:dir, img=$img, audio=$audio  WHERE (id=$id)");
      $this->consulta->execute(array(":title"=>$title, ":dir"=>$dir));
    }catch(Exception $e){
      echo "Error en la consulta: ".$e;
    }finally{
      $this->dbClose();
    }
  }

  function delEvento($id){
    $conn = $this->cnx();
    try{
      $this->consulta = $conn->prepare("DELETE FROM eventos WHERE (id=$id)");
      $this->consulta->execute();
    } catch (Exception $e){
      echo "Error al eliminar";
    }
  $this->dbClose();
  }


 }
?>