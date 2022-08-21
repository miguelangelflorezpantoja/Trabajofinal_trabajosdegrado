<?php

class ControladorCalificacion
{
    /**===================================
     * INGRESAR CALIFICACIÓN
     ===================================**/
    static public function ctrIngresarCali($data)
    {
        // $data = json_decode($_POST["data"]);
        // var_dump($data);
        session_start();
        $valor = $_SESSION["id"];

        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlIgresarCalificacion($tabla, $data, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CALIFICACION VALIDACIÓN
     ===================================**/
    static public function ctrMostrarCalificacion($item, $valor)
    {
        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlMostrarCalificacion($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CALIFICACIÓN
     ===================================**/
    static public function ctrMostrarCalificacionAl($valor2)
    {
        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlMostrarCalificacionAl($tabla, $valor2);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CALIFICACIÓN
     ===================================**/
    static public function ctrMostrarCalificacionAlD($valor2)
    {
        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlMostrarCalificacionAlD($tabla, $valor2);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CALIFICACIóN
     ===================================**/
    static public function ctrMostrarCalificacionPerAL($valor)
    {
        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlMostrarCalificacionPerAL($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CALIFICACIóN EDICIÓN
     ===================================**/
    static public function ctrMostraCalificacionesE($item, $valor)
    {
        $tabla = "calificacion";

        $respuesta = ModeloCalificacion::mdlMostrarCalificacionesE($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * GUARDAR CALIFICACIONES
     ===================================**/
    public function ctrEditarCalificacion()
    {
        if (isset($_POST["idCalificacion"])) {
            if (
                preg_match('/^[\d*\.?\d]+$/', $_POST["primeraEval"])
            ) {
                $datos = array(
                    "id" => $_POST["idCalificacion"],
                    "primEval" => $_POST["primeraEval"]
                );
                $tabla = "calificacion";
                $respuesta = ModeloCalificacion::mdlEditarCalificacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La calificación del alumno ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "calificacion";

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
     * EDITAR CALIFICACIONES
     ===================================**/
    public function ctrEditarCalificacionAd()
    {
        if (isset($_POST["idCalificacion"])) {
            if (
                preg_match('/^[\d*\.?\d]+$/', $_POST["primeraEval"])
            ) {
                $datos = array(
                    "id" => $_POST["idCalificacion"],
                    "primEval" => $_POST["primeraEval"]
                );
                $tabla = "calificacion";
                $respuesta = ModeloCalificacion::mdlEditarCalificacion($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La nota del alumno ha sido modificado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "calificacionalumno";

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
     * ELIMINAR CALIFICCAIONES
     ===================================**/
    static public function ctrEliminarCalificacionAd()
    {

        if (isset($_GET["ideditCal"])) {
            $datos = $_GET["ideditCal"];

            $respuesta = ModeloCalificacion::mdlEliminarCalificacion("calificacion", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "Las calificaciones han sido eliminadas correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "calificacionalumno";

								}
							})

				</script>';
            }
        }
    }
}