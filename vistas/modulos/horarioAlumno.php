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
<!-- ======================Horario profesor mostrar========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor horario de alumnos
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor horario de alumnos</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-shadow-content">
            <div class="box-header with-border">
                <label for="">
                    <h4>Tabla horarios de alumnos</h4>
                </label>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive tablaHorarioA" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Alumno</th>
                            <th>Tipo nota</th>
                            <th>Maestro</th>
                            <th>Estado</th>
                            <th>Día</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Se trae desde js -->
                </table>
            </div>
        </div>
    </section>
</div>
<!-- ------------Fin mostrar horario profesor -->
<?php
$eliminarHorarioCA = new ControladorHorarioC();
$eliminarHorarioCA->ctrEliminarClaseA();