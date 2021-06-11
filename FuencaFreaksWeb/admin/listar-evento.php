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
                    Lista de Eventos
                    <small>Desde aqui puedes Ver, Editar, o Eliminar eventos</small>
                </h1>
            </section>
    <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">


                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Gestiona los Eventos de nuestra Web</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="resgistros" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Título</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Categoria</th>
                          <th>Director</th>
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                  $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, nombre_director, apellido_director ";
                                  $sql.= "FROM eventos ";
                                  $sql.= "INNER JOIN categoria_evento ";
                                  $sql.= "ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                                  $sql.= "INNER JOIN directores_de_juego ";
                                  $sql.= "ON eventos.id_direct = directores_de_juego.id_director ";
                                  $sql.= "ORDER BY id_evento";
                                  $resultado = $db->query($sql);

                                } catch (Exception $e) {
                                  $error = $e->getMessage();
                                  echo $error;
                                }
                                while($evento = $resultado->fetch_assoc()) { ?>
                                <tr>
                                  <td><?=$evento['nombre_evento']?></td>
                                  <td><?=$evento['fecha_evento']?></td>
                                  <td><?=$evento['hora_evento']?></td>
                                  <td><?=$evento['cat_evento']?></td>
                                  <td><?=$evento['nombre_director']?> <?=$evento['apellido_director']?></td>
                                  <td>
                                      <a href="editar-evento.php?id=<?=$evento['id_evento']; ?>" class='btn bg-orange btn-flat margin'>
                                        <i class='fa fa-pencil'></i>
                                      </a>
                                      <a href="#" data-id="<?php echo $evento['id_evento']; ?>" data-tipo="evento" class='btn bg-maroon btn-flat margin borrar-registro'>
                                      <i class='fa fa-trash'></i>
                                    </a>
                                  </td>
                                </tr>
                            <?php }?>

                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Título</th>
                          <th>Fecha</th>
                          <th>Hora</th>
                          <th>Categoria</th>
                          <th>Director</th>
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

