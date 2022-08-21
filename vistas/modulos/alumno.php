<?php
if (isset($_SESSION["perfil_p"]) == "profesor") {
    echo '<script>
            window.location = "calificacion";
          </script>';
}
?>
<!-- ======================Inicio========================= -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Registro de alumno
            <small>Panel de control</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i>&nbsp;Inicio</a></li>
            <li class="active">Regsitro de alumno</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!--===================================
                * BLOQUE 1
                ===================================-->
                <?php
                /**===================================
                 * Alta de alumnos datos personales
                 ===================================**/
                include "alumno/datos.personal.php";
                /**===================================
                 * MOSTRAR COLORES
                 ===================================**/
                // include "comercio/colores.php";
                /**===================================
                 * MOSTRAR REDES SOCIALES
                 ===================================**/
                // include "comercio/redSocial.php";


                ?>
                <!--===================================
                * FIN BLOQUE 1
                ===================================-->

            </div>
            <div class="col-md-6">
                <!--===================================
                * BLOQUE 2
                ===================================-->
                <?php
                /**===================================
                 * ADMINISTRAR CÓDIGOS
                 ===================================**/

                // include "comercio/codigos.php";
                // Fin administar script códigos.
                /**===================================
                 * ADMINISTRAR COMERCIO
                 ===================================**/

                // include "comercio/informacion.php";
                // Fin administar comercio.
                ?>
                <!--===================================
                * FIN BLOQUE 2
                ===================================-->

            </div>
        </div>
    </section>
</div>