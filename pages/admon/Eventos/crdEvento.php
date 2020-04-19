<?php 
  session_start();
  require_once('../Model/mEventos.php');
  $evento = new Evento();
if($_POST){
  $id = (isset($_POST['idevento']))?$_POST['idevento']:0;
  $title = (isset($_POST['title']))?$_POST['title']:null;
  $inicio =(isset($_POST['inicio']))?$_POST['fecha']." ".$_POST['inicio']:null;
  $color= (isset($_POST['textColor']))?$_POST['textColor']:null;
  $fondo=(isset($_POST['backgroundColor']))?$_POST['backgroundColor']:null;
  $dir=(isset($_POST['dir']))?$_POST['dir']:null;
  $action = (isset($_POST['action']))?$_POST['action']:null;

  $audio=(isset($_POST['rutaudio']))?($_FILES['audio'])?"../../upload/Eventos/".$_FILES['audio']['name']:NULL:($_FILES['audio'])?"../../upload/Eventos/audio/".$_FILES['audio']['name']:$_POST['rutaudio']; 
  $tmpNameAudio=(isset($_FILES['audio']['tmp_name']))?$_FILES['audio']['tmp_name']:null;
  try{
  switch ($action){
    case 1:
      $evento->Eventos();
      $_SESSION['msg']=1;
    break;
    case 2:
      if(!empty($_FILES['img']['name'])){
        $img= "../../upload/Eventos/".$_FILES['img']['name'];
        $tmpNameimg=$_FILES['img']['tmp_name'];
        $evento->addFile($tmpNameimg, $img);
      }else{
        $img=$_POST['rutaimg'];
      }
      $evento->addEvento($title, $inicio, $color, $fondo, $dir, $img);
      $_SESSION['msg']=2;
      header("location: /pages/admon/admin.php?a=eventos");
    break;
    case 3:
//agregamos el archivo de audio y eliminamos el existente cuando exista
        if(!empty($_FILES['img2']['name'])){
          if(!empty($_POST['rutaimg'])){
            unlink($_POST['rutaimg']);
          }
          $img= "../../upload/Eventos/".$_FILES['img2']['name'];
          $tmpNameimg=$_FILES['img2']['tmp_name'];
          $evento->addFile($tmpNameimg, $img);
        }else{
          $img=$_POST['rutaimg'];
        }

        if(!empty($_FILES['audio']['name'])){
          if(!empty($_POST['rutaudio'])){
            unlink($_POST['rutaudio']);
          }
          $audio= "../../upload/Eventos/Audio/".$_FILES['audio']['name'];
          $tmpNameAudio=$_FILES['audio']['tmp_name'];
          $evento->addFile($tmpNameAudio, $audio);
        }else{
          $audio=$_POST['rutaudio'];
        }
//ejecutamos la funccion de agregar evento
    $evento->upEvento($id, $title, $inicio, $color, $fondo, $dir, $img, $audio);
    $_SESSION['msg']=3;
    header("location: /pages/admon/admin.php?a=eventos");
    break;
  }
  }catch(Exception $e){
      $_SESSION['msg']=0;
      header("location: /pages/admon/admin.php?a=eventos");
  }
}
?>