<?php
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './funciones/funciones.php';

    $sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM participantes GROUP BY DATE(fecha_registro) ORDER BY fecha_registro";
    $resultado = $db->query($sql);

    $array_registros = array();

    while($registro_dia = $resultado->fetch_assoc()){
      $fecha = $registro_dia['fecha_registro'];
      $registro['fecha'] = date('d-m-Y', strtotime($fecha));
      $registro['inscritos'] = $registro_dia['resultado'];

      $array_registros[] = $registro ;


    }


    echo (json_encode($array_registros));






?>
