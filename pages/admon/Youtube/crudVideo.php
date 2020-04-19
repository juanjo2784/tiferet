<?php 
  session_start();
  require_once('../Model/mVY.php');
  $video = new Video();
  $action = (isset($_GET['action']))?$_GET['action']:$_POST['action'];
if($_POST){
  $titulo= (isset($_POST['titulo']))?$_POST['titulo']:null;
  $tipo=$_SESSION['tipo'];
  $url=(isset($_POST['url']))?$_POST['url']:null;
  try{
    switch ($action){
      case 2:
        var_dump($_POST);
        $video->AddVideo($titulo, $tipo, $url);
        $_SESSION['msg']=2;
        header("location:/pages/admon/admin.php?a=video");
      break;
      case 3:
      $id = (isset($_POST['id']))?$_POST['id']:0;
      $titulo = "'".$titulo."'";
      $url="'".$url."'";
      $tipo="'".$tipo."'";
      $video->UpVideo($id, $titulo, $tipo, $url);
      $_SESSION['msg']=3;
      header("location:/pages/admon/admin.php?a=adminvideo");
      break;
    }
    }catch(Exception $e){
        $_SESSION['msg']=0;
    }

}else{
    $id = (isset($_GET['id']))?$_GET['id']:0;
    $video->DelVideo($id);
    $_SESSION['msg']=3;
    header("location: /pages/admon/admin.php?a=adminvideo");
}
?>