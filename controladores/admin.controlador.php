<?php
class ControladorAdmin
{
    /**===================================
     * MOSTRAR ADMINISTRADORES
    ===================================**/
    static public function ctrMostrarAdmin($item, $valor)
    {
        $tabla = "administradores";
        $respuesta = ModeloAdmin::mdlMostrarAdmin($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * GUARDAR DATOS DE ADMINISTRADOR
     ===================================**/
    public function ctrCrearAdmin()
    {
        if (isset($_POST["regAdmin"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regAdmin"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regPerfilAd"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailAd"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordAd"])
            ) {
                $encriptar = crypt($_POST["regPasswordAd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                /*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $ruta = "vistas/img/admin/default/anonymous.png";

                if (isset($_FILES["fotoAdmin"]["tmp_name"]) && !empty($_FILES["fotoAdmin"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["fotoAdmin"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if ($_FILES["fotoAdmin"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/admin/admin1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["fotoAdmin"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["fotoAdmin"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/admin/admin1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["fotoAdmin"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        // magealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }
                /**===================================
                 * SE PREGUNTA SI VIENE EL NOMBRE EN CAMINO
                 ===================================**/

                $datos = array(
                    "fotoAdmin" => $ruta,
                    "regAdmin" => $_POST["regAdmin"],
                    "regEmailAd" => $_POST["regEmailAd"],
                    "estado" => 1,
                    "password" => $encriptar,
                    "regPerfilAd" => $_POST["regPerfilAd"]

                );
                #Comprobación si son recibidos los datos.
                // return $datos;
                $tabla = "administradores";
                $respuesta = ModeloAdmin::mdlIngresarAdmin($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El administrador ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "administrador";

							}
						})

					</script>';
                }
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡Los datos obligatorios no pueden ir vacíos, no debe llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * EDITAR DATOS DE ADMINISTRADOR
     ===================================**/
    public function ctrEditarAdmin()
    {
        if (isset($_POST["regAdminE"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regAdminE"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regAdminE"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailAdE"])
            ) {
                /*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $ruta = $_POST["antiguaFotoAdmin"];

                if (isset($_FILES["fotoAdminE"]["tmp_name"]) && !empty($_FILES["fotoAdminE"]["tmp_name"])) {

                    /*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/
                    unlink($_POST["antiguaFotoAdmin"]);
                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
                    list($ancho, $alto) = getimagesize($_FILES["fotoAdminE"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if ($_FILES["fotoAdminE"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/admin/admin1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["fotoAdminE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["fotoAdminE"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/admin/admin1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["fotoAdminE"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        // magealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                }

                $tabla = "administradores";

                if ($_POST["regPasswordE"] != "") {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordE"])) {

                        $encriptar = crypt($_POST["regPasswordE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {

                        echo '<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "Perfiles";

										}
									})
						  	</script>';
                    }
                } else {
                    $encriptar = $_POST["passwordActual"];
                }

                /**===================================
                 * SE PREGUNTA SI VIENE EL NOMBRE EN CAMINO
                 ===================================**/

                $datos = array(
                    "id" => $_POST["idAdmin"],
                    "fotoAdminE" => $ruta,
                    "regAdminE" => $_POST["regAdminE"],
                    "regEmailAdE" => $_POST["regEmailAdE"],
                    "estado" => 1,
                    "regPasswordE" => $encriptar,
                    "regPerfilAdE" => $_POST["regPerfilAdE"]

                );
                #Comprobación si son recibidos los datos.
                // return $datos;
                $respuesta = ModeloAdmin::mdlEditarAdmin($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Los datos del administrador han sido modificados correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "administrador";

							}
						})

					</script>';
                }
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡Los datos obligatorios no pueden ir vacíos, no debe llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * ELIMINAR ADMINISTRADOR
     ===================================**/
    static public function ctrEliminarAdmin()
    {

        if (isset($_GET["idAdmin"])) {
            $datos = $_GET["idAdmin"];
            /*===========================
			ELIMINAR FOTO
			============================*/
            if ($_GET["fotoAdmin"] != "" && $_GET["fotoAdmin"] != "vistas/img/admin/default/anonymous.png") {

                unlink($_GET["fotoAdmin"]);
            }
            $respuesta = ModeloAdmin::mdlEliminarAdmin("administradores", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El administrador ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "administrador";

								}
							})

				</script>';
            }
        }
    }
}