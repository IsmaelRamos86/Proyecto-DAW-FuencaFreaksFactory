<!-- Incluimos nuestro Header  -->
<?php include_once './includes/templates/header.php';?>

    <section class="seccion contenedor">
        <h2>Registro de Usuarios</h2>
        <form id='registro' class='registro' action="pagar.php" method="POST">
            <div id='datos_usuario' class='registro caja clearfix'>

                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="tu Nombre">
                </div>
                <div class="campo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" placeholder="tu Apellido">
                </div>
                <div class="campo">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="tu Email">
                </div>
                <div id='error'></div>

            </div>
            <div id="paquetes" class='paquetes'>
                <h3>Elige una opción</h3>
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
                            <div class="orden">

                               <input class="checkbox-budget" type="radio" name="budget" id="budget-1"  value="15">
                                <label class="for-checkbox-budget" for="budget-1">
                                    <span data-hover="3 Partidas">3 Partidas</span>
                                </label>

                             </div>
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
                            <div class="orden">

                                <input class="checkbox-budget" type="radio" name="budget" value="5" id="budget-2">
                                <label class="for-checkbox-budget" for="budget-2">							
                                    <span data-hover="1 Partida">1 Partida</span>
                                </label>

                            </div>
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
                            <div class="orden">

                                <input class="checkbox-budget" type="radio" name="budget" value="20" id="budget-3">
                                <label class="for-checkbox-budget" for="budget-3">							
                                    <span data-hover="5 Partidas">5 Partidas</span>
                                </label>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- .paquetes-->

            <div id="eventos" class="eventos clearfix">
                <h3>Elige tus partidas</h3>
                <div class="caja" id="caja_check">
                    <?php

                    try {
                      require_once('./includes/funciones/bd_conexion.php');
                      $sql = "SELECT eventos.*, categoria_evento.cat_evento, directores_de_juego.nombre_director, directores_de_juego.apellido_director ";
                      $sql .= "FROM eventos ";
                      $sql .= "JOIN categoria_evento ";
                      $sql .= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                      $sql .= "JOIN directores_de_juego ";
                      $sql .= "ON eventos.id_direct = directores_de_juego.id_director ";
                      $sql .= "ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento";
                      $resultado = $db->query($sql);
                    } catch (Exception $e) {
                      echo $e->getMessage();
                    }

                    //formateamos en Windows
                    setlocale(LC_TIME, 'spanish.UTF-8');
                    //También en sistemas UNIX
                    setlocale(LC_TIME, 'es_ES.UTF-8');
                    $eventos_dias = array();
                    while($eventos = $resultado->fetch_assoc()){
                      $fecha = $eventos['fecha_evento'];

                      //setlocale(LC_ALL, "es_ES");
                      $dia_semana = strtolower(strftime("%A", strtotime($fecha)));

                      $categoria = $eventos['cat_evento'];
                      $dia = array(
                        'nombre_evento' => $eventos['nombre_evento'],
                        'hora' => $eventos['hora_evento'],
                        'id' => $eventos['id_evento'],
                        'nombre_director'  => $eventos['nombre_director'],
                        'apellido_director'  => $eventos['apellido_director']
                      );
                      $eventos_dias[$dia_semana]['eventos'][$categoria][] = $dia;

                    }
                
                    ?>

                    <?php foreach($eventos_dias as $dia => $eventos) {?>
                    <div id=<?= $dia?> class="contenido-dia clearfix">
                        <h4><?=$dia?></h4>
                        <?php
                            foreach($eventos['eventos'] as $tipo => $eventos_dia){
                        ?>
                        <div>
                            <h4 style="border: none"><?=str_replace('_',' ', $tipo);?></h4>
                              <?php
                                  foreach($eventos_dia as $evento ){
                              ?>
                              <label>
                              <input type="checkbox" name="registro_evento[]" id="<?=$evento['id']?>" value="<?=$evento['id']?>">
                              <time> <?= strftime("%H:%M", strtotime($evento['hora']));?></time> <?=$evento['nombre_evento']."<br>"?>
                              <span class="director_partida"><small><?=$evento['nombre_director']?> <?=$evento['apellido_director']?></small></span>
                              </label>
                              <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <!--#viernes-->
                    <?php }; ?>

                </div>
                <!--.caja-->
            </div>
            <!--#eventos-->


            <div class="resumen" id="resumen">
                <h3>Pago y Extras</h3>
                <div class="caja clearfix">
                    <div class="extras">
                        <div class="orden">
                            <label for="camisas_club">Camisa del evento 10€ <small>(promoción 7% dto.)</small></label>
                            <input type="number" id="camisas_club" name="opcion[camisas][cantidad]" min="0" size="3" placeholder="0">
                            <input type="hidden" value="10" name="opcion[camisas][precio]">
                        </div>
                        <!-- .orden -->
                        <div class="orden">
                            <label for="pegatinas">Paquete de 10 pegatinas 2€ <small>(juego1, juego2, juego3)</small></label>
                            <input type="number" id="pegatinas" name="opcion[pegatinas][cantidad]" min="0" size="3" placeholder="0">
                            <input type="hidden" value="2" name="opcion[pegatinas][precio]">
                        </div>
                        <!-- .orden -->
                        <div class="orden">
                            <label for="regalo">Seleccione un regalo</label>
                            <select id="regalo" name="regalo">
                                <option disabled selected>-------- Regalos --------</option>
                                <option value="1">Pegatinas</option>
                                <option value="2">Pulsera</option>
                                <option value="3">Bolígrafo</option>
                            </select>
                        </div>
                        <!-- .orden -->
                        <input type="button" id="calcular" class="button" value="Calcular">
                    </div>
                    <!-- .extras -->
                    <?php
                             if(isset($_GET['error'])){?>
                                   <span style="color: red;">
                                   * Tiene que seleccionar la misma cantidad de eventos que ha seleccionado en los packs de partidas  
                                   </span> 
                                
                            
                            <?php
                             }
                            ?>
                    <div class="total">
                        <p>Resumen:</p>
                        <div id="lista-productos"></div>
                

                        <p>Total:</p>
                        <div id="suma-total"></div>
                        <input type="hidden" name="total_pedido" id="total_pedido">
                        <input type="submit" name="submit" id="btnRegistro" class="button" value="Pagar">
                    </div>
                    <!-- .total -->
                </div>
            </div>
            <!-- .resumen -->

        </form>
    </section>
<!-- Incluimos nuestro Footer  -->
<?php include_once './includes/templates/footer.php';?>
