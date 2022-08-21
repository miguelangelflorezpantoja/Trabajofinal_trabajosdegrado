<?php
require_once "../controladores/alumno.controlador.php";
require_once "../modelos/alumno.modelo.php";


class TablaAlumnos
{
    /**===================================
     * MOSTRAR LA TABLA ALUMNOS
     ===================================**/
    public function mostrarTablaAlumnos()
    {
        $item = null;
        $valor = null;

        $alumnos = ControladorAlumno::ctrMostrarAlumno($item, $valor);

        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($alumnos); $i++) {
            /**===================================
             * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
            if ($alumnos[$i]["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "No inscrito";
                $estadoAlumno = 1;
            } else {
                $colorEstado = "btn-success";
                $textoEstado = "Inscrito";
                $estadoAlumno = 0;
            }

            $estado = "<button class='btn3 " . $colorEstado . " btnActivarA' idAlumno='" . $alumnos[$i]["id"] . "' estadoAlumno='" . $estadoAlumno . "'>" . $textoEstado . "</button>";
            /**===================================
             * TRAER IMAGEN ALUMNO
             ===================================**/
            if ($alumnos[$i]["foto_al"] != "") {

                $imgAlumno = "<img class='img-thumbnail imgTablaPrincipal' src='" . $alumnos[$i]["foto_al"] . "' width='50px'>";
            } else {

                $imgAlumno = "<img class='img-thumbnail imgTablaPrincipal' src='vistas/img/alumno/default/anonymous.png' width='60px'>";
            }

            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-primary btnEditarAlumno' idAlumno='" . $alumnos[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarAlumno'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAlumno' idAlumno='" . $alumnos[$i]["id"] . "' fotoAlumno='" . $alumnos[$i]["foto_al"] . "'><i class='fa fa-times'></i></button></div>";
            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $alumnos[$i]["matricula_al"] . '",
                    "' . $imgAlumno . '",
        			"' . $alumnos[$i]["nombre_al"] . " " . $alumnos[$i]["apellidoPaterno_al"] . " " . $alumnos[$i]["apellidoMaterno_al"] . '",
                    "' . $estado . '",
                    "' . $alumnos[$i]["email_al"] . '",	
        		  	"' . $acciones . '"
                ],';
        }
        # Se substrae la última coma que cierra el json(es la anaterior).
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
$acitvarProductos = new TablaAlumnos();
$acitvarProductos->mostrarTablaAlumnos();