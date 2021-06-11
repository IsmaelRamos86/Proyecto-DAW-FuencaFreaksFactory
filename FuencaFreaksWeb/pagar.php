<?php

if(!isset($_POST['submit'])){
    exit('Hubo un error en el envío.');
}

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

require 'includes/config_paypal.php';

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';



if(isset($_POST['submit'])):
    $nombre = $_POST['nombre'];
    $opcion = $_POST['opcion'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');
    //Pedidos
    $costePartidas = $_POST['budget'];
    $cantidadPartidas = 0;
  
    switch ($costePartidas) {
        case '15':
            $cantidadPartidas = 3;
            $opcion['Paquete 3 partidas']['cantidad'] = (String) 1;
            $opcion['Paquete 3 partidas']['precio'] = (String) 15;
            break;
        case '5':
            $cantidadPartidas = 1;
            $opcion['Partida']['cantidad'] = (String) 1;
            $opcion['Partida']['precio'] = (String) 5;
            break;
        case '20':
            $cantidadPartidas = 5;
            $opcion['Paquete 5 partidas']['cantidad'] = (String) 1;
            $opcion['Paquete 5 partidas']['precio'] = (String) 20;
            break;
    }

    //opcion

   /*  echo '<pre>';
    var_dump($opcion);
    echo '</pre>'; */

    $camisas = $_POST['opcion']['camisas']['cantidad'];
    $camisasPrecio = $_POST['opcion']['camisas']['precio'];
    $pegatinas = $_POST['opcion']['pegatinas']['cantidad'];
    $pegatinasPrecio = $_POST['opcion']['pegatinas']['precio'];
    include_once './includes/funciones/funciones.php';
    $pedido = lista_productos_json($cantidadPartidas, $camisas, $pegatinas );
    $eventos = $_POST['registro_evento'];
    $registro = eventos_json($eventos);
    $pagado = 0;



    try{
      require_once('includes/funciones/bd_conexion.php');
      $stmt = $db->prepare("INSERT INTO participantes (nombre_participante, apellido_participante, email_participante, fecha_registro, opciones_articulos, eventos_seleccionados, regalo, total_pago, pagado) VALUES (?, ?, ?, NOW(), ?, ?, ?, ?, 0)");
      $stmt->bind_param("sssssis", $nombre, $apellido, $email, $pedido, $registro, $regalo, $total);
      $stmt->execute();
      $id_registro=$stmt->insert_id;
      $stmt->close();
      $db->close();
    }catch(Exception $e){
      echo $e->getMessage();
    }
endif;


$compra = new Payer();
$compra->setPaymentMethod('paypal');


 $i = 0;

 foreach ($opcion as $key => $value) {
     if((int) $value['cantidad'] >0){
         if($key == 'camisas'){
             $precio = (float) $value['precio']* .93;
         }else{
             $precio = (int)$value['precio'];
         }
         ${"articulo$i"} = new Item();
         $array_pedido[] = ${"articulo$i"};
         ${"articulo$i"}->setName($key) //Nombre del producto
                         ->setCurrency('EUR') // función que indica en que moneda pagar, consultar archivo ITEM
                         ->setQuantity((int)$value['cantidad']) // Cuantos articulos vas a vender
                         ->setPrice($precio); // precio del producto
         $i++;
     }
 }


$listaArticulos = new ItemList(); // lista de articulos a comprar
$listaArticulos->setItems($array_pedido);

    echo '<pre>';
    var_dump($array_pedido);
    echo '</pre>';
 echo 'Total del pedido => '.$total;

$cantidad = new Amount();
$cantidad->setCurrency('EUR')
         ->setTotal($total); // IMPORTANTE total del pedido



 $transaccion = new Transaction();
$transaccion->setAmount($cantidad)
            ->setItemList($listaArticulos)
            ->setDescription('Pago FuencaFreaksFactory ')
            ->setInvoiceNumber($id_registro);


$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO. "pago_finalizado.php?exito=true&id_pago={$id_registro}")
              ->setCancelUrl(URL_SITIO. "pago_finalizado.php?exito=false&id_pago={$id_registro}");


$pago = new Payment();
$pago->setIntent("sale")
    ->setPayer($compra)
    ->setRedirectUrls($redireccionar)
    ->setTransactions(array($transaccion));


try {
  $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
        echo "<pre>";
        print_r(json_decode($pce->getData()));
        exit;
}


$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}"); 
 
?>
