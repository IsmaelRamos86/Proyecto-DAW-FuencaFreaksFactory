<?php

//Comportamiento a la hora de CREAR un nuevo registro de Administrador
if($_POST['registro'] == 'nuevo'){

  // die(json_encode($_POST));

        $nombre_categoria = $_POST['nombre-categoria'];
        $icono = $_POST['icono'];
        try {
                include_once './funciones/funciones.php';

                $stmn = $db->prepare('INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)');
                $stmn->bind_param("ss", $nombre_categoria, $icono);
                $stmn->execute();
                $id_registro = $stmn->insert_id;
                if($stmn->affected_rows) {
                  $respuesta = array(
                      'respuesta' => 'exito',
                      'id_insertado' => $id_registro
                  );
          } else {
                  $respuesta = array(
                      'respuesta' => 'error'
                  );
          }
                $stmn->close();
                $db->close();
        } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
};

//Comportamiento a la hora de EDITAR un registro de Administrador
if($_POST['registro'] == 'actualizar'){

    // die(json_encode($_POST));

  $nombre_categoria = $_POST['nombre-categoria'];
  $icono = $_POST['icono'];
  $id_registro = $_POST['id_registro'];

        try {
                include_once './funciones/funciones.php';

                $stmn = $db->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?');
                $stmn->bind_param("ssi", $nombre_categoria, $icono, $id_registro);
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
                $stmn = $db->prepare('DELETE FROM categoria_evento WHERE id_categoria = ?');
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
