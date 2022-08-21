<!-- ======================Inicio========================= -->
<?php
if (isset($_SESSION["perfil_p"]) != "profesor") {
    echo '<script>
            window.location = "alumno";
          </script>';
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Perfil de maestro
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="perfilalumno"><i class="fa fa-dashboard"></i>&nbsp;Inicio</a></li>
            <li class="active">Información de maestro</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body">
                        <?php

                        if ($_SESSION["foto_ma"] == "") {

                            echo '<div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="vistas/img/perfiles/default/anonymous.png" alt="User profile picture">
                                  </div>
                                  <h3 class="profile-username text-center">' . $_SESSION["nombre_ma"] . '</h3>
                                  <h4 class="text-muted text-center">Usuario: ' . $_SESSION["perfil_ma"] . '</h4>';
                        } else {
                            echo '<div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="' . $_SESSION["foto_ma"] . '" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">' . $_SESSION["nombre_ma"] . '</h3>
                                <h4 class="text-muted text-center">Usuario: ' . $_SESSION["perfil_p"] . '</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link btn2 btn-success btnEditarProfesor"
                                            style="color: #ffffff;" href="#datos" data-toggle="tab">Datos
                                            personales&nbsp; <i class="fas fa-user-check"></i></a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <br>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="datos">
                                        <?php include "maestro/datosmaestro.php"; ?>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>