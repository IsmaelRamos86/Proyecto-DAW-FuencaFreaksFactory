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
                    Lista de Inscritos a los Eventos
                    <small></small>
                </h1>
            </section>
    <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">


                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Gestiona las Participantes a los Eventos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="resgistros" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Fecha Registro</th>
                          <th>Artículos</th>
                          <th>Partidas</th>
                          <th>Regalo</th>
                          <th>Pago</th>
                          <th>Acciones</th>

                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                  $sql = "SELECT participantes.*, regalos.nombre_regalo FROM participantes ";
                                  $sql .= "JOIN regalos ";
                                  $sql .= "ON participantes.regalo = regalos.id_regalo";
                                  $resultado = $db->query($sql);
                                  // die(json_encode($resultado));

                                } catch (Exception $e) {
                                  $error = $e->getMessage();
                                  echo $error;
                                }
                                while($participante = $resultado->fetch_assoc()) { ?>
                                <tr>
                                  <td><?php echo $participante['nombre_participante']." ".$participante['apellido_participante']." ";
                                  $pagado = $participante['pagado'];
                                  if($pagado){
                                          echo '<span class="badge bg-green">Pagado</span>';
                                  }else{
                                          echo '<span class="badge bg-red">No Pagado</span>';
                                  };?>
                                  </td>
                                  <td><?= $participante['email_participante']?></td>
                                  <td><?= $participante['fecha_registro']?></td>
                                  <td><?php
                                  // echo "<pre>";
                                  // var_dump($participante['opciones_articulos']);
                                  // echo "</pre>";

                                  $articulos = json_decode($participante['opciones_articulos'], true);
                                      foreach($articulos as $clave => $articulo){
                                        echo $clave.": ".$articulo . "<br>";
                                      };
                                      ?></td>
                                  <td><?php $eventos = $participante['eventos_seleccionados'];
                                            $eventos = json_decode($eventos, true);
                                            $eventos = implode("', '", $eventos['eventos']);
                                            $sql_evento = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE id_evento IN ('$eventos')";
                                            $eventos_consulta = $db->query($sql_evento);
                                            while($eventos_registro = $eventos_consulta->fetch_assoc()){
                                              echo $eventos_registro['nombre_evento']." ".$eventos_registro['fecha_evento']." ".$eventos_registro['hora_evento']."<br>";
                                            }
                                      ?></td>
                                  <td><?= $participante['nombre_regalo']?></td>
                                  <td><?php echo (float) $participante['total_pago']?>€</td>
                                  <td>
                                      <a href="editar-participante.php?id=<?=$participante['id_participante']; ?>" class='btn bg-orange btn-flat margin'>
                                        <i class='fa fa-pencil'></i>
                                      </a>
                                      <a href="#" data-id="<?php echo $participante['id_participante']; ?>" data-tipo="participante" class='btn bg-maroon btn-flat margin borrar-registro'>
                                      <i class='fa fa-trash'></i>
                                    </a>
                                  </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Nombre</th>
                          <th>Email</th>
                          <th>Fecha Registro</th>
                          <th>Artículos</th>
                          <th>Partidas</th>
                          <th>Regalo</th>
                          <th>Pago</th>
                          <th>Acciones</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </section>
    <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <?php
    include_once './templates/footer.php';
    include_once './templates/aside-view.php';

?>

