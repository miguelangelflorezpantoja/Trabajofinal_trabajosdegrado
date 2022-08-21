<?php
require_once "../controladores/calificacion.controlador.php";
require_once "../modelos/calificacion.modelo.php";

require_once "../controladores/alumno.controlador.php";
require_once "../modelos/alumno.modelo.php";

require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";

class TablaCalificacionesAlumno
{
    public function mostrarTablaAlumnosCal()
    {
        /**===================================
         * MOSTRAR TABLA DE CALIFICACIONES
         ===================================**/
        $item = null;
        $valor = null;
        $mostrarC = ControladorCalificacion::ctrMostraCalificacionesE($item, $valor);
        // echo json_encode($mostrarC);
        // return;
        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($mostrarC); $i++) {
            /**===================================
             * TRAER MATERIA
             ===================================**/
            $item = "id";
            $valor = $mostrarC[$i]["id_materia"];
            $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
            // var_dump($materia);
            $detalleM = $materia["nombre_materia"];
            /**===================================
             * TRAER ALUMNO
             ===================================**/
            $item = "id";
            $valor = $mostrarC[$i]["id_alumno"];
            $alumno = ControladorAlumno::ctrMostrarAlumnoC($item, $valor);
            // var_dump($alumno);
            $detalleA = $alumno["nombre_al"] . " " . $alumno["apellidoPaterno_al"] . " " . $alumno["apellidoMaterno_al"];
            /**===================================
             * TRAER PROFESOR
             ===================================**/
            $item = "id";
            $valor = $mostrarC[$i]["id_profesor"];
            $profesor = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
            // var_dump($profesor);
            $detalleP = $profesor["nombre_ma"] . " " . $profesor["apPaterno_ma"] . " " . $profesor["apMaterno_ma"];
            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-primary btnEditarCalAd' ideditCal='" . $mostrarC[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarCalAd'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarCal' ideditCal='" . $mostrarC[$i]["id"] . "'><i class='fa fa-times'></i></button></div>";

            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $detalleM . '",
                    "' . $detalleA . '",
                    "' . $detalleP . '",
                    "' . $mostrarC[$i]["primera_eval"] . '",		
        		  	"' . $acciones . '"
                ],';
        }
        # Se substrae la coma.
        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']
        }';
        echo $datosJson;
        /**Se recomienda que se copie el resultado en un archivo para mostrar si está correcto el resultado
         * en todos los objetos para descartar el error.
         */
    }
}
$adminCal = new TablaCalificacionesAlumno();
$adminCal->mostrarTablaAlumnosCal();