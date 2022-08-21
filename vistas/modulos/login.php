<nav class="navbar navbar-default navlogin">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div>
            <ul class="nav navbar-nav promo">
                <label for="">
                    <h4 class="text-white-title">Universidad de Nariño</h4>
                </label>
            </ul>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="" data-toggle="modal" data-target="#modalIngresoA"><b>Estudiantes</b>&nbsp;<i
                            class="fas fa-user" style="color: slateblue;"></i></a>
                </li>
                <li><a href="#" class="" data-toggle="modal" data-target="#modalIngresoP"><b>Profesores</b>&nbsp;<i
                            class="fas fa-chalkboard-teacher" style="color: slateblue;"></i></a>
                </li>
                <li><a href="#" class="" data-toggle="modal" data-target="#modalIngresoAd"><b>Administrador</b>&nbsp;<i
                            class="fas fa-users-cog" style="color: slateblue;"></i></a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row custom-section d-flex align-items-center">
        <div class="col-12 col-lg-4">
            <h2 class="slogan">Sistema de gestión para trabajos de grado<br> modalidad III</h2>
            <h3>Bienvenido</h3>
            <p>Ingresa a tu perfil en la parte superior derecha.</p>
            <a class="btn1 btn-primary" href="#">Bienvenidos</a>
        </div>
        <div class="col-12 col-lg-8 marginTop">
            <img src="vistas/img/plantilla/download.jpg" class="im-responsive imagen-portada" alt="Team process banner">
        </div>
    </div>
</div>
<!-- ------MODAL ALUMNOS -->
<div id="modalIngresoA" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm modal-top">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="login-logo">
                    <h3>Acceder</h3>
                </div>
                <h3 class="login-box-msg">Ingresar al sistema</h3>

                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="ingEmailA" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="ingPasswordA" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <button type="submit" class="btn1 btn-primary">Ingresar</button>
                            </div>
                            <div class="col-md-6 col-sm-8 col-xs-6">
                                <label for="">¿No tienes cuenta?</label>
                                <a href="#crearCuenta" data-toggle="modal" data-dismiss="modal">Crear cuenta</a>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                $login = new ControladorAlumno();
                $login->ctrIngresoAlumno();
                ?>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->
        </div>
    </div>
</div>
<!-- ------MODAL PROFESOR -->
<div id="modalIngresoP" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm modal-top">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="login-logo">
                    <h3>Acceder</h3>
                </div>
                <h3 class="login-box-msg">Ingresar al sistema</h3>

                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="ingEmailP" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="ingPasswordP" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn1 btn-primary">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                $login = new ControladorProfesor();
                $login->ctrIngresoProfesor();
                ?>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->
        </div>
    </div>
</div>
<!-- ------MODAL ADMINISTRADOR -->
<div id="modalIngresoAd" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm modal-top">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="login-logo">
                    <h3>Acceder</h3>
                </div>
                <h3 class="login-box-msg">Ingresar al sistema</h3>

                <form method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email" name="ingEmail" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn1 btn-primary">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                $login = new ControladorAdministradores();
                $login->ctrIngresoAdministrador();
                ?>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->
        </div>
    </div>
</div>
<!-- ------MODAL CREAR CUENTA DE INGRESO ALUMNO -->
<div id="crearCuenta" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm modal-topR">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="login-logo">
                    <h3>Acceder</h3>
                </div>
                <h3 class="login-box-msg">Registro</h3>

                <form method="post" enctype="multipart/form-data">
                    <!--=====================================
                    ENTRADA PARA SUBIR FOTO DE ALUMNO
                    ======================================-->
                    <div class="form-group has-feedback">
                        <div class="panel"><label>SUBIR FOTO ALUMNO</label></div>
                        <input type="file" class="fotoAlumno" name="fotoAlumno" required>
                        <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la foto
                                2MB</b>
                        </p>
                    </div>
                    <div class="form-group has-feedback">
                        <center><img src="vistas/img/usuarios/default/anonymous.png"
                                class="img-thumbnail previsualizarPortada" width="20%"></center>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control validate regAlumno" placeholder="Nombre alumno"
                            name="regAlumno" id="regAlumno" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control validate regApellidoP" placeholder="Apellido paterno"
                            id="regApellidoP" name="regApellidoP" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control validate regApellidoM" placeholder="Apellido materno"
                            id="regApellidoM" name="regApellidoM" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control validate regEmailA" placeholder="Correo electrónico"
                            id="regEmail" name="regEmailA" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control regPassword" placeholder="Password"
                            name="regPassword" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn1 btn-primary">Registrarse</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                $registroAl = new ControladorAlumno();
                $registroAl->ctrRegistroAlumno();
                ?>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->
        </div>
    </div>
</div>