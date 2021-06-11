<?php

    require "paypal/autoload.php";
                     /* URL normal */
   define('URL_SITIO','http://localhost/ProyectoDAW/FuencaFreaksWeb/'); // esta URL cambia segun donde se despliegue en local
    
                /* URL portátil Jesús */
  //  define('URL_SITIO','http://localhost/programacion_PHP/ProyectoDAW/FuencaFreaksWeb/');

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
           'ASHcBnY8geMDZt6LknM62FRf8dz5Qjdik2s3LcAFGx_gVnBP7GNsXvONbYZ3r0lVYIIjcy-kg0j2yrHL', //ClienteID
           'EH9aSdUxp7ahm_pcGzixnz_2G8lZz-l7YpOVwxFVLg4NUp_RorPN2l-Q-1loWtvRFDhoak0zhsLpDejy' //Secret
        )
    )
?>
