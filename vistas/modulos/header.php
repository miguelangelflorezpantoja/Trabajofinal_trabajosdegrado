<!-- ------Main header -->
<header class="main-header">
    <!-- Logo -->
    <a class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><img src="vistas/img/plantilla/icono.png" class="img-responsive" style="padding:10px;" -->
        <!-- style="filter:contrast(200%);" alt=""></span> -->
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><img src="vistas/img/plantilla/logoE.png" class="img-responsive" width="80%" -->
        <!-- style="padding:5px 30px;filter:contrast(200%);" alt="logoE"></span> -->
        <span class="logo-mini"><b>U</b>DE</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>UDE</b>NAR</span>
    </a>
    <!-- Fin logo -->
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php
                // include "header/notificaciones.php";
                if (isset($_SESSION["nombre"])) {
                    include "header/usuario.php";
                }
                if (isset($_SESSION["nombre_al"])) {
                    include "header/alumno.php";
                }
                if (isset($_SESSION["nombre_ma"])) {
                    include "header/profesor.php";
                }
                ?>
            </ul>
        </div>
    </nav>
    <!-- Fin nabvar -->
</header>
<!-- -------Fin main header-->