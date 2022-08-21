<?php
require_once "../controladores/admin.controlador.php";
require_once "../modelos/admin.modelo.php";


class TablaAdmin
{
    /**===================================
     * MOSTRAR LA TABLA ADMINISTRADORES
     ===================================**/
    public function mostrarTablaAdmin()
    {
        $item = null;
        $valor = null;

        $admin = ControladorAdmin::ctrMostrarAdmin($item, $valor);
        // echo json_encode($admin);
        // return;

        $datosJson = '{

            "data":[';

        for ($i = 0; $i < count($admin); $i++) {
            /**===================================
             * AGREGAR ETIQUETAS DE ESTADO
             ===================================**/
            if ($admin[$i]["estado"] == 0) {
                $colorEstado = "btn-danger";
                $textoEstado = "Desactivado";
                $estadoAdmin = 1;
            } else {
                $colorEstado = "btn-success";
                $textoEstado = "Activado";
                $estadoAdmin = 0;
            }
            $estado = "<button class='btn1 " . $colorEstado . " btnActivarAd' idAdmin='" . $admin[$i]["id"] . "' estadoAdmin='" . $estadoAdmin . "'>" . $textoEstado . "</button>";
            /**===================================
             * TRAER IMAGEN ADMINISTRADOR
             ===================================**/
            if ($admin[$i]["foto"] != "") {

                $imgAdmin = "<img class='img-thumbnail imgTablaPrincipal' src='" . $admin[$i]["foto"] . "' width='50px'>";
            } else {

                $imgAdmin = "<img class='img-thumbnail imgTablaPrincipal' src='vistas/img/admin/default/anonymous.png' width='60px'>";
            }
            /**===================================
             * TRAER LAS ACCIONES
             ===================================**/
            $acciones = "<div class='btn-group'><button class='btn btn-primary btnEditarAdmin' idAdmin='" . $admin[$i]["id"] . "' data-toggle='modal' data-target='#modalEditarAdmin'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarAdmin' idAdmin='" . $admin[$i]["id"] . "' fotoAdmin='" . $admin[$i]["foto"] . "'><i class='fa fa-times'></i></button></div>";
            /**===================================
             * CONSTRUiR LOS DATOS JSON
             ===================================**/

            $datosJson .= '[
                    "' . ($i + 1) . '",
                    "' . $admin[$i]["nombre"] . '",
                    "' . $imgAdmin . '",
                    "' . $admin[$i]["email"] . '",
                    "' . $estado . '",
                    "' . $admin[$i]["password"] . '",
                    "' . $admin[$i]["perfil"] . '",
                    "' . $admin[$i]["fechaAlta_admin"] . '",		
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
 * MOSTRAR TABLA ADMINISTRADORES
 ===================================**/
$acitvarProductos = new TablaAdmin();
$acitvarProductos->mostrarTablaAdmin();