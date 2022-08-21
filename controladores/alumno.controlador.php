<?php
error_reporting();

class ControladorAlumno
{

    /**===================================
     *SELECCIONAR LA PLANTILLA
     ===================================**/
    #Cuando se coloca la palabra reservada static es para ejecutar el método que se está llamando 
    # en en otro archivo, también se hace para evitar errores en los diferente servidores. Cuando
    #no se utiliza es cuadno se instancia en ese archivo, es decir, se antepine el new.
    static public function ctrMostrarAlumno($item, $valor)
    {
        $tabla = "alumno";

        $respuesta = ModeloAlumno::mdlMostrarAlumno($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO DOCUMENTOS
     ===================================**/
    static public function ctrMostrarAlumnoDoc($valor)
    {
        $tabla = "documentacion";

        $respuesta = ModeloAlumno::mdlMostrarAlumnoDoc($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO COMPLETAR REGISTRO
     ===================================**/
    static public function ctrMostrarAlumnosEdit($valor)
    {
        $tabla = "alumno";

        $respuesta = ModeloAlumno::mdlMostrarAlumnosEdit($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR PAGOS
     ===================================**/
    static public function ctrMostrarPagos($valor)
    {
        $tabla = "pago";

        $respuesta = ModeloAlumno::mdlMostrarPagos($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CONCEPTOS DE PAGOS
     ===================================**/
    static public function ctrMostrarPagosAlumno($item, $valor)
    {
        $tabla = "concepto_pago";

        $respuesta = ModeloAlumno::mdlMostrarPagosAlumno($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO DOCUMENTOS ADMINISTRADOR
     ===================================**/
    static public function ctrMostrarAlumnoDocT($item, $valor)
    {
        $tabla = "documentacion";

        $respuesta = ModeloAlumno::mdlMostrarAlumnoDocT($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO DOCUMENTOS VALIDACION
     ===================================**/

    static public function ctrMostrarAlumnoDocAlumno($item, $valor)
    {
        $tabla = "documentacion";

        $respuesta = ModeloAlumno::mdlMostrarAlumnoDocAlumno($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO DOCUMENTOS EDICION
     ===================================**/

    static public function ctrMostrarAlumnoDocE($item, $valor)
    {
        $tabla = "documentacion";

        $respuesta = ModeloAlumno::mdlMostrarAlumnoDocE($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO INGRESAR CALIFICACIONES
     ===================================**/

    static public function ctrMostrarCalifAl($item, $valor)
    {
        $tabla = "horario_al";

        $respuesta = ModeloAlumno::mdlMostrarCalifAl($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTAR ALUMNO PARA CLASES
     ===================================**/
    static public function ctrMostrarAlumnoC($item, $valor)
    {
        $tabla = "alumno";

        $respuesta = ModeloAlumno::mdlMostrarAlumnoC($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR GÉNERO
     ===================================**/
    static public function ctrMostrarIdentidad($item, $valor)
    {

        $tabla = "genero";
        $respuesta = ModeloAlumno::mdlMostrarIdentidad($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR PAGOS
     ===================================**/
    static public function ctrMostrarPagosPDF($item, $valor)
    {

        $tabla = "pago";
        $respuesta = ModeloAlumno::mdlMostrarPgosPDF($tabla, $item, $valor);

        return $respuesta;
    }

    /**===================================
     * GUARDAR DATOS DE ALUMNO REGISTRO
     ===================================**/
    public function ctrRegistroAlumno()
    {
        if (isset($_POST["regAlumno"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regAlumno"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoP"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoM"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailA"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])
            ) {
                $encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $ruta = "";

                if (isset($_FILES["fotoAlumno"]["tmp_name"]) && !empty($_FILES["fotoAlumno"]["tmp_name"])) {

                    list($ancho, $alto) = getimagesize($_FILES["fotoAlumno"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;
                    /*=============================================
    				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
    				=============================================*/
                    if ($_FILES["fotoAlumno"]["type"] == "image/jpeg") {
                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $ruta = "vistas/img/alumno/alumno1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($_FILES["fotoAlumno"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($_FILES["fotoAlumno"]["type"] == "image/png") {

                        /*=============================================
    					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
    					=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $ruta = "vistas/img/alumno/alumno1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($_FILES["fotoAlumno"]["tmp_name"]);
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

                $datosRegistro = array(
                    "nombreAl" => $_POST["regAlumno"],
                    "apellidoPaternoAl" => $_POST["regApellidoP"],
                    "apellidoMaternoAl" => $_POST["regApellidoM"],
                    "password" => $encriptar,
                    "fotoalumno" => $ruta,
                    "perfil_al" => "alumno",
                    "estado" => 0,
                    "emailAl" => $_POST["regEmailA"]
                );
                #Comprobación si son recibidos los datos.
                // return $datosRegistro;
                $tabla = "alumno";
                $respuesta = ModeloAlumno::mdlRegistrarAlumno($tabla, $datosRegistro);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "Los datos alumno se gurdaron correctamente",
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
						  title: "¡Los datos no pueden ir vacíos!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * EDITAR ALUMNO
     ===================================**/
    static public function ctrEditarAlumno($datos)
    {

        if (isset($datos["idAlumno"])) {
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $datos["regAlumnoEdit"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoPEdit"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regApellidoMEdit"])
            ) {
                /*=============================================
				VALIDAR IMAGEN
				=============================================*/
                $rutaImagen = "../" . $datos["antiguaFotoAlumno"];

                if (isset($datos["fotoAlumnoEdit"]["tmp_name"]) && !empty($datos["fotoAlumnoEdit"]["tmp_name"])) {
                    /*=============================================
					BORRAMOS ANTIGUA FOTO ALUMNNO
					=============================================*/

                    unlink("../" . $datos["antiguaFotoAlumno"]);

                    /*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/
                    list($ancho, $alto) = getimagesize($datos["fotoAlumnoEdit"]["tmp_name"]);

                    $nuevoAncho = 500;
                    $nuevoAlto = 500;

                    /*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
                    if ($datos["fotoAlumnoEdit"]["type"] == "image/jpeg") {
                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

                        $rutaImagen = "../vistas/img/alumno/alumno1/" . $aleatorio . ".jpg";
                        $origen = imagecreatefromjpeg($datos["fotoAlumnoEdit"]["tmp_name"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $rutaImagen);
                    }

                    if ($datos["fotoAlumnoEdit"]["type"] == "image/png") {

                        /*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

                        $aleatorio = mt_rand(100, 999);
                        $rutaImagen = "../vistas/img/alumno/alumno1/" . $aleatorio . ".png";
                        $origen = imagecreatefrompng($datos["fotoAlumnoEdit"]["tmp_name"]);
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
                if ($_POST["regPasswordAE"] != "") {

                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordAE"])) {

                        $encriptar = crypt($_POST["regPasswordAE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {

                        echo '<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "alumno";

										}
									})
						  	</script>';
                    }
                } else {
                    $encriptar = $_POST["passwordActualA"];
                }


                /**===================================
                 * SE PREGUNTA SI VIENE EL NOMBRE EN CAMINO
                 ===================================**/

                $datosAlumno = array(
                    "id" => $datos["idAlumno"],
                    "matriculaEdit" => $datos["numeroMatriculaEdit"],
                    "fotoAlEdit" => substr($rutaImagen, 3),
                    "nombreAlEdit" => $datos["regAlumnoEdit"],
                    "apellidoPaternoAlEdit" => $datos["regApellidoPEdit"],
                    "apellidoMaternoAlEdit" => $datos["regApellidoMEdit"],
                    "regPasswordAE" => $encriptar,
                    "emailAlEdit" => $datos["regEmailAEdit"]
                );
                // Comprobando los datos en la siguiente ínea
                // return $datosAlumno;
                $respuesta = ModeloAlumno::mdlEditarAlumno("alumno", $datosAlumno);
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

							window.location = "mostraralumno";

							}
						})

			  	</script>';
            }
        }
    }

    /**===================================
     * ELIMINAR ALUMNO
     ===================================**/
    public function ctrEliminarAlumno()
    {

        if (isset($_GET["idAlumno"])) {
            $datos = $_GET["idAlumno"];
            /*===========================
			ELIMINAR FOTO
			============================*/
            if ($_GET["fotoAlumno"] != "" && $_GET["fotoAlumno"] != "vistas/img/alumno/default/anonymous.png") {

                unlink($_GET["fotoAlumno"]);
            }
            $respuesta = ModeloAlumno::mdlEliminarAlumno("alumno", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El alumno ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "mostraralumno";

								}
							})

				</script>';
            }
        }
    }
    /**===================================
     * INGRESAR ALUMNO
     ===================================**/
    public function ctrIngresoAlumno()
    {

        if (isset($_POST["ingEmailA"])) {

            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmailA"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPasswordA"])
            ) {

                $encriptar = crypt($_POST["ingPasswordA"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "alumno";
                $item = "email_al";
                $valor = $_POST["ingEmailA"];

                $respuesta = ModeloAlumno::mdlMostrarAlumnoC($tabla, $item, $valor);

                // print_r($respuesta);
                if ($respuesta["email_al"] == $_POST["ingEmailA"] && $respuesta["password"] == $encriptar) {

                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre_al"] = $respuesta["nombre_al"];
                    $_SESSION["apellidoPaterno_al"] = $respuesta["apellidoPaterno_al"];
                    $_SESSION["apellidoMaterno_al"] = $respuesta["apellidoMaterno_al"];
                    $_SESSION["foto_al"] = $respuesta["foto_al"];
                    $_SESSION["email_al"] = $respuesta["email_al"];
                    $_SESSION["password"] = $respuesta["password"];
                    $_SESSION["perfil_al"] = $respuesta["perfil_al"];
                    # La variable get inicio se establece en el .htaccess.
                    echo '<script>

						window.location = "perfilalumno";

					</script>';
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
    /**===================================
     * SUBIR DOCUMENTOS PDF
     ===================================**/
    public function ctrIngresoDocumentosAlumno()
    {
        if (isset($_POST["idAlumnoDatos"])) {


            if (isset($_FILES["archivo"]["tmp_name"]) && !empty($_FILES["archivo"]["tmp_name"])) {
                /**===================================
                 * VALIDAR ARCHIVO PDF
                ===================================**/
                $ruta = "vistas/pdf/";
                if ($_FILES["archivo"]["type"] == "application/pdf") {
                    /**===================================
                     * GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                     ===================================**/
                    $aleatorio = mt_rand(100, 999);

                    $ruta =  "vistas/pdf/" . $aleatorio . ".pdf";
                    // $ficheroSubir = $ruta . basename($_FILES['archivo']['name']);
                    move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
                }

                $datos = array(
                    "idAalumnoD" => $_POST["idAlumnoDatos"],
                    "documentos" => $ruta,
                    "estado" => 0
                );
                // var_dump($datos, json_encode($datos));
                // return $datos;
                $tabla = "documentacion";
                $respuesta = ModeloAlumno::mdlIngresoDocumentosAlumno($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El archivo se guardó correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "perfilalumno";

							}
						})

					</script>';
                }
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡El campo del archivo está vacío!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * EDITAR DOCUMENTOS
     ===================================**/

    public function ctrEditarDocumento()
    {
        if (isset($_POST["idDocument"])) {

            if (isset($_POST["idAlumnoDoc"])) {

                $rutapdf = $_POST["datosAlumnoAntiguo"];
                if (isset($_FILES["archivoEdit"]["tmp_name"]) && !empty($_FILES["archivoEdit"]["tmp_name"])) {
                    /**===================================
                     * SE ELIMINA EL LINK ANTIGUO DEL PDF
                     ===================================**/
                    if (!empty($_POST["datosAlumnoAntiguo"])) {

                        unlink($_POST["datosAlumnoAntiguo"]);
                    }

                    if ($_FILES["archivoEdit"]["type"] == "application/pdf") {
                        /**===================================
                         * GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                     ===================================**/
                        $aleatorio = mt_rand(100, 999);

                        $rutapdf =  "vistas/pdf/" . $aleatorio . ".pdf";
                        #Coloca la siguiente línea recomendada en el sitio de php no ejecutaba el cambio de archivo,
                        # el erro que muestra No such file directory.
                        // $ficheroSubir = $rutapdf . basename($_FILES['archivoEdit']['name']);
                        move_uploaded_file($_FILES["archivoEdit"]["tmp_name"], $rutapdf);
                    }

                    $datos = array(
                        "id" => $_POST["idDocument"],
                        "idAalumnoDoc" => $_POST["idAlumnoDoc"],
                        "documentos" => $rutapdf,
                        "estado" => 0
                    );
                    // var_dump($datos, json_encode($datos));
                    // return $datos;
                    $tabla = "documentacion";
                    $respuesta = ModeloAlumno::mdlEditDocumentosAlumno($tabla, $datos);

                    if ($respuesta == "ok") {

                        echo '<script>

					swal({
						  type: "success",
						  title: "El archivo se cambió correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "perfilalumno";

							}
						})

					</script>';
                    }
                    # code...
                }
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡El campo del archivo está vacío!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * ELIMINAR PDF
     ===================================**/
    public function ctrEliminarPDF()
    {
        if (isset($_GET["idDocument"])) {
            $datos = $_GET["idDocument"];
            /*===========================
			ELIMINAR FOTO
			============================*/
            if ($_GET["docpdf"] != "") {

                unlink($_GET["docpdf"]);
            }
            // var_dump($datos, json_encode($datos));
            // return $datos;
            $respuesta = ModeloAlumno::mdlEliminarDocPDF("documentacion", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Tus documentos han sido eliminados correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "perfilalumno";

								}
							})

				</script>';
            }
        }
    }
    /**===================================
     * EDITAR DOCUMENTOS PARA ADMINISTRADOR
     ===================================**/
    public function ctrEditarDocumentoA()
    {
        if (isset($_POST["idDocument"])) {

            if (isset($_POST["idAlumnoDoc"])) {

                $rutapdf = $_POST["datosAlumnoAntiguo"];
                if (isset($_FILES["archivoEdit"]["tmp_name"]) && !empty($_FILES["archivoEdit"]["tmp_name"])) {
                    /**===================================
                     * SE ELIMINA EL LINK ANTIGUO DEL PDF
                     ===================================**/
                    if (!empty($_POST["datosAlumnoAntiguo"])) {

                        unlink($_POST["datosAlumnoAntiguo"]);
                    }

                    if ($_FILES["archivoEdit"]["type"] == "application/pdf") {
                        /**===================================
                         * GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                     ===================================**/
                        $aleatorio = mt_rand(100, 999);

                        $rutapdf =  "vistas/pdf/" . $aleatorio . ".pdf";
                        #Coloca la siguiente línea recomendada en el sitio de php no ejecutaba el cambio de archivo,
                        # el erro que muestra No such file directory.
                        // $ficheroSubir = $rutapdf . basename($_FILES['archivoEdit']['name']);
                        move_uploaded_file($_FILES["archivoEdit"]["tmp_name"], $rutapdf);
                    }

                    $datos = array(
                        "id" => $_POST["idDocument"],
                        "idAalumnoDoc" => $_POST["idAlumnoDoc"],
                        "documentos" => $rutapdf,
                        "estado" => 0
                    );
                    // var_dump($datos, json_encode($datos));
                    // return $datos;
                    $tabla = "documentacion";
                    $respuesta = ModeloAlumno::mdlEditDocumentosAlumno($tabla, $datos);

                    if ($respuesta == "ok") {

                        echo '<script>

					swal({
						  type: "success",
						  title: "El archivo se cambió correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "documentos";

							}
						})

					</script>';
                    }
                    # code...
                }
            } else {
                echo '<script>
					swal({
						  type: "error",
						  title: "¡El campo del archivo está vacío!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })
			  	</script>';
            }
        }
    }
    /**===================================
     * ELIMINAR PDF PARA ADMINISTRADOR
     ===================================**/
    public function ctrEliminarPDFAd()
    {
        if (isset($_GET["idDocument"])) {
            $datos = $_GET["idDocument"];
            /*===========================
			ELIMINAR FOTO
			============================*/
            if ($_GET["docpdf"] != "") {

                unlink($_GET["docpdf"]);
            }
            // var_dump($datos, json_encode($datos));
            // return $datos;
            $respuesta = ModeloAlumno::mdlEliminarDocPDF("documentacion", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El documento ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "documentos";

								}
							})

				</script>';
            }
        }
    }
    /**===================================
     * GUARDAR DATOS DE PAGOS
     ===================================**/
    static public function ctrIngresarPagos()
    {
        if (isset($_POST["idAlumno"])) {
            if ($_POST["nuevoTotalConcepto"] != 0 || $_POST["nuevoTotalConcepto"] != null) {
                // $listaProductos = json_decode($_POST["listaConceptos"], true);
                // var_dump($listaProductos);

                $datos = array(
                    "idAlumno" => $_POST["idAlumno"],
                    "seleccionarCategoria" => $_POST["seleccionarCategoria"],
                    "pago" => $_POST["listaConceptos"],
                    "totalPago" => $_POST["nuevoTotalConcepto"]
                );
                // #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));
                // var_dump($datos);
                // return $datos;
                $tabla = "pago";
                $respuesta = ModeloAlumno::mdlIngresarPago($tabla, $datos);
                // // var_dump($respuesta, json_encode($respuesta));
                // // return $respuesta;
                if ($respuesta == "ok") {

                    echo '<script>

            		swal({
            			  type: "success",
            			  title: "Los datos de pago se han guardado correctamente",
            			  showConfirmButton: true,
            			  confirmButtonText: "Cerrar"
            			  }).then(function(result){
            				if (result.value) {

            				window.location = "pagos";

            				}
            			})

            		</script>';
                }
            } else {
                '<script>
                    swal({
                        type: "error",
                        title: "¡Error, el total pago no tiene información!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {

                            window.location = "pagos";

                            }
                        })
                </script>';
            }
        }
    }
}