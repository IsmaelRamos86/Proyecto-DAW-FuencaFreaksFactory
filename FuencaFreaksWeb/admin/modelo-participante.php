<?php
                include_once './funciones/funciones.php';


//Comportamiento a la hora de CREAR un nuevo PARTICIPANTE
if($_POST['registro'] == 'nuevo'){


                // $nombre = $_POST['nombre-participante'];
                $nombre = $_POST['nombre-participante'];
                $apellido = $_POST['apellido-participante'];
                $email = $_POST['email-participante'];
                $regalo = $_POST['regalo'];
                $total = $_POST['total_pedido'];
                $fecha_registro = $_POST['fecha_registro'];
                //PARTIDAS
                $costePartidas = $_POST['budget'];
                $cantidadPartidas = 0;
                switch ($costePartidas) {
                  case '15':
                      $cantidadPartidas = 3;
                      $opcion['partidas']['cantidad'] = 3;
                      $opcion['partidas']['precio'] = 15;
                      break;
                  case '5':
                      $cantidadPartidas = 1;
                      $opcion['partidas']['cantidad'] = 1;
                      $opcion['partidas']['precio'] = 5;
                      break;
                  case '20':
                      $cantidadPartidas = 5;
                      $opcion['partidas']['cantidad'] = 5;
                      $opcion['partidas']['precio'] = 20;
                      break;
              }

                //CAMISETAS Y PEGATINAS
                $partidas = $opcion['partidas']['cantidad'];
                $camisas = $_POST['opcion']['camisas']['cantidad'];
                $pegatinas = $_POST['opcion']['pegatinas']['cantidad'];;
                $pedido = lista_productos_json($partidas, $camisas, $pegatinas);



                if(!isset($_POST['registro_evento'])){
                  $respuesta = array(
                    'respuesta' => 'error'
                );
                die(json_encode($respuesta));
                };

                $eventos = $_POST['registro_evento'];
                $registro_eventos = eventos_json($eventos);
                $id_registro = $_POST['id_registro'];

        try {


          $stmn = $db->prepare("INSERT INTO participantes (nombre_participante, apellido_participante, email_participante, fecha_registro, opciones_articulos, eventos_seleccionados, regalo, total_pago, pagado, editado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 1, NOW())");
          $stmn->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro_eventos, $regalo, $total);
          $stmn->execute();
          // die(json_encode($pedido));
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

//Comportamiento a la hora de EDITAR un PARTICIPANTE
if($_POST['registro'] == 'actualizar'){

                // $nombre = $_POST['nombre-participante'];
                $nombre = $_POST['nombre-participante'];
                $apellido = $_POST['apellido-participante'];
                $email = $_POST['email-participante'];

                //PARTIDAS
                $costePartidas = $_POST['budget'];
                $cantidadPartidas = 0;
                switch ($costePartidas) {
                  case '15':
                      $cantidadPartidas = 3;
                      $opcion['partidas']['cantidad'] = 3;
                      $opcion['partidas']['precio'] = 15;
                      break;
                  case '5':
                      $cantidadPartidas = 1;
                      $opcion['partidas']['cantidad'] = 1;
                      $opcion['partidas']['precio'] = 5;
                      break;
                  case '20':
                      $cantidadPartidas = 5;
                      $opcion['partidas']['cantidad'] = 5;
                      $opcion['partidas']['precio'] = 20;
                      break;
              }
              $partidas = $opcion['partidas']['cantidad'];

                //CAMISETAS Y PEGATINAS
                $camisas = $_POST['opcion']['camisas']['cantidad'];
                $pegatinas = $_POST['opcion']['pegatinas']['cantidad'];
                $pedido = lista_productos_json($partidas, $camisas, $pegatinas);

                $total = $_POST['total_pedido'];
                $regalo = $_POST['regalo'];
                if(!isset($_POST['registro_evento'])){
                  $respuesta = array(
                    'respuesta' => 'error'
                );
                die(json_encode($respuesta));
                };

                $eventos = $_POST['registro_evento'];
                $registro_eventos = eventos_json($eventos);

                $fecha_registro = $_POST['fecha_registro'];
                $id_registro = $_POST['id_registro'];

        try {

                $stmn = $db->prepare('UPDATE participantes SET nombre_participante = ?, apellido_participante = ?, email_participante = ?, fecha_registro = ?, opciones_articulos = ?, eventos_seleccionados = ?, regalo = ?, total_pago = ?, pagado = 1, editado =NOW() WHERE id_participante = ?');
                $stmn->bind_param("ssssssisi", $nombre, $apellido, $email, $fecha_registro, $pedido, $registro_eventos, $regalo, $total, $id_registro);
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

//Comportamiento a la hora de ELIMINAR un registro de evento
if($_POST['registro'] == 'eliminar'){
  $id_borrar = $_POST['id'];


  try {

          $stmn = $db->prepare('DELETE FROM participantes WHERE id_participante = ?');
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
