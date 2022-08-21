<?php
require_once "../controladores/horarioClases.controlador.php";
require_once "../modelos/horarioClases.modelo.php";

require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";


class TablaHorarioClases
{
    /**===================================
     * MOSTRAR LA TABLA HORARIO CLASES
     ===================================**/
    public function mostrarTablaHorarioC()
    {
        $item = null;
        $valor = null;

        $horarioC = ControladorHorarioC::ctrMostrarHorarioC($item, $valor);
        // echo json_encode($horarioC);
        // return;

        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($horarioC); $i++) {
            /**===================================
             * TRAER MATERIA
             ===================================**/
            $item = "id";
            $valor = $horarioC[$i]["id_materia"];
            $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
            // var_dump($materia);
            if ($materia["nombre_materia"] == "") {
                $detalleM = "SIN MATERIA";
            } else {
                $detalleM = $materia["nombre_materia"];
            }
            /**===================================
             * TRAER PROFESOR
             ===================================**/
            $item = "id";
            $valor = $horarioC[$i]["id_profesor"];
            $profesor = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
            // var_dump($profesor);
            if ($profesor["nombre_ma"] == "") {
                $detalleP = "SIN PROFESOR";
            } else {
                $detalleP = $profesor["nombre_ma"] . " " . $profesor["apPaterno_ma"] . " " . $profesor["apMaterno_ma"];
            }

            /**===================================
             * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
            if ($horarioC[$i]["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoHorarioC = 1;
            } else {
                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoHorarioC = 0;
            }
            $estado = "<button class='btn3 " . $colorEstado . " btnActivarHorarioC' idHorarioC='" . $horarioC[$i]["id"] . "' estadoHorarioC='" . $estadoHorarioC . "'>" . $textoEstado . "</button>";
            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-success btnEditarHorarioCA' idHorarioC='" . $horarioC[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarHorariorCA'>Agregra alumno</button><button class='btn btn-primary btnEditarHorarioC' idHorarioC='" . $horarioC[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarHorariorC'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarHorarioC' idHorarioC='" . $horarioC[$i]["id"] . "'><i class='fa fa-times'></i></button></div>";

            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $detalleM . '",
                    "' . $detalleP . '",
                    "' . $estado . '",	
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
/**===================================
 * MOSTRAR TABLA HORARIO PROFESOR
 ===================================**/
$mostrarHorP = new TablaHorarioClases();
$mostrarHorP->mostrarTablaHorarioC();