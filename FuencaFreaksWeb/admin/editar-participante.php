<?php
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
      die('Error');};
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './funciones/funciones.php';
    include_once './templates/header.php';
    include_once './templates/barra.php';
    include_once './templates/aside-main.php';
?>

	<div class="content-wrapper">
		<section class="content-header">
			<h1>
                    Editar un participante Inscrito
                    <small>Completa el formulario para editar</small>
                </h1>
		</section>

		<div class="row">
			<div class="col-md-8">
				<section class="content">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Modificar Participante</h3>
						</div>
						<div class="box-body">
              <?php
                $sql = "SELECT * FROM participantes WHERE id_participante = $id";
                $resultado = $db->query($sql);
                $participante = $resultado->fetch_assoc();
                ?>
							<!-- FORMULARIO -->
							<form class="editar-registrado" role="form" name="guardar-registro" id="guardar-registro" method="post" action="./modelo-participante.php">
								<div class="box-body">
									<!-- nombre -->
									<div class="form-group">
										<label for="nombre-participante">Nombre:</label>
										<input type="text" class="form-control" id="nombre" name="nombre-participante" placeholder="Nombre" value="<?=$participante['nombre_participante']?>">
									</div>
									<!-- apellido -->
									<div class="form-group">
										<label for="apellido-participante">Apellido:</label>
										<input type="text" class="form-control" id="apellido" name="apellido-participante" placeholder="Apellido" value="<?=$participante['apellido_participante']?>">
									</div>
									<!-- email -->
									<div class="form-group">
										<label for="email-participante">Email:</label>
										<input type="email" class="form-control" id="email" name="email-participante" placeholder="Email" value="<?=$participante['email_participante']?>">
									</div>
                  <div class="form-group" id='error'></div>

									<!-- paquetes -->
                  <?php
                    $pedido = $participante['opciones_articulos'];
                    $articulos = json_decode($pedido, true);
                  ?>

									<div class="form-group">
                  <div class="form-group">
                  <div id="paquetes" class='paquetes'>
                <h3>Elige una opción</h3>
                <ul class="lista-precios clearfix">
                    <li li class="col-md-4">
                        <div class="tabla-precio">
                            <h3>3 Partidas</h3>
                            <p class="numero">15€</p>
                            <ul>
                                <li><i class="fas fa-check"></i>Bocadillos</li>
                                <li><i class="fas fa-check"></i>Bebida</li>
                                <li><i class="fas fa-times"></i>Descuento</li>
                            </ul>
                            <div class="orden">

                               <input class="checkbox-budget" type="radio" name="budget" id="budget-1"  value="15" <?php if($articulos['partidas'] == 3){echo "checked";} ?>>
                                <label class="for-checkbox-budget" for="budget-1">
                                    <span data-hover="3 Partidas">3 Partidas</span>
                                </label>

                                <!--<label for="opcion_1">Pack deseado</label>
                                <input type="number" name="opcion[partida][cantidad]" id="opcion_1" min='0' size="3" placeholder="0">
                                <input type="hidden" value="3" name="opcion[partida][precio]">-->
                            </div>
                        </div>
                    </li>

                    <li class="col-md-4">
                        <div class="tabla-precio">
                            <h3>1 Partida</h3>
                            <p class="numero">5€</p>
                            <ul>
                                <li><i class="fas fa-times"></i>Bocadillos</li>
                                <li><i class="fas fa-times"></i>Bebida</li>
                                <li><i class="fas fa-times"></i>Descuento</li>
                            </ul>
                            <div class="orden">

                                <input class="checkbox-budget" type="radio" name="budget" value="5" id="budget-2" <?php if($articulos['partidas'] == 1){echo "checked";} ?>>
                                <label class="for-checkbox-budget" for="budget-2">
                                    <span data-hover="1 Partida">1 Partida</span>
                                </label>

                                <!--<label for="opcion_2">Pack deseado</label>
                                <input type="number" name="opcion[socio][cantidad]" id="opcion_2" min='0' size="3" placeholder="0">
                                <input type="hidden" value="20" name="opcion[socio][precio]">-->
                            </div>
                        </div>
                    </li>

                    <li li class="col-md-4">
                        <div class="tabla-precio">
                        <h3>5 Partidas</h3>
                        <p class="numero">20€</p>
                        <ul>
                            <li><i class="fas fa-check"></i>Bocadillos</li>
                            <li><i class="fas fa-check"></i>Bebida</li>
                            <li><i class="fas fa-check"></i>Descuento</li>
                       </ul>
                            <div class="orden">

                                <input class="checkbox-budget" type="radio" name="budget" value="20" id="budget-3" <?php if($articulos['partidas'] == 5){echo "checked";} ?>>
                                <label class="for-checkbox-budget" for="budget-3">
                                    <span data-hover="5 Partidas">5 Partidas</span>
                                </label>

                               <!-- <label for="opcion_3">Pack deseado</label>
                                <input type="number" name="opcion[jornada][cantidad]" id="opcion_3" min='0' size="3" placeholder="0">
                                <input type="hidden" value="10" name="opcion[jornada][precio]">-->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
									</div>
								</div>
								<div class="form-group">
									<div class="box-header with-border">
										<h3 class="box-title">Elige las partidas</h3>
									</div>
									<div id="eventos" class="eventos clearfix">
										<div class="caja">
											<?php
                              $partidas = $participante['eventos_seleccionados'];
                              $id_partidas_seleccionadas = json_decode($partidas, true);



                                  try {
                                    // require_once('../includes/funciones/bd_conexion.php');
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

                                  $eventos_dias = array();
                                  while($eventos = $resultado->fetch_assoc()){
                                    $fecha = $eventos['fecha_evento'];
                                    setlocale(LC_TIME, 'spanish.UTF-8');
                                    //También en sistemas UNIX
                                    setlocale(LC_TIME, 'es_ES.UTF-8');
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
                                  // echo "<pre>";
                                  // var_dump($eventos_dias);
                                  // echo "<pre>"
                                  ?>

												<?php foreach($eventos_dias as $dia => $eventos) {?>
												<div id=<?=$dia?> class="contenido-dia clearfix row">
													<h4 class="text-center nombre-dia"><?=$dia?></h4>
													<?php
                                          foreach($eventos['eventos'] as $tipo => $eventos_dia){
                                      ?>
														<div class="col-md-6">
															<h4 style="border: none"><?=$tipo?></h4>
															<?php
                                                foreach($eventos_dia as $evento ){
                                            ?>
																<label class="admin-partida">
                                            <input <?php echo(in_array($evento['id'], $id_partidas_seleccionadas['eventos']))? 'checked' : '' ?> type="checkbox" class="minimal-red" name="registro_evento[]" id="<?=$evento['id']?>" value="<?=$evento['id']?>">
                                            <time><?= strftime("%H:%M", strtotime($evento['hora']));?></time> <?=$evento['nombre_evento']."<br>"?>
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
									<div class="resumen" id="resumen">
										<div class="box-header with-border">
											<h3 class="box-title">Pagos y Extras</h3>
										</div>
										<br>
										<div class="caja clearfix row">
											<div class="extras col-md-6">
                        <?php
                        if(!isset ($articulos['camisas'])){
                          $articulos['camisas']=0;
                        };
                        if(!isset ($articulos['pegatinas'])){
                          $articulos['pegatinas']=0;
                        };

                        ?>

												<div class="orden">
													<label for="camisas_club">Camisa del evento 10€ <small>(promoción 7% dto.)</small></label>
													<input value="<?=$articulos['camisas']?>" type="number" class="form-control" id="camisas_club" name="opcion[camisas][cantidad]" min="0" size="3" placeholder="0">
												</div>
												<!-- .orden -->
												<div class="orden">
													<label for="pegatinas">Paquete de 10 pegatinas 2€ <small>(juego1, juego2, juego3)</small></label>
													<input value="<?=$articulos['pegatinas']?>" type="number" class="form-control" id="pegatinas" name="opcion[pegatinas][cantidad]" min="0" size="3" placeholder="0">
												</div>
												<!-- .orden -->
												<div class="orden">
													<label for="regalo">Seleccione un regalo</label>
													<select id="regalo" name="regalo" class="form-control">
                                <option disabled selected>-------- Regalos --------</option>
                                <option value="1" <?php echo ($participante['regalo'] == 1) ? 'selected' : ''?>>Pegatinas</option>
                                <option value="2" <?php echo ($participante['regalo'] == 2) ? 'selected' : ''?>>Pulsera</option>
                                <option value="3" <?php echo ($participante['regalo'] == 3) ? 'selected' : ''?>>Bolígrafo</option>
                            </select>
												</div>
												<br>
												<!-- .orden -->
												<!-- <input type="button" id="calcular" class="button btn btn-primary" value="Calcular"> -->
											</div>
											<!-- .extras -->

											<div class="total col-md-6">
												<p>Resumen:</p>
												<div id="lista-productos"></div>
                        <p>Total Abonado: <?php echo (float) $participante['total_pago']?> €</p>
												<p>Total:</p>
												<div id="suma-total"></div>

											</div>
											<!-- .total -->
										</div>
									</div>
								</div>

								<div class="box-footer">
									<input type="button" id="calcular" class="button btn btn-primary" value="Calcular">
									<input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="total_pedido" id="total_pedido">
                  <input type="hidden" name="id_registro" value="<?=$participante['id_participante']?>">
                  <input type="hidden" name="fecha_registro" value="<?=$participante['fecha_registro']?>">
									<button type="submit" class="btn btn-primary" id="btnRegistro">Guardar</button>
								</div>
							</form>
							<!-- FIN FORMULARIO  -->


						</div>
					</div>
				</section>
			</div>
		</div>

	</div>



	<?php
    include_once './templates/footer.php';
    include_once './templates/aside-view.php';

?>
