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
                    Lista de Directores de Juego
                    <small></small>
                </h1>
            </section>
    <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-12">


                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Gestiona los Directores de Juego de nuestro Evento/h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="resgistros" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Imagen</th>
                          <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                try {
                                  $sql = "SELECT * FROM directores_de_juego";
                                  $resultado = $db->query($sql);

                                } catch (Exception $e) {
                                  $error = $e->getMessage();
                                  echo $error;
                                }
                                while($director = $resultado->fetch_assoc()) { ?>
                                <tr>
                                  <td><?=$director['nombre_director']." ".$director['apellido_director']?></td>
                                  <td><?=$director['descripcion_director']?></td>
                                  <td><img src="../img/directores/<?=$director['foto_url']?>" alt="foto director" width=100></td>
                                  <td>
                                      <a href="editar-director.php?id=<?=$director['id_director']; ?>" class='btn bg-orange btn-flat margin'>
                                        <i class='fa fa-pencil'></i>
                                      </a>
                                      <a href="#" data-id="<?php echo $director['id_director']; ?>" data-tipo="director" class='btn bg-maroon btn-flat margin borrar-registro'>
                                      <i class='fa fa-trash'></i>
                                    </a>
                                  </td>
                                </tr>
                            <?php }?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
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

