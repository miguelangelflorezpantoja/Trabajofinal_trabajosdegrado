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
<!-- ======================Administrador mostrar========================= -->
<div class="content-wrapper">
    <!-- ------Content header -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Gestor administradores
        </h1>
        <ol class="breadcrumb">
            <li><a href="alumno"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor administradores</li>
        </ol>
    </section>
    <section class="content">
        <div class="box box-shadow-content">
            <div class="box-header with-border">
                <button class="btn1 btn-primary" data-toggle="modal" data-target="#modalAgregarAdmin">Agregar
                    administrador</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive tablaAdministrador"
                    width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th>Password</th>
                            <th>Perfil</th>
                            <th>Fecha alta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Se trae desde js -->
                </table>
            </div>
            <!-- Footer -->
            <div class="box-footer">
                Footer
            </div>

        </div>
    </section>
</div>
<!-- ------------Fin mostra alumno -->
<!--=====================================
MODAL AGREGAR ADMINISTRADOR
======================================-->

<div id="modalAgregarAdmin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ALTA ADMINISTRADOR</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO AdMINISTRADOR
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6">
                            <div class="form-group col-md-4 col-sm-4">
                                <div class="panel"><label>SUBIR FOTO ADMINISTRADOR</label></div>
                                <input type="file" class="fotoAdmin" name="fotoAdmin">
                                <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                        foto
                                        2MB</b>
                                </p>
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <center><img src="vistas/img/admin/default/anonymous.png"
                                        class="img-thumbnail previsualizarAdmin" width="50%"></center>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA NOMBRE DE ADMINISTRADOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regAdmin"
                                        placeholder="Nombre administrador" id="regAdmin" name="regAdmin" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA CORREO ELECTRÓNICO
                            ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control input-lg validate regEmailAd"
                                        placeholder="Correo electrónico" id="regEmailAd" name="regEmailAd" required>
                                </div>
                            </div>
                            <!--=====================================
                                ENTRADA PARA PASSWORD
                                ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control input-lg validate" placeholder="Password"
                                        name="regPasswordAd" id="regPasswordAd" name="regPasswordAd" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA PERFIL DE ADMINISTRADOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-user-lock"></i></span>
                                    <input type="text" class="form-control input-lg validate regPerfilAd"
                                        placeholder="Perfil" id="regPerfilAd" name="regPerfilAd" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn1 btn-danger pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn1 btn-primary pull-right" id="guardarAdmin">Gurdar
                        administrador&nbsp;<i class="fas fa-angle-double-right"></i></button>
                </div>
            </form>
            <?php
            $crearAdmin = new ControladorAdmin();
            $crearAdmin->ctrCrearAdmin();
            // var_dump($crearAdmin);
            ?>
        </div>
    </div>
</div>
<!--=====================================
MODAL EDITAR ADMINISTRADOR
======================================-->
<div id="modalEditarAdmin" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->
                <div class="modal-header modalHeader text-center" style="background:#3c8dbc; color:white">
                    <button type="button" class="close text-white-modal" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">EDITAR ADMINISTRADOR</h4>
                </div>
                <div class="modal-body">
                    <br><br>
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO AdMINISTRADOR
                    ======================================-->
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-6">
                            <div class="form-group col-md-4 col-sm-4">
                                <div class="panel"><label>SUBIR FOTO ADMINISTRADOR</label></div>
                                <input type="file" class="fotoAdmin" name="fotoAdminE">
                                <input type="hidden" class="idAdmin" name="idAdmin">
                                <input type="hidden" class="antiguaFotoAdmin" name="antiguaFotoAdmin">
                                <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                        foto
                                        2MB</b>
                                </p>
                            </div>
                            <div class="form-group col-md-8 col-sm-8">
                                <center><img src="vistas/img/profesor/default/anonymous.png"
                                        class="img-thumbnail previsualizarAdmin" width="50%"></center>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!--=====================================
                            ENTRADA PARA NOMBRE DE ADMINISTRADOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control input-lg validate regAdmin"
                                        placeholder="Nombre administrador" id="regAdminE" name="regAdminE" required>
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA CORREO ELECTRÓNICO
                            ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control input-lg validate regEmailAd"
                                        placeholder="Correo electrónico" id="regEmailAdE" name="regEmailAdE" required>
                                </div>
                            </div>
                            <!--=====================================
                                ENTRADA PARA PASSWORD
                                ======================================-->
                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control input-lg validate password"
                                        placeholder="Password opcional" name="regPasswordE" id="regPasswordAdE">
                                    <input type="hidden" class="passwordActual" name="passwordActual">
                                </div>
                            </div>
                            <!--=====================================
                            ENTRADA PARA PERFIL DE ADMINISTRADOR
                            ======================================-->

                            <div class="form-group col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fas fa-user-lock"></i></span>
                                    <input type="text" class="form-control input-lg validate regPerfilAd"
                                        placeholder="Perfil" id="regPerfilAdE" name="regPerfilAdE" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="button" class="btn1 btn-danger pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" id="guardarAdministrador"
                        class="btn1 btn-primary pull-right guardarAdminEditar">Guardar
                        cambios&nbsp;<i class="fas fa-angle-double-right"></i></button>
                </div>
            </form>
            <?php
            $editarAdmin = new ControladorAdmin();
            $editarAdmin->ctrEditarAdmin();
            // var_dump($crearAdmin);
            ?>
        </div>
    </div>
</div>
<?php
$eliminarAdmin = new ControladorAdmin();
$eliminarAdmin->ctrEliminarAdmin();
// var_dump($eliminarAlumno);
?>
<!--===================================
 * BlOQUEO DE LA TECLA ENTER
 ===================================-->
<!-- <script>
// No se envía el formulario, sea activan las validaciones en html.
$(document).keydown(function(e) {
    if (e.keyCode == 13) {
        e.preventDefault();
    }
})
</script> -->