<?php 
  require_once('ApiEventos.php');
  $evento = new Evento();
  $doc = new DomDocument;
  $id2 = $doc->getElementById('idevento');
if($_POST){
  $id = (isset($_POST['idevento']))?$_POST['idevento']:null;
  $title = (isset($_POST['title']))?$_POST['title']:null;
  $inicio =(isset($_POST['inicio']))?$_POST['fecha']." ".$_POST['inicio']:null;
  $color= (isset($_POST['textColor']))?$_POST['textColor']:null;
  $fondo=(isset($_POST['backgroundColor']))?$_POST['backgroundColor']:null;
  $dir=(isset($_POST['dir']))?$_POST['dir']:null;
  $action = (isset($_POST['action']))?$_POST['action']:null;
  $img=(isset($_FILES['img']['name']))?"../../upload/Eventos/".$_FILES['img']['name']:null;
  $audio=(isset($_FILES['audio']['name']))?"../../upload/Eventos/".$_FILES['audio']['name']:null;
  $tmpNameImg=(isset($_FILES['img']['tmp_name']))?$_FILES['img']['tmp_name']:null;
  $tmpNameAudio=(isset($_FILES['audio']['tmp_name']))?$_FILES['audio']['tmp_name']:null;
  var_dump($_POST);
  try{
  switch ($action){
    case 1:
      $evento->Eventos();
      $_SESSION['msg']=1;
    break;
    case 2:
      $evento->addEvento($title, $inicio, $color, $fondo, $dir, $img);
      $_SESSION['msg']=2;
      if($img){
        $ruta = "../../upload/Eventos/".$img;
        $evento->addFile($tmpName, $ruta);
      }
      header("location: indexAdmin.php?a=eventos");
    break;
    case 3:
      echo $id;
      $evento->upEvento($id, $title, $inicio, $color, $fondo, $dir, $img, $audio);
      $_SESSION['msg']=3;
      //header("location: indexAdmin.php?a=eventos");
    break;
  }
  }catch(Exception $e){
      $_SESSION['msg']=0;
      header("location: indexAdmin.php?a=eventos");
  }
}
?>