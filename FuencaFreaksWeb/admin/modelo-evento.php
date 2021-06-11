<?php

//Comportamiento a la hora de CREAR un nuevo registro de Evento
if($_POST['registro'] == 'nuevo'){

        $titulo = $_POST['titulo-evento'];
        $categoria_id = $_POST['categoria-evento'];
        $director_id = $_POST['director-evento'];
        $fecha = $_POST['fecha-evento'];
        $hora = $_POST['hora-evento'];

        // die(json_encode($_POST));

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_direct) VALUES (?, ?, ?, ?, ?)");
                $stmn->bind_param("sssii", $titulo, $fecha, $hora, $categoria_id, $director_id);
                $stmn->execute();
                $id_insertado = $stmn->insert_id;
                if($stmn->affected_rows) {
                        $respuesta = array(
                          'respuesta' => 'exito',
                          'id_insertado' => $id_insertado
                        );
                } else {
                        $respuesta = array(
                          'respuesta' => 'error',
                        );
                }
                $stmn->close();
                $db->close();
        } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
        }
        die(json_encode($respuesta));
};

//Comportamiento a la hora de EDITAR un registro de Evento
if($_POST['registro'] == 'actualizar'){

  $titulo = $_POST['titulo-evento'];
  $categoria_id = $_POST['categoria-evento'];
  $director_id = $_POST['director-evento'];
  $fecha = $_POST['fecha-evento'];
  $hora = $_POST['hora-evento'];
  $id_evento = $_POST['id_registro'];

        try {
                include_once './funciones/funciones.php';
                        $stmn = $db->prepare('UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_direct =?, editado = NOW() WHERE id_evento = ?');
                        $stmn->bind_param("sssiii", $titulo, $fecha, $hora, $categoria_id, $director_id, $id_evento);

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
                };
                $stmn->close();
                $db->close();

        } catch (Exception $e) {
                $respuesta = array(
                    'respuesta' => $e->getMessage()
                );
        }

        die(json_encode($respuesta));
}

//Comportamiento a la hora de ELIMINAR un registro de evento
if($_POST['registro'] == 'eliminar'){

        $id_borrar = $_POST['id'];

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare('DELETE FROM eventos WHERE id_evento = ?');
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
