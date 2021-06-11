<?php
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
      die('Error');
    };
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './templates/header.php';
    include_once './funciones/funciones.php';
    include_once './templates/barra.php';
    include_once './templates/aside-main.php';
?>

<div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Editar un Evento existente
                    <small>Completa el formulario para editar un Evento</small>
                </h1>
            </section>

            <div class="row">
              <div class="col-md-8">
              <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Evento</h3>
                    </div>
                    <div class="box-body">
                    <?php
                        $sql =  "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                        $resultado = $db->query($sql);
                        $categoria = $resultado->fetch_assoc();
                    ?>
                    <!-- FORMULARIO -->
                    <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="./modelo-categoria.php">
                        <div class="box-body">
                          <div class="form-group">
                              <label for="nombre-categoria">Nombre:</label>
                              <input type="text" class="form-control" id="nombre-categoria" name="nombre-categoria" placeholder="Nombre concreto de la Categoría" value="<?=$categoria['cat_evento']?>">
                          </div>
                          <div class="form-group">
                            <label for="icono-categoria">Icono:</label>
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fas fa-chess-pawn"></i>
                              </div>
                              <input type="text" name="icono" id="icono" class="form-control pull-right" placeholder="fa-icon" value="<?=$categoria['icono']?>">
                            </div>
                          </div>
                        </div>

                        <div class="box-footer">
                          <input type="hidden" name="registro" value="actualizar">
                          <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                          <button type="submit" class="btn btn-primary" id="crear-registro" >Guardar</button>
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

