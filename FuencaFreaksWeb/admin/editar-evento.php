<?php
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './templates/header.php';
    include_once './funciones/funciones.php';
    include_once './templates/barra.php';
    include_once './templates/aside-main.php';
    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
      die('Error');
    };
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
                        $sql =  "SELECT * FROM eventos WHERE id_evento = $id ";
                        $resultado = $db->query($sql);
                        $evento = $resultado->fetch_assoc();
                    ?>
                    <!-- FORMULARIO -->
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="./modelo-evento.php">
                        <div class="box-body">
                          <!-- Titulo -->
                          <div class="form-group">
                              <label for="nombre">Titulo:</label>
                              <input type="text" class="form-control" id="titulo-evento" name="titulo-evento" placeholder="Título de tu evento" value="<?=$evento['nombre_evento'];?>">
                          </div>
                          <!-- Categoria -->
                          <div class="form-group">
                            <label for="usuario">Categoría:</label>
                            <select name="categoria-evento" class="form-control">
                              <option value="0">---Seleccione Categoria---</option>
                                  <?php
                                    try {
                                      $categoria_actual = $evento['id_cat_evento'];
                                      $sql = "SELECT * FROM categoria_evento";
                                      $resultado = $db->query($sql);
                                      while($cat_evento = $resultado->fetch_assoc()){

                                        if($cat_evento['id_categoria'] == $categoria_actual){ ?>
                                            <option value="<?=$categoria_actual;?>" selected><?=$cat_evento['cat_evento'];?></option>
                                      <?php } else { ?>
                                        <option value="<?=$cat_evento['id_categoria'];?>"><?=$cat_evento['cat_evento'];?></option>
                                    <?php }}} catch (Exception $e) {
                                      echo "Error: " . $e->getMessage();
                                    };
                                  ?>
                            </select>
                          </div>
                          <!-- Fecha -->
                          <div class="form-group">
                            <label>Fecha:</label>
                            <div class="input-group date">
                              <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                              </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="fecha-evento" data-date-format="yyyy-mm-dd" value="<?=$evento['fecha_evento'];?>">
                            </div>
                          </div>
                          <!-- Hora -->
                          <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Hora:</label>
                              <div class="input-group">
                                <input type="text" class="form-control timepicker" name="hora-evento"  value="<?=$evento['hora_evento'];?>">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>
                          <!-- Director -->
                          <div class="form-group">
                            <label for="usuario">Director:</label>
                            <select name="director-evento" class="form-control">
                              <option value="0">---Seleccione Director---</option>
                                  <?php
                                    try {
                                      $director_actual = $evento['id_direct'];
                                      $sql = "SELECT id_director, nombre_director, apellido_director FROM directores_de_juego ORDER BY nombre_director";
                                      $resultado = $db->query($sql);
                                      while($director = $resultado->fetch_assoc()){
                                        if($director['id_director'] == $director_actual){ ?>
                                          <option value="<?=$director_actual;?>" selected><?=$director['nombre_director'];?> <?=$director['apellido_director'];?></option>
                                      <?php } else { ?>
                                        <option value="<?=$director['id_director'];?>"><?=$director['nombre_director'];?> <?=$director['apellido_director'];?></option>
                                    <?php }}} catch (Exception $e) {
                                      echo "Error: " . $e->getMessage();
                                    };
                                  ?>
                            </select>
                          </div>

                          <div class="box-footer">
                            <input type="hidden" name="registro" value="actualizar">
                            <input type="hidden" name="id_registro" value="<?php echo $id; ?>">

                            <button type="submit" class="btn btn-primary" >Guardar</button>
                        </div>                      </form>
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

