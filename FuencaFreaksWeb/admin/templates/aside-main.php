
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="info">
                        <p><?=$_SESSION['nombre']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                              <!-- sidebar menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menú de Administración</li>
                    <!-- Estadisticas  -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span> Estadisticas / Control</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="dashboard.php"><i class="fa fa-circle-o"></i> Estadisticas / Control</a></li>
                        </ul>
                    </li>
                    <!-- Eventos  -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Eventos</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./listar-evento.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                            <li><a href="./crear-evento.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <!-- Categorias -->
                    <!-- Solo mostramos el campo Categorias a los SuperUsuarios -->
                    <?php if($_SESSION['superuser'] == 1){ ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i>
                            <span>Categoría Eventos</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="listar-categoria.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                            <li><a href="crear-categoria.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <?php }; ?>
                    <!-- Directores -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle"></i>
                            <span>Directores de Juego</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="listar-director.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                            <li><a href="crear-director.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <!-- Participantes  -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-address-book"></i>
                            <span>Participantes</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="listar-participante.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                            <li><a href="crear-participante.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <!-- Administradores -->
                    <!-- Solo mostramos el campo Administradores a los SuperUsuarios -->
                    <?php if($_SESSION['superuser'] == 1){ ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Administradores</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./listar-admin.php"><i class="fa fa-list-ul"></i> Ver Todos</a></li>
                            <li><a href="./crear-admin.php"><i class="fa fa-plus-circle"></i> Agregar</a></li>
                        </ul>
                    </li>
                    <?php }; ?>

              </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
