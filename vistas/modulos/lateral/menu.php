<!-- ============MENÚ -->
<ul class="sidebar-menu" data-widget="tree">

    <?php
    if (isset($_SESSION["perfil_al"]) == "alumno") {
        echo '
     <li class="active treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Alumnos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                <li><a href="perfilalumno"><i class="fa fa-circle-o"></i> Perfil alumno</a></li>
        </ul>
    </li>';
    } elseif (isset($_SESSION["perfil"]) == "administrador") {
        echo '
     <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Alumnos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span> 
        </a>
        <ul class="treeview-menu">
                <li><a href="mostraralumno"><i class="fa fa-circle-o"></i> Gestión alumno</a></li>
                 <li><a href="calificacionalumno"><i class="fa fa-circle-o"></i> Calificaciones</a></li>
        </ul>
    </li>';
    }
    ?>
    <?php
    if (isset($_SESSION["perfil"]) == "administrador") {
        echo '
    <li class="treeview">
        <a href="#">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Maestros</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                <li><a href="profesor"><i class="fa fa-circle-o"></i>Gestión maestros</a></li>
        </ul>
    </li>';
    } elseif (isset($_SESSION["perfil_p"]) == "profesor") {
        echo '
        <li class="treeview">
        <a href="#">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Maestros</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="calificacion"><i class="fa fa-circle-o"></i>Ingresar calificación</a></li>
            <li><a href="perfilmaestro"><i class="fa fa-circle-o"></i>Perfil maestro</a></li>
        </ul>
    </li>';
    }
    ?>
    <?php
    if (isset($_SESSION["perfil"]) == "administrador") {

        echo '
        <li class="treeview">
            <a href="#">
                <i class="fas fa-hourglass-half"></i>
                <span>Relaciones</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="horarioClases"><i class="fa fa-circle-o"></i>Agregar alumno<br>profesor</a></li>
            </ul>
        </li>
        <li>
            <a href="administrador">
                <i class="fas fa-users-cog"></i>
                <span>Administradores</span>
            </a>
        </li>';
    }
    ?>
</ul>
<!-- ============FIN MENÚ -->