<!--===================================
 *MOSTRAR DATOS DE MAESTROS
 ===================================-->
<!--=====================================
    CABEZA DEL MODAL
    ======================================-->
<div class="btn3 btn-primary text-center" style="background:#3c8dbc; color:white; width:100%">
    <h4 class="modal-title">PROFESOR</h4>
</div>
<div class="modal-body">
    <br><br>
    <!--=====================================
        ENTRADA PARA SUBIR FOTO DE PROFESOR
        ======================================-->
    <div class="col-md-12 col-sm-12">
        <div class="col-md-4">
            <?php
            if (isset($_SESSION["foto_ma"]) == "") {
                echo ' <center><img src="vistas/img/profesor/default/anonymous.png"
                            class="img-thumbnail" width="50%"></center>';
            } else {
                echo ' <center><img src="' . $_SESSION["foto_ma"] . '"
                            class="img-thumbnail" width="50%"></center>';
            }

            ?>
        </div>
        <div class="col-md-8 col-sm-12">
            <!--=====================================
                ENTRADA PARA NOMBRE DE PROFESOR
                ======================================-->
            <div class="col-md-12 col-sm-12">
                <div class="form-group col-md-3">
                    <h4>Nombre:</h4>
                </div>
                <div class="form-group col-md-9 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg validate regProfesor"
                            value="<?php echo $_SESSION["nombre_ma"]; ?>" readonly>
                    </div>
                </div>
            </div>
            <!--=====================================
                ENTRADA PARA APELLIDO PATERNO DE PROFESOR
                ======================================-->
            <div class="col-md-12 col-sm-12">
                <div class="form-group col-md-3">
                    <h4>Apellido materno:</h4>
                </div>
                <div class="form-group col-md-9 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg validate regApellidoPP"
                            value="<?php echo $_SESSION["apPaterno_ma"]; ?>" readonly>
                    </div>
                </div>
            </div>
            <!--=====================================
                ENTRADA PARA APELLIDO MATERNO DE PROFESOR
                ======================================-->
            <div class="col-md-12 col-sm-12">
                <div class="col-md-3">
                    <h4>Apellido paterno:</h4>
                </div>
                <div class="form-group col-md-9 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-lg validate regApellidoMP"
                            value="<?php echo $_SESSION['apMaterno_ma']; ?>" readonly>
                    </div>
                </div>
            </div>

            <!--=====================================
                ENTRADA PARA CORREO ELECTRÓNICO
                ======================================-->
            <div class="col-md-12 col-sm-12">
                <div class="col-md-3">
                    <h4>Email:</h4>
                </div>
                <div class="form-group col-md-9 col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control input-lg validate regEmailP"
                            value="<?php echo $_SESSION["email_ma"]; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="box-footer">
        <center>
            <button type="button" class="btn1 btn-danger" data-dismiss="modal">Salir</button>
            <button type="button" class="btn1 btn-primary guardarCambiosProfesor">Guardar
                información&nbsp;<i class="fas fa-angle-double-right"></i></button>
        </center>
    </div> -->