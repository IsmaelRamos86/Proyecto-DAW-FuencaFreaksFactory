<?php

//Comportamiento a la hora de CREAR un nuevo registro de Administrador
if($_POST['registro'] == 'nuevo'){

        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Establecemos una complejidad de encriptación y encriptamos la pass
        $opciones = array(
          'cost' => 8
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare("INSERT INTO administradores (usuario, nombre, password) VALUES (?, ?, ?)");
                $stmn->bind_param("sss", $usuario, $nombre, $password_hashed);
                $stmn->execute();
                $id_registro = $stmn->insert_id;
                if($id_registro > 0){
                        $respuesta = array(
                        'respuesta' => 'exito',
                        'id_admin' => $id_registro
                        );
                } else {
                        $respuesta = array(
                        'respuesta' => 'error',
                        'id_admin' => $id_registro
                        );
                }
                $stmn->close();
                $db->close();
        } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
}

//Comportamiento a la hora de EDITAR un registro de Administrador
if($_POST['registro'] == 'actualizar'){

        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $id_registro = $_POST['id_registro'];

        try {
                include_once './funciones/funciones.php';
                // If para que no nos modifique el password
                if(empty($_POST['password'])){
                        $stmn = $db->prepare('UPDATE administradores SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?');
                        $stmn->bind_param("ssi", $usuario, $nombre, $id_registro);
                } else {
                        $opciones = array(
                            'cost' => 8
                        );
                        $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
                        $stmn = $db->prepare('UPDATE administradores SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ?');
                        $stmn->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
                }
                $stmn->execute();
                if($stmn->affected_rows) {
                        $respuesta = array(
                            'respuesta' => 'exito',
                            'id_actualizado' => $stmn->insert_id
                        );
                } else {
                        $respuesta = array(
                            'respuesta' => 'error'
                        );
                }
                $stmn->close();
                $db->close();

        } catch (Exception $e) {
                $respuesta = array(
                    'respuesta' => $e->getMessage()
                );
        }

        die(json_encode($respuesta));
}

//Comportamiento a la hora de ELIMINAR un registro de Administrador
if($_POST['registro'] == 'eliminar'){

        $id_borrar = $_POST['id'];

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare('DELETE FROM administradores WHERE id_admin = ?');
                $stmn->bind_param("i", $id_borrar);
                $stmn->execute();
                if($stmn->affected_rows){
                  $respuesta = array(
                    'respuesta' => 'exito',
                    'id_eliminado' => $id_borrar
                );
                } else {
                  $respuesta = array(
                    'respuesta' => 'error',
                );
                }



        } catch (Exception $e) {
                $respuesta = array(
                    'respuesta' => $e->getMessage()
                );
        }


        die(json_encode($respuesta));

};
?>
