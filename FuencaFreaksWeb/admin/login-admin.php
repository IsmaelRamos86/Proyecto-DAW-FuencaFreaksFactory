<?php

if(isset($_POST['login-admin'])){

  $usuario = $_POST['usuario'];
  $password = $_POST['password'];

  try {
    include_once './funciones/funciones.php';
    $stmn = $db->prepare("SELECT * FROM administradores WHERE usuario = ?;");
    $stmn->bind_param("s", $usuario);
    $stmn->execute();
    $stmn->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado, $superuser);
    if($stmn->affected_rows){
      $existe = $stmn->fetch();
      if($existe) {
          if(password_verify($password, $password_admin)){

            // Abrimos sesion si todo es correcto
            session_start();
            $_SESSION['id_admin'] = $id_admin;
            $_SESSION['usuario'] = $usuario_admin;
            $_SESSION['nombre'] = $nombre_admin;
            $_SESSION['superuser'] = $superuser;

            $respuesta = array(
              'respuesta' => 'acceso_correcto',
              'usuario' => $nombre_admin,
            );
          } else {
            $respuesta = array(
              'respuesta' => 'no_coincide'
            );
          }
      }else{
        $respuesta = array(
          'respuesta' => 'no_existe'
        );
      }
    }
    $stmn->close();
    $db->close();

  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

  die(json_encode($respuesta));
}

?>
