<?php

require_once "../controladores/profesor.controlador.php";
require_once "../modelos/profesor.modelo.php";

class AjaxProfesor
{

    /**===================================
     * ACTIVAR PRODUCTOS
     ===================================**/
    public $activarProfesor;
    public $activarIdP;

    public function ajaxActivarProfesor()
    {
        $tabla = "profesor";

        $item1 = "estado";
        $valor1 = $this->activarProfesor;

        $item2 = "id";
        $valor2 = $this->activarIdP;
        $respuesta = ModeloProfesores::mdlActualizarProfesor($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * VALIDAR NO REPETIR CÉDULA
     ===================================**/
    public $validarCedula;

    public function ajaxValidarCedula()
    {
        $item = "cedula";
        $valor = $this->validarCedula;

        $respuesta = ControladorProfesor::ctrMostrarProfesor($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * VALIDAR NO REPETIR EMAIL PROFESOR
     ===================================**/
    public $validaremailP;

    public function ajaxvalidaremailP()
    {
        $item = "email_ma";
        $valor = $this->validaremailP;

        $respuesta = ControladorProfesor::ctrMostrarProfesor($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        // return $respuesta;
        echo json_encode($respuesta);
    }
    /*=============================================
    EDITAR PROFESOR PARA CLASES
    =============================================*/

    public $profesorE;

    public function ajaxEditarProfesorC()
    {

        $item = "id";
        $valor = $this->profesorE;

        $respuesta = ControladorProfesor::ctrMostrarProfesorH($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        echo json_encode($respuesta);
    }
    /**===================================
     * GUARDAR DATOS PROFESOR
     ===================================**/
    public $numeroCedula;
    public $regProfesor;
    public $fotoProfesor;
    public $regApellidoPP;
    public $regApellidoMP;
    public $regEmailP;
    public $seleccionarCategoria;
    public $fechaNacP;
    public $showAgeP;
    public $regTelP;
    public $regTelPalterno;
    public $regNacionalidadP;
    public $seleccionarEstado;
    public $seleccionarMunicipio;
    public $regDomicioP;
    public $regCPP;
    public $regPasswordP;
    #Variables editar profesro.
    public $id;
    public $antiguaFotoAlumno;
    public $passwordActualP;

    public function ajaxCrearProfesor()
    {
        $datos = array(
            "numeroCedula" => $this->numeroCedula,
            "regProfesor" => $this->regProfesor,
            "fotoProfesor" => $this->fotoProfesor,
            "regApellidoPP" => $this->regApellidoPP,
            "regApellidoMP" => $this->regApellidoMP,
            "regEmailP" => $this->regEmailP,
            "regPasswordP" => $this->regPasswordP
        );
        // var_dump($datos, json_encode($datos));
        $respuesta = ControladorProfesor::ctrCrearProfesor($datos);
        #Lectura si regresa información
        // echo json_encode($respuesta);
        echo $respuesta;
    }
    /*=============================================
    TRAER PROFESOR PARA EDICIÓN
    =============================================*/
    public $idProfesor;

    public function ajaxTraerProfesor()
    {

        $item = "id";
        $valor = $this->idProfesor;

        $respuesta = ControladorProfesor::ctrMostrarProfesor($item, $valor);

        echo json_encode($respuesta);
    }
    public function ajaxEditarProfesor()
    {
        $datos = array(
            "idProfesor" => $this->id,
            "numeroCedulaEdit" => $this->numeroCedula,
            "regProfesorEdit" => $this->regProfesor,
            "fotoProfesorEdit" => $this->fotoProfesor,
            "regApellidoPPEdit" => $this->regApellidoPP,
            "regApellidoMPEdit" => $this->regApellidoMP,
            "regEmailPEdit" => $this->regEmailP,
            "regPasswordPE" => $this->regPasswordP,
            "passwordActualP" => $this->passwordActualP,
            "antiguaFotoProfesor" => $this->antiguaFotoProfesor
        );
        // var_dump($datos, json_encode($datos));
        $respuesta = ControladorProfesor::ctrEditarProfesor($datos);
        #Lectura si regresa información
        // echo json_encode($respuesta);
        echo $respuesta;
    }
}
/*=============================================
ACTIVAR PROFESOR
=============================================*/

if (isset($_POST["activarProfesor"])) {
    $activarProfesor = new AjaxProfesor();
    $activarProfesor->activarProfesor = $_POST["activarProfesor"];
    $activarProfesor->activarIdP = $_POST["activarIdP"];
    $activarProfesor->ajaxActivarProfesor();
}
/**===================================
 * VALIDAR NO REPETIR MATRÍCULA
 ===================================**/
if (isset($_POST["validarCedula"])) {
    $valProducto = new AjaxProfesor();
    $valProducto->validarCedula = $_POST["validarCedula"];
    $valProducto->ajaxValidarCedula();
}
/**===================================
 * VALIDAR NO REPETIR EMAIL PROEFESOR
 ===================================**/
if (isset($_POST["validaremailP"])) {
    $validarEmailP = new AjaxProfesor();
    $validarEmailP->validaremailP = $_POST["validaremailP"];
    $validarEmailP->ajaxvalidaremailP();
}
/*=============================================
EDITAR PROFESOR PARA CLASE
=============================================*/
if (isset($_POST["profesorE"])) {

    $editarProfC = new AjaxProfesor();
    $editarProfC->profesorE = $_POST["profesorE"];
    $editarProfC->ajaxEditarProfesorC();
}
/**===================================
 * GUARDAR DATOS ALUMNO
 ===================================**/
if (isset($_POST["regProfesor"])) {
    $profesor = new AjaxProfesor();
    $profesor->numeroCedula = $_POST["numeroCedula"];
    $profesor->regProfesor = $_POST["regProfesor"];

    if (isset($_FILES["fotoProfesor"])) {

        $profesor->fotoProfesor = $_FILES["fotoProfesor"];
    } else {

        $profesor->fotoProfesor = null;
    }
    $profesor->regApellidoPP = $_POST["regApellidoPP"];
    $profesor->regApellidoMP = $_POST["regApellidoMP"];
    $profesor->regEmailP = $_POST["regEmailP"];
    $profesor->regPasswordP = $_POST["regPasswordP"];
    $profesor->ajaxCrearProfesor();
}
/*=============================================
TRAER PROFESOR PARA EDICIÓN
=============================================*/
if (isset($_POST["idProfesor"])) {

    $traerProfesor = new AjaxProfesor();
    $traerProfesor->idProfesor = $_POST["idProfesor"];
    $traerProfesor->ajaxTraerProfesor();
}
/**===================================
 * EDITAR DATOS PROFESOR
 ===================================**/
if (isset($_POST["id"])) {
    $editProfesor = new AjaxProfesor();
    $editProfesor->id = $_POST["id"];
    $editProfesor->numeroCedula = $_POST["numeroCedulaEdit"];
    $editProfesor->regProfesor = $_POST["regProfesorEdit"];

    if (isset($_FILES["fotoProfesorEdit"])) {

        $editProfesor->fotoProfesor = $_FILES["fotoProfesorEdit"];
    } else {

        $editProfesor->fotoProfesor = null;
    }
    $editProfesor->regApellidoPP = $_POST["regApellidoPPEdit"];
    $editProfesor->regApellidoMP = $_POST["regApellidoMPEdit"];
    $editProfesor->regEmailP = $_POST["regEmailPEdit"];
    $editProfesor->regPasswordP = $_POST["regPasswordPE"];
    $editProfesor->passwordActualP = $_POST["passwordActualP"];
    $editProfesor->antiguaFotoProfesor = $_POST["antiguaFotoProfesor"];
    $editProfesor->ajaxEditarProfesor();
}