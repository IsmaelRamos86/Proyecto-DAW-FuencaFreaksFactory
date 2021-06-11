
        <?php
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './funciones/funciones.php';
    include_once './templates/header.php';
    include_once './templates/barra.php';
    include_once './templates/aside-main.php';

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
                    DASHBOARD
                    <small>Menu de Estadísticas e Información sobre el evento</small>
                </h1>
		</section>
		<!-- Main content -->
		<section class="content">
    <h2>Tabla de Registros</h2>
        <div class="box-body chart-responsive">
              <div class="chart" id="grafica-registros" style="height: 300px;"></div>
        </div>


      <h2 class="page-header">Control de Asistencia</h2>
      <div class="row">
      <div class="col-lg-3 col-xs-6">
                    <?php
                        $sql = "SELECT COUNT(id_participante) AS participante FROM participantes ";
                        $resultado = $db->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $registrados['participante']; ?></h3>
                            <p>Jugadores REGISTRADOS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="listar-participante.php" class="small-box-footer">
                            Más Información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div> <!--.col-xs-6-->
      <div class="col-lg-3 col-xs-6">
                    <?php
                        $sql = "SELECT COUNT(id_participante) AS participante FROM participantes where pagado = 1  ";
                        $resultado = $db->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $registrados['participante']; ?></h3>
                            <p>Jugadores PAGADOS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <a href="listar-partcipante.php" class="small-box-footer">
                            Más Información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div> <!--.col-xs-6-->

            <div class="col-lg-3 col-xs-6">
                    <?php
                        $sql = "SELECT COUNT(id_participante) AS participante FROM participantes where pagado = 0 ";
                        $resultado = $db->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $registrados['participante']; ?></h3>
                            <p>Jugadores SIN PAGAR</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-times"></i>
                        </div>
                        <a href="listar-participante.php" class="small-box-footer">
                            Más Información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div> <!--.col-xs-6-->
            <div class="col-lg-3 col-xs-6">
                    <?php
                        $sql = "SELECT SUM(total_pago) AS ingresos FROM participantes where pagado = 1 ";
                        $resultado = $db->query($sql);
                        $registrados = $resultado->fetch_assoc();
                    ?>
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo (float) $registrados['ingresos']; ?> €</h3>
                            <p>INGRESOS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                        <a href="listar-participante.php" class="small-box-footer">
                            Más Información <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
            </div> <!--.col-xs-6-->


          </div>
          <h2 class="page-header">Sondeo de regalos</h2>
          <div class="row">
          <div class="col-lg-4 col-xs-6">
                                <?php
                                    $sql = "SELECT COUNT(regalo) AS pegatinas FROM participantes JOIN regalos ON participantes.regalo = regalos.ID_regalo WHERE regalo = 1 AND pagado = 1 ";
                                    $resultado = $db->query($sql);
                                    $regalo = $resultado->fetch_assoc();
                                ?>
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3><?php echo $regalo['pegatinas']; ?></h3>
                                        <p>Pegatinas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-sticky-note"></i>
                                    </div>
                                    <a href="lista-registrados.php" class="small-box-footer">
                                        Más Información <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                        </div> <!--.col-xs-6-->
                        <div class="col-lg-4 col-xs-6">
                                <?php
                                    $sql = "SELECT COUNT(regalo) AS pulsera FROM participantes JOIN regalos ON participantes.regalo = regalos.ID_regalo WHERE regalo = 2 AND pagado = 1 ";
                                    $resultado = $db->query($sql);
                                    $regalo = $resultado->fetch_assoc();
                                ?>
                                <!-- small box -->
                                <div class="small-box bg-fuchsia">
                                    <div class="inner">
                                        <h3><?php echo $regalo['pulsera']; ?></h3>
                                        <p>Pulsera</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hand-spock"></i>
                                    </div>
                                    <a href="lista-registrados.php" class="small-box-footer">
                                        Más Información <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                        </div> <!--.col-xs-6-->
                        <div class="col-lg-4 col-xs-6">
                                <?php
                                    $sql = "SELECT COUNT(regalo) AS llaveros FROM participantes JOIN regalos ON participantes.regalo = regalos.ID_regalo WHERE regalo = 3 AND pagado = 1 ";
                                    $resultado = $db->query($sql);
                                    $regalo = $resultado->fetch_assoc();
                                ?>
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                    <div class="inner">
                                        <h3><?php echo $regalo['llaveros']; ?></h3>
                                        <p>Llaveros</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-key"></i>
                                    </div>
                                    <a href="lista-registrados.php" class="small-box-footer">
                                        Más Información <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                        </div> <!--.col-xs-6-->


                      </div>

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->



	<?php
    include_once './templates/footer.php';
    include_once './templates/aside-view.php';
