<?php
if (isset($_SESSION["perfil_al"]) == "alumno") {
    echo '<script>
            window.location = "alumno";
          </script>';
}
?>
<!-- ======================Materia mostrar========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor de calificaciones
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor de calificaciones</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <?php
                /*=====================================
                MOSTRAR GRUPO DE PROFESOR
                ======================================*/
                include "maestro/mostrarGrupos.php";

                ?>
            </div>
            <div class="col-md-12 col-xs-12">
                <?php
                /*=====================================
                ADMINISTRAR SEMESTRES
                ======================================*/
                include "maestro/asignacionCal.php";
                ?>
            </div>
        </div>
    </section>
</div>
<!-- ------------Fin mostrar materia -->