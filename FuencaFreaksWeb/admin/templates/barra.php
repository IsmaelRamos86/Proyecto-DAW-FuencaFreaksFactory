<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="../index.php" class="logo">
                <!-- mini logo menu cerrado -->
                <span class="logo-mini"><b>FF</b>f</span>
                <!-- logo menu abierto -->
                <span class="logo-lg"><b>FuencaFreaks </b>fct</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Menú Cuenta de Usuario -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Bienvenido: <b><?=$_SESSION['usuario']; ?></b></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="./editar-admin.php?id=<?php echo $_SESSION['id_admin']?>" class="btn btn-danger btn-flat">Ajustes</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="./login.php?cerrar_sesion=true" class="btn btn-danger btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                      </ul>
                </div>
            </nav>
        </header>
