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
            Gestor profesores
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor profesores</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-shadow-content">
            <div class="box-header with-border">
                <button class="btn1 btn-primary" data-toggle="modal" data-target="#modalAgregarProfesor">Agregar
                    profesor</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive table-hover tablaProfesor" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Status</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Se trae desde js -->
                </table>
            </div>
            <!-- Footer -->
            <div class="box-footer">

            </div>

        </div>
    </section>
</div>
<!--=====================================
MODAL INGRESAR PROFESOR
======================================-->
<div id="modalAgregarProfesor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-extralg">
        <div class="modal-content">
            <form>
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">REGISTRO PROFESOR</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE PROFESOR
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6">
                            <div class="form-group col-md-4 col-sm-4">
                                <div class="panel"><label>SUBIR FOTO PROFSOR</label></div>
                                <input type="file" class="fotoProfesor">
                                <p class=" help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                        foto
                                        2MB</b>
                                </p>
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <center><img src="vistas/img/profesor/default/anonymous.png"
                                        class="img-thumbnail previsualizarPortada" width="50%"></center>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA NOMBRE DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regProfesor"
                                        placeholder="Nombre profesor" id="regProfesor" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO PATERNO DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoPP"
                                        placeholder="Apellido paterno" id="regApellidoPP" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO MATERNO DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoMP"
                                        placeholder="Apellido materno" id="regApellidoMP" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 margin-top-data">
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA CORREO ELECTRÓNICO
                            ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control input-lg validate regEmailP"
                                        placeholder="Correo electrónico" id="regEmail" required>
                                </div>
                            </div>
                            <!--=====================================
                                ENTRADA PARA PASSWORD
                                ======================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control input-lg validate regPasswordP"
                                        placeholder="Password" id="regPasswordP" required>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="button" id="guardarProfesor" class="btn1 btn-primary guardarProfesor">Guardar
                            información&nbsp;<i class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<!--=====================================
MODAL EDITAR ALUMNO
======================================-->

<div id="modalEditarProfesor" class="modal fade" role="dialog">
    <div class="modal-dialog modal-extralg">
        <div class="modal-content">
            <form>
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EDITAR PROFESOR</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE PROFESOR
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6">
                            <div class="form-group col-md-4 col-sm-4">
                                <div class="panel"><label>SUBIR FOTO PROFSOR</label></div>
                                <input type="file" class="fotoProfesor">
                                <input type="hidden" class="antiguaFotoProfesor">
                                <input type="hidden" class="idProfesor">
                                <p class=" help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                        foto
                                        2MB</b>
                                </p>
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <center><img src="vistas/img/profesor/default/anonymous.png"
                                        class="img-thumbnail previsualizarPortada" width="50%"></center>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA NOMBRE DE PROFESOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regProfesor"
                                        placeholder="Nombre profesor" id="regProfesorE" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO PATERNO DE PROFESOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoPP"
                                        placeholder="Apellido paterno" id="regApellidoPPE" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO MATERNO DE PROFESOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoMP"
                                        placeholder="Apellido materno" id="regApellidoMPE" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--=====================================
                    ENTRADA PARA SELECCIONAR GÉNERO
                    ======================================-->
                    <div class="col-md-12 margin-top-data">
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA CORREO ELECTRÓNICO
                            ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control input-lg validate regEmailP"
                                        placeholder="Correo electrónico" id="regEmailE" required>
                                </div>
                            </div>

                            <!--=====================================
                                ENTRADA PARA PASSWORD
                                ======================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control input-lg validate regPasswordPE"
                                        placeholder="Password opcional" id="regPasswordPE">
                                    <input type="hidden" class="passwordActualP">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <center>
                        <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
                        <button type="button" class="btn1 btn-primary guardarCambiosProfesor">Guardar
                            información&nbsp;<i class="fas fa-angle-double-right"></i></button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$eliminarProfesor = new ControladorProfesor();
$eliminarProfesor->ctrEliminarProfesor();
// var_dump($eliminarAlumno);
?>