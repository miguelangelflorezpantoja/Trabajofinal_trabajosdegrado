<?php
class ControladorAdministradores
{

    /**===========INGRESO DE ADMINISTRADORES */

    public function ctrIngresoAdministrador()
    {

        if (isset($_POST["ingEmail"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
            ) {

                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["ingEmail"];

                $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

                // print_r($respuesta);
                if ($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1) {

                        $_SESSION["validarSesionBackend"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["perfil"] = $respuesta["perfil"];
                        # La variable get inicio se establece en el .htaccess.
                        echo '<script>

						window.location = "mostraralumno";

					</script>';
                    } else {
                        echo '<script>
                                swal({
                                    type: "error",
                                    title: "¡El administrador no está activo!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
                                        if (result.value) {

                                        window.location = "ingreso";

                                        }
                                    })
                              </script>';
                    }
                } else {
                    echo '<script>
                                swal({
                                    type: "error",
                                    title: "¡Error, correo electrónico o contraseña incorrectos!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
                                        if (result.value) {

                                        window.location = "ingreso";

                                        }
                                    })
                              </script>';
                }
            }
        }
    }
    /**===========FIN INGRESO DE ADMINISTRADORES */
}
