<?php 
session_start();

if(isset($_POST['user']) && isset($_POST['pwd'])){
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
}

class user{
  private $usuario = "tiferet";
  private $contraseña = "123";

  function validar($user, $pwd){
   if($user == $this->usuario && $pwd == $this->contraseña){
      $_SESSION['user']="Administrador";
      header('location: indexAdmin.php');
    }else{
      echo "Error de Usuario o contraseña, intente nuevamente";
    }

  }
  }
$login = new user;
$login->validar($_POST['user'],$_POST['pwd'])

?>