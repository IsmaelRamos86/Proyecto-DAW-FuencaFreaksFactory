<?php
        try{
            require_once('includes/funciones/bd_conexion.php');
            $sql = "SELECT * FROM `directores_de_juego`";

            $resultado = $db->query($sql);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    ?>

    <section class="directores-juego contenedor seccion">
        <h2>Nuestros Directores de Juego</h2>
        <ul class="lista-directores clearfix">
            <?php
            while($directores = $resultado->fetch_assoc()){ ?>
                <li>
                    <div class="director">
                        <a class="director-info" href="#director<?=$directores['id_director']?>">
                        <img src="img/directores/<?= $directores['foto_url']?>" alt="imagen director partida">
                        <p><?= $directores['nombre_director'] . ' ' . $directores['apellido_director']?></p>
                        </a>
                    </div>
                </li>
                <div style="display:none;">
                    <div class="director-info" id="director<?=$directores['id_director']?>">
                            <h2><?=$directores['nombre_director'] . ' '. $directores['apellido_director'];?></h2>
                            <img src="img/directores/<?= $directores['foto_url']?>" alt="imagen director partida">
                            <p><?=$directores['descripcion_director']?></p>
                    </div>

                </div>

            <?php } ?>

    </section><!-- .directores-juego-->

        <?php  $db->close();?>


