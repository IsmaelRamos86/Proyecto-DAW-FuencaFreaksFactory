<?php

//Comportamiento a la hora de CREAR un nuevo DIRECTOR DE JUEGO
if($_POST['registro'] == 'nuevo'){

        $nombre_director = $_POST['nombre-director'];
        $apellido_director = $_POST['apellido-director'];
        $descripcion_director = $_POST['descripcion-director'];

        $directorio = "../img/directores/";

        if(!is_dir($directorio)){
          mkdir($directorio,0755, true);//0755-> Permisos, true-> permisos recursivos
        };

        if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'],  $directorio . $_FILES['archivo_imagen']['name'] ) ) {
          $imagen_url = $_FILES['archivo_imagen']['name'];
          $imagen_resultado = "Se subió correctamente";

        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        };

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare("INSERT INTO directores_de_juego (nombre_director, apellido_director, descripcion_director, foto_url) VALUES (?, ?, ?, ?)");
                $stmn->bind_param("ssss", $nombre_director, $apellido_director, $descripcion_director, $imagen_url);
                $stmn->execute();
                $id_insertado = $stmn->insert_id;
                if($stmn->affected_rows) {
                        $respuesta = array(
                          'respuesta' => 'exito',
                          'id_insertado' => $id_insertado,
                          'resultado_imagen' => $imagen_resultado
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

//Comportamiento a la hora de EDITAR un DIRECTOR DE JUEGO
if($_POST['registro'] == 'actualizar'){

        $nombre_director = $_POST['nombre-director'];
        $apellido_director = $_POST['apellido-director'];
        $descripcion_director = $_POST['descripcion-director'];

        $id_registro = $_POST['id_registro'];

        $directorio = "../img/directores/";

        if(!is_dir($directorio)){
          mkdir($directorio,0755, true);//0755-> Permisos, true-> permisos recursivos
        };

      if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'],  $directorio . $_FILES['archivo_imagen']['name'] ) ) {
          $imagen_url = $_FILES['archivo_imagen']['name'];
          $imagen_resultado = "Se subió correctamente";

      } else {
          $respuesta = array(
              'respuesta' => 'error'
          );
      };

      try {
        include_once './funciones/funciones.php';
        if($_FILES['archivo_imagen']['size'] > 0){
            // con imagen
            $stmn = $db->prepare("UPDATE directores_de_juego SET nombre_director = ?, apellido_director = ?, descripcion_director = ?, foto_url = ?, editado = NOW() WHERE id_director = ? ");
            $stmn->bind_param("ssssi", $nombre_director, $apellido_director, $descripcion_director, $imagen_url, $id_registro);
        } else {
            // sin imagen
            $stmn = $db->prepare("UPDATE directores_de_juego SET nombre_director = ?, apellido_director = ?, descripcion_director = ?, editado = NOW() WHERE id_director = ? ");
            $stmn->bind_param("sssi", $nombre_director, $apellido_director, $descripcion_director, $id_registro);
        };


        $stmn->execute();
        $rows = $stmn->affected_rows;

        $respuesta = array(
            'rows' => $rows
        );

        // $stmt->error
        if($rows > 0) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );

        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmn->close();
        $db->close();

      } catch(Exception $e) {
        $respuesta = array(
            'respuesta' =>  $e->getMessage()
        );
      };
      die(json_encode($respuesta));
};

//Comportamiento a la hora de ELIMINAR un DIRECTOR DE JUEGO
if($_POST['registro'] == 'eliminar'){

        $id_borrar = $_POST['id'];

        try {
                include_once './funciones/funciones.php';
                $stmn = $db->prepare('DELETE FROM directores_de_juego WHERE id_director = ?');
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
