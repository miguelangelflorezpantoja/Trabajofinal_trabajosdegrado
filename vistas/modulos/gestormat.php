<?php
if (isset($_SESSION["perfil_al"]) == "alumno") {
    echo '<script>
            window.location = "alumno";
          </script>';
} elseif (isset($_SESSION["perfil_p"]) == "profesor") {
    echo '<script>
            window.location = "calificacion";
          </script>';
}
?>
<!-- ======================Materia mostrar========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor materias y semestres
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor materias y semestres</li>
        </ol>
    </section>
    <section class="content">
        <div class="">
            <div class="col-md-12 col-xs-12">
                <!--=====================================
                BLOQUE 1
                ======================================-->

                <?php
                /*=====================================
                ADMINISTRAR MATERIAS
                ======================================*/

                include "matSemestre/materia.php";

                ?>
            </div>
            <!-- <div class="col-md-6 col-xs-12"> -->

            <!--=====================================
                BLOQUE 2
                ======================================-->

            <?php
            /*=====================================
                ADMINISTRAR SEMESTRES
                ======================================*/
            // include "matSemestre/semestre.php";

            ?>

            <!-- </div> -->
        </div>
    </section>
</div>
<!-- ------------Fin mostrar materia -->