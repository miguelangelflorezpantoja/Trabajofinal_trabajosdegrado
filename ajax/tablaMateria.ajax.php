<?php
require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";

require_once "../controladores/detalleSemestre.controlador.php";
require_once "../modelos/detalleSemestre.modelo.php";

class TablaMateria
{
    /**===================================
     * MOSTRAR LA TABLA MATERIA
     ===================================**/
    public function mostrarTablaMateria()
    {
        $item = null;
        $valor = null;

        $materia = ControladorMateria::ctrMostrarMateria($item, $valor);
        // echo json_encode($materia);
        // return;
        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($materia); $i++) {
            /**===================================
             * TRAER SEMESTRE
             ===================================**/
            $item = "id";
            $valor = $materia[$i]["id_semestre"];
            $detalleSem = ControladorGruSem::ctrMostrarGruSem($item, $valor);
            // var_dump($detalleSem);
            if ($detalleSem["semestre"] == "") {
                $detalleS = "SIN SEMESTRE";
            } else {
                $detalleS = $detalleSem["semestre"];
            }
            /**===================================
             * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
            if ($materia[$i]["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoMateria = 1;
            } else {
                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoMateria = 0;
            }
            $estado = "<button class='btn3 " . $colorEstado . " btnActivarMateria' idMateria='" . $materia[$i]["id"] . "' estadoMateria='" . $estadoMateria . "'>" . $textoEstado . "</button>";
            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-primary btnEditarMateria' idMateria='" . $materia[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarMateria'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMateria' idMateria='" . $materia[$i]["id"] . "'><i class='fa fa-times'></i></button></div>";

            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $materia[$i]["clave_materia"] . '",
                    "' . $materia[$i]["nombre_materia"] . '",
                    "' . $estado . '",
                    "' . $detalleS . '",
                    "' . $materia[$i]["fechaAlta_mat"] . '",		
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
 * MOSTRAR TABLA UBICACIÓN
 ===================================**/
$mostrarMateria = new TablaMateria();
$mostrarMateria->mostrarTablaMateria();