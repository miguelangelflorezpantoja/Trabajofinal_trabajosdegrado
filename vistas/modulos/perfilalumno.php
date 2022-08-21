<!-- ======================Inicio========================= -->
<?php
if (isset($_SESSION["perfil_al"]) != "alumno") {
    echo '<script>
            window.location = "alumno";
          </script>';
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Perfil de alumno
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="perfilalumno"><i class="fa fa-dashboard"></i>&nbsp;Inicio</a></li>
            <li class="active">Información de alumno</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <?php

                        if ($_SESSION["foto_al"] == "") {

                            echo '<div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="vistas/img/perfiles/default/anonymous.png" alt="User profile picture">
                                  </div>
                                  <h3 class="profile-username text-center">' . $_SESSION["nombre_al"] . '</h3>
                                  <h4 class="text-muted text-center">Usuario: ' . $_SESSION["perfil_al"] . '</h4>';
                        } else {
                            echo '<div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="' . $_SESSION["foto_al"] . '" alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">' . $_SESSION["nombre_al"] . '</h3>
                                <h4 class="text-muted text-center">Usuario: ' . $_SESSION["perfil_al"] . '</h4>';
                        }
                        ?>
                        <ul class="list-group list-group-unbordered mb-3">
                            <!-- <li class="list-group-item">
                                <center><b>Nivel escolar:</b> <a class="float-right"> PRIMER SEMESTRE</a></center>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="box box-warning">
                    <div class="box-body">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="active btn3 btn-primary" href="#activity"
                                            data-toggle="tab">Calificaciones&nbsp; <i
                                                class="fas fa-book-reader"></i></a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link btn3 btn-success" style="color: #ffffff;"
                                            href="#datos" data-toggle="tab">Datos personales&nbsp; <i
                                                class="fas fa-user-check"></i></a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <br>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <?php
                                            include "alumno/calificaciones.php";
                                            ?>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="datos">
                                        <?php
                                        include "alumno/alumnodatos.php";
                                        ?>
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