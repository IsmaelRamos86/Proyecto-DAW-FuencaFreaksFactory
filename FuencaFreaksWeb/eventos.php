<?php include_once './includes/templates/header.php';?>

<section class="seccion contenedor">
    <h2>Calendario de Eventos</h2>

    <?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = 'SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_director, apellido_director ';
            $sql .= 'FROM eventos ';
            $sql .= 'INNER JOIN categoria_evento ';
            $sql .= 'ON eventos.id_cat_evento = categoria_evento.id_categoria ';
            $sql .= 'INNER JOIN directores_de_juego ';
            $sql .= 'ON eventos.id_direct = directores_de_juego.id_director ';
            $sql .= 'ORDER BY fecha_evento;';
            $resultado = $db->query($sql);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    ?>

    <div class="calendario">
        <?php
            $calendario = array();
            while( $eventos = $resultado->fetch_assoc()){
                // Obtener la fecha del evento
                $fecha = $eventos['fecha_evento'];

                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => $eventos['icono'],
                    'director' => $eventos['nombre_director'] . ' '. $eventos['apellido_director']
                );

                $calendario[$fecha][] = $evento;
            } // while de fetch_assoc()?>

            <?php
            //Imprimimos todas las partidas
            foreach($calendario as $dia => $lista_eventos){ ?>
                <h3>
                    <i class="fa fa-calendar"></i>
                    <?php
                    //formateamos en Windows
                    setlocale(LC_TIME, 'spanish.UTF-8');
                    //También en sistemas UNIX
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    echo strftime("%A, %d de %B del %Y", strtotime($dia)); ?>
                </h3>
                <a href="registro.php">
                <div class="eventos_dia">
                  <?php foreach($lista_eventos as $evento){ ?>
                  <div class="dia">
                    <p class="titulo"><?php echo $evento['titulo']; ?></p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden='true'></i>
                        <?= strftime("%H:%M", strtotime($evento['hora'])); // Formateo de la hora del evento?>
                    </p>
                    <p>
                        <i class="fa <?php echo $evento['icono'];?> " aria-hidden='true'></i>
                        <?=str_replace('_',' ', $evento['categoria']);?>
                    </p>
                    <p>
                        <i class="fa fa-user" aria-hidden='true'></i>
                        <?php echo $evento['director']; ?>
                    </p>

                  </div>
                  <?php } ?>
                </div>
                </a>
            <?php } ?>



        <?php  $db->close();?>
    </div><!-- .calendario -->

</section>

<?php include_once './includes/templates/footer.php';?>
