<!-- ======================Mostrar grupos para maestro========================= -->
<div class="box box-shadow-content">
    <div class="box-header with-border">
        <!-- <h3 class="box-title">Materia</h3>
        <div class="box-tools pull-right"> -->
        <button class="btn1 btn-primary">Tu tipo de nota</button>
        <!-- </div> -->
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tablaMostrarGrupo" width="100%">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Profesor</th>
                    <th>Tipo nota</th>
                </tr>
            </thead>
            <!-- Se trae desde js -->
        </table>
    </div>
</div>
<!-- ==================Fin mostrar grupo para maestros -->
<!--=====================================
MODAL CALIFICACIONES ALUMNO
======================================-->
<div id="modalCalificaciones" class="modal fade" role="dialog">
    <div class="modal-dialog modal-extralg">
        <div class="modal-content">

            <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <form>
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar calificaciones</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE ALUMNO
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="box-body">
                            <table
                                class="table table-bordered table-hover table-striped dt-responsive tablaMostrarAlumnoC"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Alumnos</th>
                                        <th>1a Ev</th>
                                        <th>2a Ev</th>
                                        <th>3a Ev</th>
                                        <th>4a Ev</th>
                                        <th>Evaluación ordinaria</th>
                                        <th>Promedio</th>
                                    </tr>
                                </thead>
                                <tbody class="mostrarAlumno">
                                </tbody>
                                <!-- Se trae desde js -->
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="button" class="btn1 btn-primary guardarCambiosAlumno">Guardar cambios de
                            alumno&nbsp;<i class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>