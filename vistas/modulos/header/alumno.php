<!-- ================USUARIOS -->
<!-- Usuario menú -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php

        if ($_SESSION["foto_al"] == "") {

            echo '<img src="vistas/img/perfiles/default/anonymous.png" class="user-image" alt="User Image">';
        } else {
            echo '<img src="' . $_SESSION["foto_al"] . '" class="user-image" alt="User Image">';
        }
        ?>

        <span class="hidden-xs"><?php echo $_SESSION["nombre_al"]; ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <?php

            if ($_SESSION["foto_al"] == "") {
                echo '<img src="vistas/img/perfiles/default/anonymous.png" class="img-circle" alt="User Image">';
            } else {
                echo '<img src="' . $_SESSION["foto_al"] . '" class="img-circle" alt="User Image">';
            }


            ?>

            <p>
                <?php echo $_SESSION["nombre_al"]; ?>
            <h4 style="color:white"><?php echo $_SESSION["perfil_al"]; ?></h4>
            </p>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <a href="perfilalumno" class="btn2 btn-primary">Perfil</a>
            </div>
            <div class="pull-right">
                <a href="salir" class="btn2 btn-danger">Salir</a>
            </div>
        </li>
    </ul>
</li>
<!-- Fin usuario menú -->
<!-- ================Fin USUARIOS -->