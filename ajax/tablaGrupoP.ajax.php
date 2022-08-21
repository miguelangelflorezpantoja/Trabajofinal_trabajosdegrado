<?php
require_once "../controladores/horarioClases.controlador.php";
require_once "../modelos/horarioClases.modelo.php";

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";

require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";

require_once "../controladores/alumno.controlador.php";
require_once "../modelos/alumno.modelo.php";

class TablaGrupoP
{
    /**===================================
     * 
     ===================================**/
    public function mostrarTablaHorarioP()
    {
        session_start();
        if (isset($_SESSION["validarSesionBackend"])) {


            $valor = $_SESSION["id"];

            $mostrarG = ControladorHorarioC::ctrMostrarClaseDP($valor);
            $datosJson = '{

            "data":[';

            for ($i = 0; $i < count($mostrarG); $i++) {

                /**===================================
                 * TRAER MATERIAS
                ===================================**/
                $item = "id";
                $valor = $mostrarG[$i]["id_materia"];
                $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
                // var_dump($grupo);
                if ($materia["nombre_materia"] == "") {
                    $materiamat = "SIN MATERIA";
                } else {
                    $materiamat = $materia["nombre_materia"];
                }
                /**===================================
                 * TRAER PROFESOR
                ===================================**/
                $item = "id";
                $valor = $mostrarG[$i]["id_profesor"];
                $profesor = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
                // var_dump($profesor);
                if ($_SESSION["nombre_ma"] == $profesor["nombre_ma"]) {
                    $detalleP = $profesor["nombre_ma"] . " " . $profesor["apPaterno_ma"] . " " . $profesor["apMaterno_ma"];
                }
                /**===================================
                 * CONSTRUiR LOS DATOS JSON
                    ===================================**/

                $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $detalleP . '", 
                    "' . $materiamat . '"
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
}
/**===================================
 * MOSTRAR TABLA HORARIO PROFESOR
 ===================================**/
$mostrarHorP = new TablaGrupoP();
$mostrarHorP->mostrarTablaHorarioP();