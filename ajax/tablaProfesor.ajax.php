<?php
require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";



class TablaProfesores
{
    /**===================================
     * MOSTRAR LA TABLA PROFESORES
     ===================================**/
    public function mostrarTablaProfesores()
    {
        $item = null;
        $valor = null;

        $profesores = ControladorProfesor::ctrMostrarProfesor($item, $valor);


        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($profesores); $i++) {

            /**===================================
             * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
            if ($profesores[$i]["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoProfesor = 1;
            } else {
                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoProfesor = 0;
            }
            $estado = "<button class='btn3 " . $colorEstado . " btnActivarP' idProfesor='" . $profesores[$i]["id"] . "' estadoProfesor='" . $estadoProfesor . "'>" . $textoEstado . "</button>";
            /**===================================
             * TRAER IMAGEN PROFESOR
             ===================================**/
            if ($profesores[$i]["foto_ma"] != "") {

                $imgProfesor = "<img class='img-thumbnail imgTablaPrincipal' src='" . $profesores[$i]["foto_ma"] . "' width='60px'>";
            } else {

                $imgProfesor = "<img class='img-thumbnail imgTablaPrincipal' src='vistas/img/profesor/default/anonymous.png' width='60px'>";
            }

            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-primary btnEditarProfesor' idProfesor='" . $profesores[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarProfesor'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProfesor' idProfesor='" . $profesores[$i]["id"] . "' fotoProfesor='" . $profesores[$i]["foto_ma"] . "'><i class='fa fa-times'></i></button></div>";
            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $imgProfesor . '",
        			"' . $profesores[$i]["nombre_ma"] . " " . $profesores[$i]["apPaterno_ma"] . " " . $profesores[$i]["apMaterno_ma"] . '",
                    "' . $estado . '",
                    "' . $profesores[$i]["email_ma"] . '",	
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
 * MOSTRAR TABLA PRODUCTOS
 ===================================**/
$acitvarProductos = new TablaProfesores();
$acitvarProductos->mostrarTablaProfesores();