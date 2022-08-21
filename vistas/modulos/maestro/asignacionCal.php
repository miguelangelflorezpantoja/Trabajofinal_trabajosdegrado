<?php
if (isset($_SESSION["validarSesionBackend"])) {

    $valor = $_SESSION["id"];
    $mostrarG = ControladorHorarioA::ctrMostrarClaseDAl($valor);

    foreach ($mostrarG as $key => $value) {
        $item = "id";
        $valor = $value["id_materia"];
        $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
        // var_dump($materia);
        echo '
                    <div class="box box-shadow-content">
                        <div class="box-header with-border">
                            <button class="btn1 btn-primary">Calificaciones de <strong>' . $materia["nombre_materia"] . '</strong></button>
                            <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="collapse" data-parent="#accordion"><i class="fa fa-minus"></i>
                                    </button>
                            </div>
                        </div>
                        <div class="box-body">';

        $valor2 = $_SESSION["id"];
        $mostrarCal = ControladorCalificacion::ctrMostrarCalificacionAl($valor2);
        if (!$mostrarCal) {
            echo '<div class="alert alert-info"><center><h4>No existe información de calificaciones</h4></center></div>';
        } else {
            echo '
                        <table class="table table-bordered table-hover table-striped dt-responsive tablaMostrarCalficaionAl" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo de nota</th>
                                    <th>Alumnos</th>
                                    <th>Nota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <!-- Se trae desde js -->';

            foreach ($mostrarCal as $key => $value2) {
                if ($value["id_materia"] == $value2["id_materia"]) {
                    echo '
                    
                                 <tr>
                                    <td>' . ($key + 1) . '</td>';
                    /**===================================
                     * TRAER ALUMNO
                    ===================================**/
                    $item = "id";
                    $valor = $value2["id_alumno"];
                    $alumno = ControladorAlumno::ctrMostrarAlumnoC($item, $valor);
                    echo '
                                    <td><center>' . $materia["nombre_materia"] . '</center></div>
                                    <td>' . $alumno["nombre_al"] . " " . $alumno["apellidoPaterno_al"] . " " . $alumno["apellidoMaterno_al"] . '</td>
                                    <td><center>' . $value2["primera_eval"] . '</center></div>';

                    echo '
                                     <td>
                                        <div class="btn-group">
                                            <button class="btn3 btn-danger btnEditarCal" ideditCal="' . $value2["id"] . '" data-toggle="modal" data-target="#modalEditarCal">Ingresar calificaciones&nbsp; <i class="fa fa-pencil"></i></button>
                                        </div>  
                                    </td>';
                }
            }
            echo '    
                            </tbody>
                        </table>';
        }
        echo '
                        </div>
                    </div>';
    }
}
?>
<!--=====================================
MODAL CALIFICACIONES ALUMNO
======================================-->
<div id="modalEditarCal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ingresar nota</h4>
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
                                        autocomplete="off" spellcheck="false" step="any" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn1 btn-primary guardarEditCal">Guardar nota&nbsp;<i
                                class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
            <?php
            $editarCal = new ControladorCalificacion();
            $editarCal->ctrEditarCalificacion();
            ?>
        </div>
    </div>
</div>