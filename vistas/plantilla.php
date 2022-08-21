<?php
session_start();
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestión escuela | Panel de control</title>
    <link rel="icon" href="vistas/img/plantilla/icono.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="vistas/dist/css/skins/skin-blue.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vistas/plugins/iCheck/square/blue.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome/css/all.css">
    <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vistas/plugins/font-awesome.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- <link rel="stylesheet" href="vistas/bower_components/jvectormap/jquery-jvectormap-2.0.5.css"> -->
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="vistas/bower_components/timepicker/timepicker.css">

    <!-- Backend personalizado -->
    <link rel=" stylesheet" href="vistas/css/backend.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Slider -->
    <link rel="stylesheet" href="vistas/plugins/bootstrap-slider/slider.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="vistas/plugins/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <!-- Tags -->
    <link rel="stylesheet" href="vistas/plugins/tags/bootstrap-tagsinput.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Dropzone -->
    <link rel="stylesheet" href="vistas/plugins/dropzone/dropzone.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">
    <!-- Alertas suaves css toastr -->
    <link rel="stylesheet" href="vistas/plugins/toastr/toastr.css">


    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 3 -->
    <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/dist/js/adminlte.min.js"></script>
    <!-- iCheck http://icheck.fronteed.com/-->
    <script src="vistas/plugins/iCheck/icheck.min.js"></script>
    <!-- Morris.js charts -->
    <script src="vistas/bower_components/raphael/raphael.min.js"></script>
    <script src="vistas/bower_components/morris.js/morris.min.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="vistas/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- ChartJS -->
    <script src="vistas/bower_components/Chart.js/Chart.js"></script>
    <!-- jvectormap -->
    <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <!-- <script src="vistas/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js"></script> -->
    <script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Alert -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- bootstrap color picker https://farbelous.github.io/bootstrap-colorpicker/v2/-->
    <script src="vistas/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- Bootstrap slider http://seiyria.com/bootstrap-slider/-->
    <script src="vistas/plugins/bootstrap-slider/bootstrap-slider.js"></script>
    <!-- DataTables https://datatables.net/-->
    <!-- <script src="vistas/plugins/datatables/datatables.min.js"></script> -->
    <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
    <!-- ----------Plugins para botones de datatables -->
    <script src="vistas/plugins/datatables/datatables.min.js"></script>
    <script src="vistas/plugins/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="vistas/plugins/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="vistas/plugins/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="vistas/plugins/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="vistas/plugins/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <!-- bootstrap tags input https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/-->
    <script src="vistas/plugins/tags/bootstrap-tagsinput.min.js"></script>
    <!-- bootstrap datetimepicker http://bootstrap-datepicker.readthedocs.io-->
    <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Dropzone http://www.dropzonejs.com/-->
    <script src="vistas/plugins/dropzone/dropzone.js"></script>
    <!-- Timer picker -->
    <script src="vistas/bower_components/timepicker/timepicker.js"></script>
    <!-- Select2 -->
    <script src="vistas/bower_components/select2/dist/js/select2.full.js"></script>
    <!-- Alertas suaves toastr -->
    <script src="vistas/plugins/toastr/toastr.min.js"></script>
    <!-- Plugin para números -->
    <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>
</head>
<!-- Con la clase sidebar collapse aparece la botonera no desplegada. -->

<body class="hold-transition skin-blue sidebar-mini login-page">
    <?php
    /**===================================
     * ESTABLECER HORA DEL SEVIDOR
     ===================================**/
    date_default_timezone_set('America/Mexico_City');
    //Preguntamos la zona horaria
    $zonahoraria = date_default_timezone_get();
    /**================================== */

    if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
        echo '<div class="wrapper">';
        /**============HEADER */
        include "modulos/header.php";
        /**============LATERAL */
        include "modulos/lateral.php";
        /**============CONTENIDO */

        if (isset($_GET["ruta"])) {
            if (
                $_GET["ruta"] == "alumno" ||
                $_GET["ruta"] == "mostraralumno" ||
                $_GET["ruta"] == "perfilalumno" ||
                $_GET["ruta"] == "calificacionalumno" ||
                $_GET["ruta"] == "profesor" ||
                $_GET["ruta"] == "perfilmaestro" ||
                $_GET["ruta"] == "horarioAlumno" ||
                $_GET["ruta"] == "horarioClases" ||
                $_GET["ruta"] == "administrador" ||
                $_GET["ruta"] == "calificacion" ||
                $_GET["ruta"] == "grupo" ||
                $_GET["ruta"] == "aula" ||
                $_GET["ruta"] == "gestormat" ||
                $_GET["ruta"] == "mensajes" ||
                $_GET["ruta"] == "perfil" ||
                $_GET["ruta"] == "salir"
            ) {
                include "modulos/" . $_GET["ruta"] . ".php";
            }
        } else {
            // En caso de que la página con una variable get de alumno no exista.
            include "modulos/alumno.php";
        }
        /**=============FOOTER============ */
        include "modulos/footer.php";
        echo '</div>';
    } else {
        include "modulos/login.php";
    }
    ?>
    <!-- Js personalizado -->
    <script src=" vistas/js/plantilla.js">
    </script>
    <script src="vistas/js/gestorAlumno.js"></script>
    <script src="vistas/js/gestorProfesor.js"></script>
    <script src="vistas/js/gestorAdmin.js"></script>
    <script src="vistas/js/gestorUbicacion.js"></script>
    <script src="vistas/js/gestorMatSem.js"></script>
    <script src="vistas/js/gestorClases.js"></script>
    <script src="vistas/js/gestorHorarioA.js"></script>
    <script src="vistas/js/gestorMostrarG.js"></script>
    <script src="vistas/js/gestorCalificacion.js"></script>
    <script src="vistas/js/gestorUniformes.js"></script>
    <script src="vistas/js/pagos.js"></script>
</body>

</html>