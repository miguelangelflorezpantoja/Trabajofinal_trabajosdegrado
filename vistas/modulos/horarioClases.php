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
<!-- ======================Horario clases mostrar========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor de relación de maestros y alumnos
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor para agregar alumno a profesor</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-shadow-content">
            <div class="box-header with-border">
                <button class="btn1 btn-primary" data-toggle="modal" data-target="#modalAgregarHorarioC">Agregar
                    profesor a acciones</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-hover dt-responsive tablaHorarioC" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Tipo Nota</th>
                            <th>Maestro</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Se trae desde js -->
                </table>
            </div>
        </div>
    </section>
</div>
<!-- ------------Fin mostrar horario clases -->
<!--=====================================
MODAL AGREGAR HORARIO DE CLASES
======================================-->
<div id="modalAgregarHorarioC" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registro de acción profesor</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <!--=====================================
                    ENTRADA PARA SUBIR DATOS
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-12 col-sm-12">
                            <!--===================================
                             * ELEGRIR MATERIA
                             ===================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select class="form-control input-lg seleccionarMateria validarMateriaC"
                                        name="seleccionarMateria" required>
                                        <option value="">Elegir tipo nota</option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $materia = ControladorMateria::ctrMostrarMateriaOrden($item, $valor);
                                        foreach ($materia as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_materia"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!--===================================
                             * ENTRADA DE DATO MAESTRO
                             ===================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <select class="form-control select2 input-lg selecProfesor" name="selecProfesor"
                                        style="width: 100%; height:3rem" required>
                                        <option selected="selected">Escriba el maestro</option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $grupo = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
                                        foreach ($grupo as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_ma"] . " " . $value["apPaterno_ma"] . " " . $value["apMaterno_ma"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn1 btn-primary guardarHorarioClase"
                            id="guardarMateria">Guardar&nbsp;<i class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
            <?php
            $crearHorarioClases = new ControladorHorarioC();
            $crearHorarioClases->ctrCrearClase();
            // var_dump($crearAula);
            ?>
        </div>
    </div>
</div>
<!--=====================================
MODAL EDITAR HORARIO DE CLASES
======================================-->
<div id="modalEditarHorariorC" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EDITAR RELACIÓN</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <!--=====================================
                    ENTRADA PARA SUBIR DATOS
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-12 col-sm-12">
                            <!--===================================
                             * ELEGRIR MATERIA
                             ===================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="">Editar tipo nota:</label>
                                <div class="input-group">
                                    <input type="hidden" class="idHorarioC" name="idHorarioC">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select class="form-control input-lg seleccionarMateria" name="seleccionarMateriaE"
                                        required>
                                        <option class="optionEditarMateriaC"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $materia = ControladorMateria::ctrMostrarMateriaOrden($item, $valor);
                                        foreach ($materia as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_materia"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="">Editar profesor:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <select class="form-control select2 input-lg selecProfesor" name="selecProfesorE"
                                        style="width: 100%; height:3rem;" required>
                                        <option selected=" selected" class="optionEditarProfesor"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $grupo = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
                                        foreach ($grupo as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_ma"] . " " . $value["apPaterno_ma"] . " " . $value["apMaterno_ma"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn1 btn-primary editarHorarioClase">Guardar cambios&nbsp;<i
                                class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
            <?php
            $editarHorarioClases = new ControladorHorarioC();
            $editarHorarioClases->ctrEditarClase();
            // var_dump($crearAula);
            ?>
        </div>
    </div>
</div>
<!--=====================================
MODAL AGREGAR HORARIO DE CLASES ALUMNO
======================================-->
<div id="modalEditarHorariorCA" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">AGREGAR ALUMNO A PROFESOR</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <!--=====================================
                    ENTRADA PARA SUBIR DATOS
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-12 col-sm-12">
                            <!--===================================
                             * ELEGRIR MATERIA
                             ===================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="">TIPO NOTA:</label>
                                <div class="input-group">
                                    <input type="hidden" class="idHorarioC" name="idHorarioCA">
                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                    <select class="form-control input-lg seleccionarMateria" name="seleccionarMAlumno"
                                        required>
                                        <option class="optionEditarMateriaC"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $materia = ControladorMateria::ctrMostrarMateriaOrden($item, $valor);
                                        foreach ($materia as $key => $value) {
                                            echo '<option value="' . $value["id"] . '" readonly>' . $value["nombre_materia"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="">Maestro:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <select class="form-control select2 input-lg selecProfesor" name="selecPA"
                                        style="width: 100%; height:3rem;" required>
                                        <option selected=" selected" class="optionEditarProfesor"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $grupo = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
                                        foreach ($grupo as $key => $value) {
                                            echo '<option value="' . $value["id"] . '">' . $value["nombre_ma"] . " " . $value["apPaterno_ma"] . " " . $value["apMaterno_ma"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--=====================================
                            ENTRADA PARA HORA INICIAL
                            ======================================-->
                        <div class="col-md-12 col-sm-12">
                            <!--===================================
                            * ENTRADA DE DATO ALUMNO
                            ===================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="">
                                    Agregar alumno:
                                </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-chalkboard-teacher"></i></span>
                                    <select class="form-control select2 input-lg" name="selecAlumnoC" id="selecAlumnoC"
                                        style="width: 100%; height:3rem" required>
                                        <option selected="selected"></option>
                                        <?php
                                        $item = null;
                                        $valor = null;
                                        $alumno = ControladorAlumno::ctrMostrarAlumno($item, $valor);
                                        foreach ($alumno as $key => $value) {
                                            // var_dump($value);
                                            if ($value["estado"] != 0) {
                                                echo '<option value="' . $value["id"] . '">' . $value["nombre_al"] . " " . $value["apellidoPaterno_al"] . " " . $value["apellidoMaterno_al"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="submit" class="btn1 btn-primary editarHorarioClaseAl"
                            id="editarHorarioClaseAl">Guardar&nbsp;<i class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
            <?php
            $ingresarHorarioA = new ControladorHorarioC();
            $ingresarHorarioA->ctrCrearClaseAl();
            // var_dump($crearAula);
            ?>
        </div>
    </div>
</div>
<?php
$eliminarHorarioClases = new ControladorHorarioC();
$eliminarHorarioClases->ctrEliminarClase();
// var_dump($crearAula);
?>