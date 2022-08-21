<!-- ================USUARIOS -->
<!-- Profesor menú -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php

        if ($_SESSION["foto_ma"] == "") {

            echo '<img src="vistas/img/perfiles/default/anonymous.png" class="user-image" mat="User Image">';
        } else {
            echo '<img src="' . $_SESSION["foto_ma"] . '" class="user-image" mat="User Image">';
        }
        ?>

        <span class="hidden-xs"><?php echo $_SESSION["nombre_ma"]; ?></span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <?php

            if ($_SESSION["foto_ma"] == "") {
                echo '<img src="vistas/img/perfiles/default/anonymous.png" class="img-circle" mat="User Image">';
            } else {
                echo '<img src="' . $_SESSION["foto_ma"] . '" class="img-circle" mat="User Image">';
            }


            ?>

            <p>
                <?php echo $_SESSION["nombre_ma"]; ?>
            <h4 style="color:white"><?php echo $_SESSION["perfil_p"]; ?></h4>
            </p>
        </li>
        <li class="user-footer">
            <div class="pull-left">
                <a href="perfilmaestro" class="btn2 btn-primary">Perfil</a>
            </div>
            <div class="pull-right">
                <a href="salir" class="btn2 btn-danger">Salir</a>
            </div>
        </li>
    </ul>
</li>
<!-- Fin usuario menú -->
<!-- ================Fin USUARIOS -->