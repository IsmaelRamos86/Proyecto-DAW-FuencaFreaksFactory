<?php

function lista_productos_json($cantidad, &$camisas = 0,  &$pegatinas = 0){
//  $dias = array(0=>'dia', 1=>'socio', 2=>'jornada',);
//  $total_opciones = array_combine($dias, $opcion);
//  return json_encode($total_opciones);
//  $json = array();

//     foreach($total_opcion as $key => $opcion){
//           if((int) $opcion > 0){
//             $json[$key] = (int) $opcion;
//           }
//         }


//  $cantPartida = (int) $opcion['partida'];
//  if($cantPartida > 0){
//    $total_opciones["partida"] = $cantPartida;
//  }

//  $cantSocio = (int) $opcion['socio'];
//  if($cantSocio > 0){
//    $total_opciones["socio"] = $cantSocio;
//  }

//  $cantJornada = (int) $opcion['jornada'];
//  if($cantJornada > 0){
//    $total_opciones["jornada"] = $cantJornada;
//  }

//     $cantCamisas = (int) $camisas;
//     if($cantCamisas > 0){
//       $total_opciones["camisas"] = $cantCamisas;
//     }

//     $cantPegatinas = (int) $pegatinas;
//     if($cantPegatinas > 0){
//       $total_opciones["pegatinas"] = $cantPegatinas;
//     }

/*
$total_opciones["partida"] = $opcion['partida']['cantidad'];
 $total_opciones["socio"] = $opcion['socio']['cantidad'];
$total_opciones["jornada"] = $opcion['jornada']['cantidad']; 
$total_opciones["camisas"] = $opcion['camisas']['cantidad'];
$total_opciones["pegatinas"] = $opcion['pegatinas']['cantidad'];
*/
$total_opciones["partidas"] = $cantidad;
$total_opciones["camisas"] = $camisas;
$total_opciones["pegatinas"] = $pegatinas;

return json_encode($total_opciones);

}

function eventos_json(&$eventos){
  $eventos_json = array();
      foreach($eventos as $evento){
        $eventos_json ["eventos"][] = $evento;
      }
return json_encode($eventos_json);
}




?>
