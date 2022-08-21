<?php
class ControladorMateria
{
    /**===================================
     * MOSTRAR MATERIA 
    ===================================**/
    static public function ctrMostrarMateria($item, $valor)
    {
        $tabla = "materia";
        $respuesta = ModeloMateria::mdlMostrarMateria($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA ORDENADO POR NOMBRE
    ===================================**/
    static public function ctrMostrarMateriaOrden($item, $valor)
    {
        $tabla = "materia";
        $respuesta = ModeloMateria::mdlMostrarMateriaOrden($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA POR SEMESTRE 
    ===================================**/
    static public function ctrMostrarSemestreM($item, $valor)
    {
        $tabla = "detalle_semestre";
        $respuesta = ModeloMateria::mdlMostrarSemestreM($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA HORARIOS
    ===================================**/
    static public function ctrMostrarMateriaHor($item, $valor)
    {
        $tabla = "materia";
        $respuesta = ModeloMateria::mdlMostrarMateriaHor($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA HORARIOS
    ===================================**/
    static public function ctrMostrarMateriaHorSem($item1, $valor1)
    {
        $tabla = "materia";
        $respuesta = ModeloMateria::mdlMostrarMateriaHorSem($tabla, $item1, $valor1);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA HORARIOS ALUMNO
    ===================================**/
    static public function ctrMostrarMateriaHorSemA($item1, $valor1)
    {
        $tabla = "materia";
        $respuesta = ModeloMateria::mdlMostrarMateriaHorSemA($tabla, $item1, $valor1);

        return $respuesta;
    }
    /**===================================
     * GUARDAR DATOS MATERIA
     ===================================**/
    public function ctrCrearMateria()
    {
        if (isset($_POST["regClave"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regClave"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regMat"])
            ) {
                $datos = array(
                    "regClave" => $_POST["regClave"],
                    "semestre" => $_POST["seleccionarCategoria"],
                    "estado" => 1,
                    "regMat" => $_POST["regMat"]
                );
                #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));
                // return $datos;
                $tabla = "materia";
                $respuesta = ModeloMateria::mdlIngresarMateria($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La materia ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gestormat";

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
     * EDITAR DATOS MATERIA
     ===================================**/
    public function ctrCrearEditarMateria()
    {
        if (isset($_POST["regClaveE"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regClaveE"]) &&
                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regMatE"])
            ) {
                $datos = array(
                    "id" => $_POST["idMateria"],
                    "regClaveE" => $_POST["regClaveE"],
                    "estado" => 1,
                    "regMatE" => $_POST["regMatE"],
                    "semestreE" => $_POST["seleccionarCategoriaE"]
                );
                #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));
                // return $datos;
                $tabla = "materia";
                $respuesta = ModeloMateria::mdlEditarMateria($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "La materia ha sido modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gestormat";

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
     * ELIMINAR AULA
     ===================================**/
    static public function ctrEliminarMateria()
    {

        if (isset($_GET["idMateria"])) {
            $datos = $_GET["idMateria"];

            $respuesta = ModeloAula::mdlEliminarAula("materia", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "La materia ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "gestormat";

								}
							})

				</script>';
            }
        }
    }
}