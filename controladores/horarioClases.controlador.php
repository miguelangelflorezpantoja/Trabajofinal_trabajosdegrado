<?php
class ControladorHorarioC
{
    /**===================================
     * MOSTRAR HORARIO DE CLASES
    ===================================**/
    static public function ctrMostrarHorarioC($item, $valor)
    {
        $tabla = "horario_p";
        $respuesta = ModeloHorarioC::mdlMostrarHorarioC($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR HORARIO DE CLASES VALIDACIÓN
    ===================================**/
    static public function ctrMostrarClasesMG($item, $item1, $valor, $valor1)
    {
        $tabla = "horario_p";
        $respuesta = ModeloHorarioC::mdlMostrarClasesMG($tabla, $item, $item1, $valor, $valor1);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CLASE PARA ALUMNO
    ===================================**/
    static public function ctrMostrarClaseC($item, $valor)
    {
        $tabla = "horario_p";
        $respuesta = ModeloHorarioC::mdlMostrarHorarioA($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR DATOS PARA PROFESOR
    ===================================**/
    static public function ctrMostrarClaseDP($valor)
    {
        $tabla = "horario_p";
        $respuesta = ModeloHorarioC::mdlMostrarHorarioDP($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR MATERIA PARA CLASES 
    ===================================**/
    static public function ctrMostrarMateriaC($item, $valor)
    {
        $tabla = "materia";
        $respuesta = ModeloHorarioC::mdlMostrarMateriaC($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR CLASES PARA HORARIO ALUMNOS 
    ===================================**/
    static public function ctrMostrarClaseCA($item, $valor)
    {
        $tabla = "horario_p";
        $respuesta = ModeloHorarioC::mdlMostrarClaseCA($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * GUARDAR DATOS MATERIA
     ===================================**/
    public function ctrCrearClase()
    {
        if (isset($_POST["seleccionarMateria"])) {

            if (
                $_POST["seleccionarMateria"] &&
                $_POST["selecProfesor"]
            ) {
                $datos = array(
                    "seleccionarMateria" => $_POST["seleccionarMateria"],
                    "selecProfesor" => $_POST["selecProfesor"],
                    "estado" => 1
                );
                #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));

                // return $datos;


                $tabla = "horario_p";
                $respuesta = ModeloHorarioC::mdlIngresarHorarioC($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El horario de la clase ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "horarioClases";

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
    public function ctrEditarClase()
    {
        if (isset($_POST["seleccionarMateriaE"])) {

            if (
                $_POST["seleccionarMateriaE"]
            ) {
                $datos = array(
                    "id" => $_POST["idHorarioC"],
                    "seleccionarMateriaE" => $_POST["seleccionarMateriaE"],
                    "selecProfesorE" => $_POST["selecProfesorE"],
                    "estado" => 1
                );
                #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));
                // return $datos;
                $tabla = "horario_p";
                $respuesta = ModeloHorarioC::mdlEditarHorarioC($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El horario de la clase ha sido modificada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "horarioClases";

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
     * ELIMINAR HORARIO DE LA CLASE
     ===================================**/
    static public function ctrEliminarClase()
    {

        if (isset($_GET["idHorarioC"])) {
            $datos = $_GET["idHorarioC"];

            $respuesta = ModeloHorarioC::mdlEliminarHoarioC("horario_p", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El horario de la clase ha sido eliminada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "horarioClases";

								}
							})

				</script>';
            }
        }
    }
    /**===================================
     * GUARDAR HORARIO ALUMNOS
     ===================================**/
    public function ctrCrearClaseAl()
    {
        if (
            isset($_POST["idHorarioCA"]) &&
            isset($_POST["selecAlumnoC"])
        ) {
            if (
                $_POST["seleccionarMAlumno"] &&
                $_POST["selecPA"] &&
                $_POST["selecAlumnoC"]
            ) {
                $datos = array(
                    "seleccionarMAlumno" => $_POST["seleccionarMAlumno"],
                    "selecPA" => $_POST["selecPA"],
                    "estado" => 1,
                    "selecAlumnoC" => $_POST["selecAlumnoC"]
                );
                #Comprobación si son recibidos los datos.
                // var_dump($datos, json_encode($datos));
                // return $datos;
                ModeloCalificacion::mdlIgresarCalificacion("calificacion", $datos);
                $tabla = "horario_al";
                $respuesta = ModeloHorarioC::mdlIngresarHorarioCA($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>

					swal({
						  type: "success",
						  title: "El horario del alumno ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "horarioClases";

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
     * ELIMINAR HORARIO DEL ALUMNO
     ===================================**/
    static public function ctrEliminarClaseA()
    {

        if (isset($_GET["idHorarioA"])) {
            $datos = $_GET["idHorarioA"];

            $respuesta = ModeloHorarioC::mdlEliminarHorarioA("horario_al", $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El horario del alumno ha sido eliminado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "horarioAlumno";

								}
							})

				</script>';
            }
        }
    }
}