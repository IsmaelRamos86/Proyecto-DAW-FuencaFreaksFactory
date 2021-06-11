<!-- Incluimos nuestro Header  -->
<?php include_once './includes/templates/header.php';?>

    <section class="seccion contenedor">
        <h2>El mejor Club de Juegos del Norte de Madrid</h2>
        <p>FuencaFreaksFactory lleva en activo desde 2017. Desde el distrito madrileño de Fuencarral, nos esforzamos en hacer accesibles los juegos de mesa modernos, así como juegos de rol de diversas temáticas. Nuestras mesas de juego están dirigidas y
            explicadas por los mejores Directores de Juego, no teniendo que preocuparte nada más que de disfrutar.

        </p>
        <p>Y este año como novedad te traemos nuestras primeras jornadas. Donde podrás disfrutar durantes tres días de los mejores juegos, dirigidos por alunos de nuestros mejores gamemasters</p>
    </section>

    <section class="programa">
        <div class="contenedor-video">
            <video autoplay loop muted poster="./img/bg-programa.png"> <!-- poster="bg-programa.png" esta propiedad da error en consola-->
              <source src="./video/video.mp4" type="video/mp4">
              <source src="./video/video.webm" type="video/webm">
              <!-- OGV no lo hemos metido al incrementar mucho el tamaño del proyecto -->
            </video>
        </div>

        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>Próximas Partidas</h2>

                    <?php
                        try{
                            require_once('includes/funciones/bd_conexion.php');
                            $sql = "SELECT * FROM `categoria_evento`";
                            $resultado = $db->query($sql);
                        }catch(Exception $e){
                            echo $e->getMessage();
                        }
                    ?>
                        <nav class="menu-programa">
                            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)){
                                $categoria = $cat['cat_evento'];
                            ?>

                            <a href="#<?= strtolower($categoria); ?>">
                                <i class="fas <?= $cat['icono']; ?>" aria-hidden="true"></i> <?=str_replace('_',' ', $categoria);?></a>
                             <?php }?>

                        </nav>

                        <?php
                            try{
                                require_once('includes/funciones/bd_conexion.php');
                                $sql = 'SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_director, apellido_director ';
                                $sql .= 'FROM eventos ';
                                $sql .= 'INNER JOIN categoria_evento ';
                                $sql .= 'ON eventos.id_cat_evento = categoria_evento.id_categoria ';
                                $sql .= 'INNER JOIN directores_de_juego ';
                                $sql .= 'ON eventos.id_direct = directores_de_juego.id_director ';
                                $sql .= 'AND eventos.id_cat_evento = 1 ';
                                $sql .= 'ORDER BY fecha_evento LIMIT 2;';
                                $sql .= 'SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_director, apellido_director ';
                                $sql .= 'FROM eventos ';
                                $sql .= 'INNER JOIN categoria_evento ';
                                $sql .= 'ON eventos.id_cat_evento = categoria_evento.id_categoria ';
                                $sql .= 'INNER JOIN directores_de_juego ';
                                $sql .= 'ON eventos.id_direct = directores_de_juego.id_director ';
                                $sql .= 'AND eventos.id_cat_evento = 2 ';
                                $sql .= 'ORDER BY fecha_evento LIMIT 2;';

                            }catch(Exception $e){
                                echo $e->getMessage();
                            }

                           $db->multi_query($sql);

                           do {
                               $resultado = $db->store_result();
                               $row = $resultado->fetch_all(MYSQLI_ASSOC);
                               $i = 0;
                               foreach($row as $evento):
                               // var_dump($evento);
                                    if($i % 2 == 0):
                                        $tipocategoria = $evento['cat_evento'];?>
                                      <div id="<?= strtolower($tipocategoria);?>" class="info-mesa ocultar clearfix">
                                    <?php endif;
                                        //formateamos en Windows
                                        setlocale(LC_TIME, 'spanish.UTF-8');
                                        //También en sistemas UNIX
                                        setlocale(LC_TIME, 'es_ES.UTF-8');
                                        // formateo de la fecha del evento
                                        $fechaEv = strftime("%A, %d de %B", strtotime($evento['fecha_evento']));
                                        // formateo de la hora del evento
                                        $horaEv = strftime("%H:%M", strtotime($evento['hora_evento']));

                                    ?>

                                        <div class="detalle-evento">
                                            <h3><?= $evento['nombre_evento'];?></h3>
                                            <p><i class="fas fa-calendar-alt" aria-hidden="true"></i><?= $fechaEv;?></p>
                                            <p> <i class="fas fa-clock" aria-hidden="true"></i> <?= $horaEv;?></p>
                                            <p><i class="fas fa-user" aria-hidden="true"></i> <?= $evento['nombre_director'].' '.$evento['apellido_director'];?></p>
                                         </div>

                                    <?php  if($i % 2 == 1): ?>
                                        <a href="eventos.php" class="button float-right">Ver todas</a>
                                     </div> <!-- .info-mesa -->

                                    <?php endif;
                                      $i++;
                                 endforeach;
                                 $resultado->free();
                            } while ($db->more_results() && $db->next_result());
                        ?>
                </div>
                <!-- .programa-evento-->
            </div>
        </div>
        <!-- .contenido-programa-->
    </section>
    <!-- .programa-->


    <?php include_once './includes/templates/directores.php';?>
    <!-- .directores-juego-->


    <div class="contador parallax">
        <div class="contenedor">
            <ul class="resumen-evento clearfix">
                <li>
                    <p class="numero">0</p> Gamemasters</li>
                <li>
                    <p class="numero">0</p> Partidas</li>
                <li>
                    <p class="numero">0</p> Participantes</li>
            </ul>
        </div>
    </div>
    <!-- .contador-->

    <section class="precios seccion">
        <h2>Precios</h2>
        <div class="contenedor">
        <form action="registro.php" method="POST">
            <ul class="lista-precios clearfix">
                <li>
                    <div class="tabla-precio">
                        <h3>3 Partidas</h3>
                        <p class="numero">15€</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos</li>
                            <li><i class="fas fa-check"></i>Bebida</li>
                            <li><i class="fas fa-times"></i>Descuento</li>
                        </ul>
                        <a href="./registro.php" class="button hollow">Comprar</a>
                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>1 Partida</h3>
                        <p class="numero">5€</p>
                        <ul>
                            <li><i class="fas fa-times"></i>Bocadillos</li>
                            <li><i class="fas fa-times"></i>Bebida</li>
                            <li><i class="fas fa-times"></i>Descuento</li>
                        </ul>
                        <a href="./registro.php" class="button">Comprar</a>

                    </div>
                </li>

                <li>
                    <div class="tabla-precio">
                        <h3>5 Partidas</h3>
                        <p class="numero">20€</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos</li>
                            <li><i class="fas fa-check"></i>Bebida</li>
                            <li><i class="fas fa-check"></i>Descuento</li>
                        </ul>
                        <a href="./registro.php" class="button hollow">Comprar</a>

                    </div>
                </li>
            </ul>
            </form>
            <!-- .lista-precios -->
        </div>
    </section>
    <!-- .precios -->
<section>
  <h2>Donde Estamos</h2>
    <div id="mapa" class="mapa">
    </section>
    </div>
    <!-- .mapa -->



    <div class="newsletter parallax">
        <div class="contenido contenedor">
            <p>Regístrate al Newsletter:</p>
            <h3>FuencaFreaksFactory</h3>
            <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
        </div>
    </div>
    <!-- .newsletter -->

    <section class="seccion">
        <h2>Faltan</h2>
        <div class="cuenta-atras contenedor">
            <ul class="clearfix">
                <li>
                    <p id="dias" class="numero"></p> días</li>
                <li>
                    <p id="horas" class="numero"></p> horas</li>
                <li>
                    <p id="minutos" class="numero"></p> minutos</li>
                <li>
                    <p id="segundos" class="numero"></p> segundos</li>
            </ul>
        </div>
    </section>

<!-- Incluimos nuestro Footer  -->
    <?php include_once './includes/templates/footer.php';?>
    <script>
$(function() {
$('.director-info').colorbox({ inline: true, width: "50%" });
$('.boton_newsletter').colorbox({ inline: true, width: "50%" });




var map = L.map('mapa').setView([40.491193, -3.691428], 16);

map.scrollWheelZoom.disable();



L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([40.491193, -3.691428]).addTo(map)
    // .bindPopup('<b>FuencafreaksFactory</b> y la pizzeria UR.<br> Los mejores juegos y pizzas.')
    // .openPopup()
    .bindTooltip('<b>FuencafreaksFactory</b> y la pizzeria UR.<br> Las mejores pizzas y Juegos de Mesa.<br/><i>Avda. Cardenal Herrera Oria 80</i>')
    .openTooltip();

});


</script>

