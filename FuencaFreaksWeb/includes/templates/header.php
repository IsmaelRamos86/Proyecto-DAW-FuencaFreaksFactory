<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>FuencaFreaksFactory</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Importamos nuestras fuentes desde GoogleFonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=PT+Sans&display=swap" rel="stylesheet">
    <?php
        $archivo = basename($_SERVER['PHP_SELF']); /* Esta linea retorna a la variable el nombre del archivo cargado */
        $pagina = str_replace('.php','',$archivo); /* Esta linea reemplaza el primer parametro por el segundo de lo encontrado en el tercer parametro */
        if($pagina == 'amigos' || $pagina == 'index'){
            /* Importamos los CSS de colorbox para la galeria amigos */
            echo '<link rel="stylesheet" href="css/colorbox.css">';
        }
        elseif($pagina == 'nosotros'){
                                /* Importamos los CSS de lightbox para la galeria nosotros */
            echo '<link rel="stylesheet" href="css/lightbox.css">';
        }
    ?>

    
    <!-- Importamos los datos hospedados de Leaflet para el mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <link rel="stylesheet" href="css/main.css">
    <meta name="theme-color" content="#fafafa">


    <!--Forma de agregar libreria FONT-AWESOME-->
    <script src="https://kit.fontawesome.com/b3dade77f1.js" crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    </head>

<body class="<?= $pagina;?>">
    <header class="site-header">
        <div class="hero">
            <div class="contenido-header">
              <div>
                <nav class="redes-sociales">

                    <a href="https://www.meetup.com/es-ES/FUENCAFREAKSFACTORY" target="_blank"><i class="fab fa-meetup"></i></a>
                    <a href="https://twitter.com/FuencaFreaks" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/fuencafreaksfactory/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="admin/dashboard.php"><i class="fas fa-users-cog"></i></i></a>
                </nav>
              </div>

                  <div class="informacion-evento">
                    <div class="clearfix">
                    <p><i class="fas fa-calendar-alt" aria-hidden="true"></i> 09, 10 y 11 de Julio de 2021</p>


                    </div>
                  </div>
                    <!-- El siguiente h1 habrá que sutituirlo por el logo
                    <h1 class="nombre-sitio">FuencaFreaksFactory</h1> -->
                    <div class="intro-text clearfix" id="intro-text">
                        <h1>Bienvenidos</h1>
                        <h1>a las Jornadas de</h1>
                        <h1>FUENCAFREAKSFACTORY</h1>
                    </div>



                    <!-- Prueba ScrollDown  -->
                    <svg class="arrows">
                    							<path class="a1" d="M0 0 L30 32 L60 0"></path>
							<path class="a2" d="M0 20 L30 52 L60 20"></path>
							<path class="a3" d="M0 40 L30 72 L60 40"></path>
						</svg>
<!-- Fin Prueba ScrollDown -->
                </div>
            </div>
                            </div>
    </header>

    <div class="barra">
        <div class="contenedor clearfix">
            <div class="logo">
                <!-- Modificar Logo -->
                <a href="./index.php">
                <img src="./img/logo2.png" alt="logo">
                </a>
                                </div>

            <div class="menu-movil">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <nav class="navegacion-principal clearfix">
                <a href="nosotros.php">Nosotros</a>
                <a href="eventos.php">Partidas</a>
                <a href="amigos.php">Directores</a>
                <a href="registro.php">Inscripciones</a>
            </nav>
        </div>
    </div>
