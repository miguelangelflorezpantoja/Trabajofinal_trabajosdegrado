<?php

require_once "../controladores/admin.controlador.php";
require_once "../modelos/admin.modelo.php";

class AjaxAdmin
{
    /**===================================
     * ACTIVAR ADMINISTRADOR
     ===================================**/
    public $activarAdmin;
    public $activarIdAd;

    public function ajaxActivarAdmin()
    {
        $tabla = "administradores";

        $item1 = "estado";
        $valor1 = $this->activarAdmin;

        $item2 = "id";
        $valor2 = $this->activarIdAd;
        $respuesta = ModeloAdmin::mdlActualizarAdmin($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * VALIDAR NO REPETIR USUARIO ADMIN
     ===================================**/
    public $regAdmin;

    public function ajaxValidarAdmin()
    {
        $item = "nombre";
        $valor = $this->regAdmin;

        $respuesta = ControladorAdmin::ctrMostrarAdmin($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * VALIDAR NO REPETIR EMAIL ADMIN
     ===================================**/
    public $validarEmailAd;

    public function ajaxValidarEmailAdmin()
    {
        $datos = $this->validarEmailAd;

        $respuesta = ControladorAdmin::ctrMostrarAdmin("email", $datos);

        echo json_encode($respuesta);
    }
    /*=============================================
    EDITAR ADMIN
    =============================================*/

    public $idAdmin;

    public function ajaxEditarAdmin()
    {

        $item = "id";
        $valor = $this->idAdmin;

        $respuesta = ControladorAdmin::ctrMostrarAdmin($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
ACTIVAR ADMINISTRADOR
=============================================*/

if (isset($_POST["activarAdmin"])) {

    $activarAdmin = new AjaxAdmin();
    $activarAdmin->activarAdmin = $_POST["activarAdmin"];
    $activarAdmin->activarIdAd = $_POST["activarIdAd"];
    $activarAdmin->ajaxActivarAdmin();
}
/**===================================
 * VALIDAR NO REPETIR USUARIO ADMIN
 ===================================**/
if (isset($_POST["regAdmin"])) {
    $regAdmin = new AjaxAdmin();
    $regAdmin->regAdmin = $_POST["regAdmin"];
    $regAdmin->ajaxValidarAdmin();
}
/**===================================
 * VALIDAR NO REPETIR EMAIL ADMIN
 ===================================**/
if (isset($_POST["regEmailAd"])) {
    $validarEmailAd = new AjaxAdmin();
    $validarEmailAd->validarEmailAd = $_POST["regEmailAd"];
    $validarEmailAd->ajaxValidarEmailAdmin();
}
/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
if (isset($_POST["idAdmin"])) {

    $editarAdmin = new AjaxAdmin();
    $editarAdmin->idAdmin = $_POST["idAdmin"];
    $editarAdmin->ajaxEditarAdmin();
}