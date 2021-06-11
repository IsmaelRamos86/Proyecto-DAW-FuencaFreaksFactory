<?php

function usuario_validado(){
    if(!comprobar_usuario()) {
      header('Location:login.php');
      exit();
    }

}

function comprobar_usuario(){

return isset($_SESSION['usuario']);
}

session_start();
usuario_validado();




?>
