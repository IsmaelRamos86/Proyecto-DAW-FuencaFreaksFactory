<?php
    include_once './funciones/sesiones.php'; //Nos impide ver si no estamos logados
    include_once './funciones/funciones.php';
    include_once './templates/header.php';
    include_once './templates/barra.php';
    include_once './templates/aside-main.php';
?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Registrar Director de Juego
                    <small>Completa el formulario para registrar un nuevo Director</small>
                </h1>
            </section>

            <div class="row">
              <div class="col-md-8">
              <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registar Director</h3>
                    </div>
                    <div class="box-body">

                    <!-- FORMULARIO -->
                      <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="./modelo-director.php" enctype="multipart/form-data">
                        <div class="box-body">
                          <div class="form-group">
                              <label for="nombre-director">Nombre:</label>
                              <input type="text" class="form-control" id="nombre-director" name="nombre-director" placeholder="Nombre del Director">
                          </div>
                          <div class="form-group">
                              <label for="apellido-director">Apellidos:</label>
                              <input type="text" class="form-control" id="apellido-director" name="apellido-director" placeholder="Apellidos del Director">
                          </div>
                          <div class="form-group">
                              <label for="descripcion-director">Descripción:</label>
                              <textarea class="form-control" name="descripcion-director" id="descripcion-director" rows="10" placeholder="Cuentanos algo sobre tí"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen-director">Imagen</label>
                            <input class="form-control" type="file" id="imagen-director" name="archivo_imagen">

                            <p class="help-block">Añade una Foto o Avatar del Director</p>
                        </div>


                        <div class="box-footer">
                          <input type="hidden" name="registro" value="nuevo">
                          <button type="submit" class="btn btn-primary" id="crear-registro" >Registrar</button>
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

