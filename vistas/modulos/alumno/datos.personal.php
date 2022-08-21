<section class="content">
    <div class="box box-shadow-content">
        <div class="box-header with-border">
            <button class="btn1 btn-primary">Ingresar datos</button>
        </div>
        <div class="box-body">
            <label for="">
                <h4><b>Completa tus datos personales con la información correcta</b></h4>
            </label>
            <?php
            $valor = $_SESSION["id"];
            $mostrarAl = ControladorAlumno::ctrMostrarAlumnosEdit($valor);
            foreach ($mostrarAl as $key => $value) {
                echo '
                    <button class="btn1 btn-danger btnCompletarAlumno" idAlumno="' . $value["id"] . '" data-toggle="modal" data-target="#modalCompletarAlumno">Completar información&nbsp; <i class="fa fa-pencil"></i></button>
                    ';
            }

            ?>
            <br><br>
            <label for="">
                <h4><b>Nota:</b>
                    cambiar tus datos.
                </h4>
            </label>
        </div>
    </div>
</section>
<!--=====================================
MODAL EDITAR ALUMNO
======================================-->
<div id="modalCompletarAlumno" class="modal fade" role="dialog">
    <div class="modal-dialog modal-extralg">
        <div class="modal-content">

            <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
            <form>
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EDITAR ALUMNO</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE ALUMNO
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6">
                            <div class="form-group col-md-4 col-sm-4">
                                <div class="panel"><label>SUBIR FOTO ALUMNO</label></div>
                                <input type="file" class="fotoAlumno">
                                <input type="hidden" class="antiguaFotoAlumno">
                                <input type="hidden" class="idAlumno">
                                <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                        foto
                                        2MB</b>
                                </p>
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <center><img src="vistas/img/alumno/default/anonymous.png"
                                        class="img-thumbnail previsualizarPortada" width="50%"></center>
                            </div>
                        </div>
                        <!--=====================================
                        ENTRADA DE MATRICULA DEL ALUMNO
                        ======================================-->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <label for="">
                                        <h4><b>Espera tu matrícula para finalizar el proceso de registro.</b></h4>
                                    </label>

                                    <input type="hidden" class="form-control input-lg validarMatricula numeroMatricula"
                                        placeholder="Ingresar matrícula" onkeyup="mayusA(this);" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA NOMBRE DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regAlumno"
                                        placeholder="Nombre alumno" id="regAlumno" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO PATERNO DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoP"
                                        placeholder="Apellido paterno" id="regApellidoP" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA APELLIDO MATERNO DE ALUMNO
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regApellidoM"
                                        placeholder="Apellido materno" id="regApellidoM" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 margin-top-data">
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA CORREO ELECTRÓNICO
                            ======================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control input-lg validate regEmailA"
                                        placeholder="Correo electrónico" id="regEmail" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA PASSWORD
                            ======================================-->
                            <div class="form-group col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control input-lg validate regPasswordAE"
                                        placeholder="Password opcional" id="regPasswordAE">
                                    <input type="hidden" class="passwordActualA">
                                </div>

                            </div>
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