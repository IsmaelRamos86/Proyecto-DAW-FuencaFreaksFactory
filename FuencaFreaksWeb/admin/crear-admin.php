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
                    Crear Administrador
                    <small>Completa el formulario para registrar un nuevo Administrador</small>
                </h1>
            </section>

            <div class="row">
              <div class="col-md-8">
              <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Crear Administrador</h3>
                    </div>
                    <div class="box-body">

                    <!-- FORMULARIO -->
                      <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="./modelo-admin.php">
                        <div class="box-body">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo">
                          </div>
                          <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario para Iniciar Sesión">
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Sesión">
                          </div>
                          <div class="form-group">
                            <label for="password">Repetir Password</label>
                            <input type="password" class="form-control" id="repetir-password" name="repetir-password" placeholder="Repite la Password">
                            <span id="resultado-password" class="help-block"></span>
                          </div>
                        </div>

                        <div class="box-footer">
                          <input type="hidden" name="registro" value="nuevo">
                          <button type="submit" class="btn btn-primary" id="crear-registro-admin" >Registrar</button>
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

