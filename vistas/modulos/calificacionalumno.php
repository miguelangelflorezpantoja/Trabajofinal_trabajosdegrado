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
<!-- ======================Profesor========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor calificaciones
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor de calificaciones</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-shadow-content">
            <div class="box-header with-border">
                <button class="btn1 btn-primary">Calificacion
                    de alumnos</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive table-hover tablaAlumnoCal" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Tipo nota</th>
                            <th>Alumno</th>
                            <th>Profesor</th>
                            <th>Nota</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Se trae desde js -->
                </table>
            </div>
        </div>
    </section>
</div>
<!--=====================================
MODAL CALIFICACIONES ALUMNO
======================================-->
<div id="modalEditarCalAd" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar nota</h4>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE ALUMNO
                    ======================================-->

                    <div class="col-md-12 col-sm-12">
                        <div class="box-body">
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="fontHora">Nota de grado</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                    <input type="hidden" class="idCalificacion" name="idCalificacion">
                                    <input type="number" class="form-control validate primeraEval" name="primeraEval"
                                        autocomplete=" off" spellcheck="false" step="any" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn1 btn-primary guardarEditCal">Guardar&nbsp;<i
                                class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
            <?php
            $editarCal = new ControladorCalificacion();
            $editarCal->ctrEditarCalificacionAd();
            ?>
        </div>
    </div>
</div>
<?php
$eliminarCal = new ControladorCalificacion();
$eliminarCal->ctrEliminarCalificacionAd();
?>