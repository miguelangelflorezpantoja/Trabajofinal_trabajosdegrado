<?php

class ControladorProfesor
{

    /**===================================
     * MOSTRAR PROFESORES
     ===================================**/
    static public function ctrMostrarProfesor($item, $valor)
    {
        $tabla = "profesor";
        $respuesta = ModeloProfesores::mdlMostrarProfesor($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR GÉNERO
     ===================================**/
    static public function ctrMostrarIdentidad($item, $valor)
    {

        $tabla = "genero";
        $respuesta = ModeloProfesores::mdlMostrarIdentidad($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR PROFESOR POR HORARIO - CLASE
     ===================================**/
    static public function ctrMostrarProfesorH($item, $valor)
    {

        $tabla = "profesor";
        $respuesta = ModeloProfesores::mdlMostrarProfesorH($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * GUARDAR DATOS DE ALUMNO
     ===================================**/
    static public function ctrCrearProfesor($datos)
    {
        if (isset($datos["regProfesor"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["regProfesor"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoPP"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoMP"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailP"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordP"])
            ) {
                $encriptar = crypt($_POST["regPasswordP"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                /*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $ruta = "";

                if (isset($datos["fotoProfesor"]["tmp_name"]) && !empty($datos["fotoProfesor"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($datos["fotoProfesor"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if ($datos["fotoProfesor"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "../vistas/img/profesor/profesor1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotoProfesor"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($datos["fotoProfesor"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "../vistas/img/profesor/profesor1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["fotoProfesor"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                /**===================================
                 * SE PREGUNTA SI VIENE EL NOMBRE EN CAMINO
                 ===================================**/

                $datosProfesor = array(
                    "fotoP" => substr($ruta, 3),
                    "nombreP" => $datos["regProfesor"],
                    "apellidoPaternoP" => $datos["regApellidoPP"],
                    "apellidoMaternoP" => $datos["regApellidoMP"],
                    "estado" => 0,
                    "password" => $encriptar,
                    "perfil_p" => "profesor",
                    "emailP" => $datos["regEmailP"]
                );
                #Comprobación si son recibidos los datos.
                // return $datosProfesor;
                $respuesta = ModeloProfesores::mdlIngresarProfesor("profesor", $datosProfesor);

                return $respuesta;
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío no debe llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * EDITAR DATOS DE PROFESOR
     ===================================**/
    static public function ctrEditarProfesor($datos)
    {
        if (isset($datos["idProfesor"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["regProfesorEdit"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoPPEdit"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoMPEdit"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailPEdit"])
            ) {
                /*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $rutaImagen = "../" . $datos["antiguaFotoProfesor"];

                if (isset($datos["fotoProfesorEdit"]["tmp_name"]) && !empty($datos["fotoProfesorEdit"]["tmp_name"])) {
                    /*=============================================
					BORRAMOS ANTIGUA FOTO PROFESOR
					=============================================*/
                    unlink("../" . $datos["antiguaFotoProfesor"]);
                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
                    list($ancho, $alto) = getimagesize($datos["fotoProfesorEdit"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if ($datos["fotoProfesorEdit"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $rutaImagen = "../vistas/img/profesor/profesor1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotoProfesorEdit"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaImagen);
                    }

                    if ($datos["fotoProfesorEdit"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $rutaImagen = "../vistas/img/profesor/profesor1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["fotoProfesorEdit"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $rutaImagen);
                    }
                }
                /**===================================
                 * PASSWORD
                 ===================================**/
                if ($_POST["regPasswordPE"] != "") {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordPE"])) {

                        $encriptar = crypt($_POST["regPasswordPE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {

                        echo '<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "profesor";

										}
									})
						  	</script>';
                    }
                } else {
                    $encriptar = $_POST["passwordActualP"];
                }
                /**===================================
                 * SE PREGUNTA SI VIENE EL NOMBRE EN CAMINO
                 ===================================**/

                $datosProfesor = array(
                    "id" => $datos["idProfesor"],
                    "fotoPEdit" => substr($rutaImagen, 3),
                    "nombrePEdit" => $datos["regProfesorEdit"],
                    "apellidoPaternoPEdit" => $datos["regApellidoPPEdit"],
                    "apellidoMaternoPEdit" => $datos["regApellidoMPEdit"],
                    "regPasswordPE" => $encriptar,
                    "perfil_p" => "profesor",
                    "emailPEdit" => $datos["regEmailPEdit"]
                );
                #Comprobación si son recibidos los datos.
                // return $datosProfesor;
                $respuesta = ModeloProfesores::mdlEditarProfesor("profesor", $datosProfesor);

                return $respuesta;
            } else {
                echo '<script>

					swal({
						  type: "error",
						  title: "¡Los campos obligatorios deben llenarse sin caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "profesor";

							}
						})

			  	</script>';
            }
        }
    }
    /**===================================
     * ELIMINAR PROFESOR
     ===================================**/
    static public function ctrEliminarProfesor()
    {

        if (isset($_GET["idProfesor"])) {
            $datos = $_GET["idProfesor"];
            /*===========================
			ELIMINAR FOTO
			============================*/
            if ($_GET["fotoProfesor"] != "" && $_GET["fotoProfesor"] != "vistas/img/profesor/default/anonymous.png") {

                unlink($_GET["fotoProfesor"]);
            }
            $respuesta = ModeloAlumno::mdlEliminarAlumno("profesor", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El profesor ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "profesor";

								}
							})

				</script>';
            }
        }
    }
    /**===================================
     * INGRESAR ALUMNO
     ===================================**/
    public function ctrIngresoProfesor()
    {

        if (isset($_POST["ingEmailP"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmailP"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasswordP"])
            ) {

                $encriptar = crypt($_POST["ingPasswordP"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "profesor";
                $item = "email_ma";
                $valor = $_POST["ingEmailP"];

                $respuesta = ModeloProfesores::mdlMostrarProfesorH($tabla, $item, $valor);

                // print_r($respuesta);
                if ($respuesta["email_ma"] == $_POST["ingEmailP"] && $respuesta["password"] == $encriptar) {

                    if ($respuesta["estado"] == 1 && $respuesta["perfil_p"] == "profesor") {

                        $_SESSION["validarSesionBackend"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre_ma"] = $respuesta["nombre_ma"];
                        $_SESSION["apPaterno_ma"] = $respuesta["apPaterno_ma"];
                        $_SESSION["apMaterno_ma"] = $respuesta["apMaterno_ma"];
                        $_SESSION["cedula"] = $respuesta["cedula"];
                        $_SESSION["foto_ma"] = $respuesta["foto_ma"];
                        $_SESSION["email_ma"] = $respuesta["email_ma"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["perfil_p"] = $respuesta["perfil_p"];
                        # La variable get inicio se establece en el .htaccess.
                        echo '<script>

						window.location = "perfilmaestro";

					</script>';
                    } else {
                        echo '<script>
                                swal({
                                    type: "error",
                                    title: "¡El profesor no está activo!",
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
                                    icon: "success",
                                    title: "¡Correo o password incorrectos!",
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
}