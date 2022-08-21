<?php

require_once "../controladores/alumno.controlador.php";
require_once "../modelos/alumno.modelo.php";

require_once "../controladores/calificacion.controlador.php";
require_once "../modelos/calificacion.modelo.php";

class AjaxAlumno
{
    /**===================================
     * ACTIVAR ALUMNOS
     ===================================**/
    public $activarAlumno;
    public $activarIdA;

    public function ajaxActivarAlumno()
    {
        $tabla = "alumno";

        $item1 = "estado";
        $valor1 = $this->activarAlumno;

        $item2 = "id";
        $valor2 = $this->activarIdA;
        $respuesta = ModeloAlumno::mdlActualizarAlumno($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * ACTIVAR UNIFORMES PARA HOMBRES
     ===================================**/
    public $activarUniformeH;
    public $activarIdUnH;

    public function ajaxActivarAlumnoUH()
    {
        $tabla = "uniformehombre";

        $item1 = "estado";
        $valor1 = $this->activarUniformeH;

        $item2 = "id";
        $valor2 = $this->activarIdUnH;
        $respuesta = ModeloAlumno::mdlActualizarAlumnoUH($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * ACTIVAR UNIFORMES PARA MUJERES
     ===================================**/
    public $activarUniformeM;
    public $activarIdUnM;

    public function ajaxActivarAlumnoUM()
    {
        $tabla = "uniformemujer";

        $item1 = "estado";
        $valor1 = $this->activarUniformeM;

        $item2 = "id";
        $valor2 = $this->activarIdUnM;
        $respuesta = ModeloAlumno::mdlActualizarAlumnoUM($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * REVISAR DOCUMENTOS
     ===================================**/
    public $estadoDoc;
    public $idDocumentAl;

    public function ajaxDocumentoAl()
    {
        $tabla = "documentacion";

        $item1 = "estado";
        $valor1 = $this->estadoDoc;

        $item2 = "id";
        $valor2 = $this->idDocumentAl;
        $respuesta = ModeloAlumno::mdlActualizarDocumentos($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * VALIDAR NO REPETIR MATRÍCULA DE ALUMNO
     ===================================**/
    public $validarMatricula;

    public function ajaxValidarMatricula()
    {
        $item = "matricula_al";
        $valor = $this->validarMatricula;

        $respuesta = ControladorAlumno::ctrMostrarAlumno($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        // return $respuesta;
        echo json_encode($respuesta);
    }
    /**===================================
     * VALIDAR NO REPETIR CORREO ELECTRÓNICO DE ALUMNO
     ===================================**/
    public $validarCorreo;

    public function ajaxValidarCorreo()
    {
        $item = "email_al";
        $valor = $this->validarCorreo;

        $respuesta = ControladorAlumno::ctrMostrarAlumnoC($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        // return $respuesta;
        echo json_encode($respuesta);
    }
    /**===================================
     * VALIDAR NO REPETIR CALIFICACIÓN EN 
     * PRIMERA EVALUACIÓN
     ===================================**/
    public $validarCalificacion;

    public function ajaxValidarCalificacion()
    {
        $item = "primera_eval";
        $valor = $this->validarCalificacion;

        $respuesta = ControladorCalificacion::ctrMostrarCalificacion($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * VALIDAR NO REPETIR DOCUMENTOS DE ALUMNO
     ===================================**/
    public $validarDatosAlumno;

    public function ajaxValidarDocumentos()
    {
        $item = "documentos";
        $valor = $this->validarDatosAlumno;

        $respuesta = ControladorAlumno::ctrMostrarAlumnoDocAlumno($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * GUARDAR DATOS ALUMNO
     ===================================**/
    public $numeroMatricula;
    public $regAlumno;
    public $fotoAlumno;
    public $regApellidoP;
    public $regApellidoM;
    public $regEmailA;
    public $seleccionarCategoria;
    public $fechaNacA;
    public $showAge;
    public $regTelA;
    public $regTelAalterno;
    public $regNacionalidadA;
    public $seleccionarEstado;
    public $seleccionarMunicipio;
    public $regDomicioA;
    public $regCPA;
    public $regPassword;
    #Variables editar alumno.
    public $id;
    public $antiguaFotoAlumno;
    public $passwordActualA;

    public function ajaxCrearAlumno()
    {
        $datos = array(
            "numeroMatricula" => $this->numeroMatricula,
            "regAlumno" => $this->regAlumno,
            "fotoAlumno" => $this->fotoAlumno,
            "regApellidoP" => $this->regApellidoP,
            "regApellidoM" => $this->regApellidoM,
            "regEmailA" => $this->regEmailA,
            "seleccionarCategoria" => $this->seleccionarCategoria,
            "fechaNacA" => $this->fechaNacA,
            "showAge" => $this->showAge,
            "regTelA" => $this->regTelA,
            "regTelAalterno" => $this->regTelAalterno,
            "regNacionalidadA" => $this->regNacionalidadA,
            "seleccionarEstado" => $this->seleccionarEstado,
            "seleccionarMunicipio" => $this->seleccionarMunicipio,
            "regDomicioA" => $this->regDomicioA,
            "regCPA" => $this->regCPA,
            "regPassword" => $this->regPassword
        );
        // var_dump($datos, json_encode($datos));
        $respuesta = ControladorAlumno::ctrCrearAlumno($datos);
        #Lectura si regresa información
        // echo json_encode($respuesta);
        echo $respuesta;
    }
    /*=============================================
	TRAER AlUMNOS PARA EDICIÓN
	=============================================*/
    public $idAlumno;

    public function ajaxTraerAlumno()
    {

        $item = "id";
        $valor = $this->idAlumno;

        $respuesta = ControladorAlumno::ctrMostrarAlumno($item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	TRAER AlUMNOS PARA EDICIÓN DE DOCUMENTOS
	=============================================*/
    public $idDocument;

    public function ajaxTraerAlumnoDocE()
    {

        $item = "id";
        $valor = $this->idDocument;

        $respuesta = ControladorAlumno::ctrMostrarAlumnoDocE($item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
	TRAER AlUMNOS PARA DESCARGAR DOCUMENTOS
	=============================================*/
    public $idDocumentD;

    public function ajaxTraerAlumnoDocDes()
    {

        $item = "id";
        $valor = $this->idDocumentD;

        $respuesta = ControladorAlumno::ctrMostrarAlumnoDocDes($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * EDITAR ALUMNO
     ===================================**/
    public function ajaxEditarAlumno()
    {
        $datos = array(
            "idAlumno" => $this->id,
            "numeroMatriculaEdit" => $this->numeroMatricula,
            "regAlumnoEdit" => $this->regAlumno,
            "fotoAlumnoEdit" => $this->fotoAlumno,
            "regApellidoPEdit" => $this->regApellidoP,
            "regApellidoMEdit" => $this->regApellidoM,
            "regEmailAEdit" => $this->regEmailA,
            "regPasswordAE" => $this->regPassword,
            "passwordActualA" => $this->passwordActualA,
            "antiguaFotoAlumno" => $this->antiguaFotoAlumno
        );
        // var_dump($datos, json_encode($datos));
        $respuesta = ControladorAlumno::ctrEditarAlumno($datos);
        #Lectura si regresa información
        // var_dump($respuesta, json_encode($respuesta));
        // echo json_encode($respuesta);
        echo $respuesta;
    }
    /**===================================
     * RECIBIR DATOS CALIFICACIÓN
     ===================================**/
    public $data;
    public function ajaxCalif()
    {
        $data = $this->data;

        $respuesta = ControladorCalificacion::ctrIngresarCali($data);
        // var_dump($respuesta, json_encode($respuesta));
        echo $respuesta;
    }
    /**===================================
     * TRAER CALIFICACIÓN PARA EDICIÓN
     ===================================**/
    public $ideditCal;

    public function ajaxTraerCalificacionesEdit()
    {

        $item = "id";
        $valor = $this->ideditCal;

        $respuesta = ControladorCalificacion::ctrMostraCalificacionesE($item, $valor);

        echo json_encode($respuesta);
    }
}
/*=============================================
RECIBIR DATA CALIFICAION
=============================================*/
if (isset($_POST["data"])) {
    // $data = json_decode($_POST["data"]);
    // var_dump($data);
    $calValor = new AjaxAlumno();
    $calValor->data = $_POST["data"];
    $calValor->ajaxCalif();
}
/*=============================================
TRAER CALIFICACIONES PARA EDICIÓN
=============================================*/
if (isset($_POST["ideditCal"])) {

    $traerCalifica = new AjaxAlumno();
    $traerCalifica->ideditCal = $_POST["ideditCal"];
    $traerCalifica->ajaxTraerCalificacionesEdit();
}
/*=============================================
ACTIVAR ALUMNOS
=============================================*/
if (isset($_POST["activarAlumno"])) {
    $activarAlumno = new AjaxAlumno();
    $activarAlumno->activarAlumno = $_POST["activarAlumno"];
    $activarAlumno->activarIdA = $_POST["activarIdA"];
    $activarAlumno->ajaxActivarAlumno();
}
/*=============================================
REVISAR DOCUMENTOS
=============================================*/
if (isset($_POST["estadoDoc"])) {
    $activarDoc = new AjaxAlumno();
    $activarDoc->estadoDoc = $_POST["estadoDoc"];
    $activarDoc->idDocumentAl = $_POST["idDocumentAl"];
    $activarDoc->ajaxDocumentoAl();
}
/*=============================================
ACTIVAR UNIFORMES PARA HOMBRES
=============================================*/

if (isset($_POST["activarUniformeH"])) {
    $activarUniformeH = new AjaxAlumno();
    $activarUniformeH->activarUniformeH = $_POST["activarUniformeH"];
    $activarUniformeH->activarIdUnH = $_POST["activarIdUnH"];
    $activarUniformeH->ajaxActivarAlumnoUh();
}
/*=============================================
ACTIVAR UNIFORMES PARA MUJER
=============================================*/

if (isset($_POST["activarUniformeM"])) {
    $activarUniformeM = new AjaxAlumno();
    $activarUniformeM->activarUniformeM = $_POST["activarUniformeM"];
    $activarUniformeM->activarIdUnM = $_POST["activarIdUnM"];
    $activarUniformeM->ajaxActivarAlumnoUM();
}
/**===================================
 * * VALIDAR NO REPETIR CALIFICACIÓN 
 * DE PRIMERA EVALUACIÓN.
 ===================================**/
if (isset($_POST["validarCalificacion"])) {
    $valvalidarCalificacion = new AjaxAlumno();
    $valvalidarCalificacion->validarCalificacion = $_POST["validarCalificacion"];
    $valvalidarCalificacion->ajaxValidarCalificacion();
}
/**===================================
 * VALIDAR NO REPETIR MATRÍCULA
 ===================================**/
if (isset($_POST["validarMatricula"])) {
    $valMatricula = new AjaxAlumno();
    $valMatricula->validarMatricula = $_POST["validarMatricula"];
    $valMatricula->ajaxValidarMatricula();
}
/**===================================
 * VALIDAR NO REPETIR MATRÍCULA
 ===================================**/
if (isset($_POST["validarCorreo"])) {
    $valCorreo = new AjaxAlumno();
    $valCorreo->validarCorreo = $_POST["validarCorreo"];
    $valCorreo->ajaxValidarCorreo();
}
/**===================================
 * VALIDAR NO REPETIR DOCUMENTOS EN ALUMNO
 ===================================**/
if (isset($_POST["validarDatosAlumno"])) {
    $valDocumentos = new AjaxAlumno();
    $valDocumentos->validarDatosAlumno = $_POST["validarDatosAlumno"];
    $valDocumentos->ajaxValidarDocumentos();
}
/**===================================
 * GUARDAR DATOS ALUMNO
 ===================================**/
if (isset($_POST["regAlumno"])) {
    $alumno = new AjaxAlumno();
    $alumno->numeroMatricula = $_POST["numeroMatricula"];
    $alumno->regAlumno = $_POST["regAlumno"];

    if (isset($_FILES["fotoAlumno"])) {

        $alumno->fotoAlumno = $_FILES["fotoAlumno"];
    } else {

        $alumno->fotoAlumno = null;
    }
    $alumno->regApellidoP = $_POST["regApellidoP"];
    $alumno->regApellidoM = $_POST["regApellidoM"];
    $alumno->regEmailA = $_POST["regEmailA"];
    $alumno->seleccionarCategoria = $_POST["seleccionarCategoria"];
    $alumno->fechaNacA = $_POST["fechaNacA"];
    $alumno->showAge = $_POST["showAge"];
    $alumno->regTelA = $_POST["regTelA"];
    $alumno->regTelAalterno = $_POST["regTelAalterno"];
    $alumno->regNacionalidadA = $_POST["regNacionalidadA"];
    $alumno->seleccionarEstado = $_POST["seleccionarEstado"];
    $alumno->seleccionarMunicipio = $_POST["seleccionarMunicipio"];
    $alumno->regDomicioA = $_POST["regDomicioA"];
    $alumno->regCPA = $_POST["regCPA"];
    $alumno->regPassword = $_POST["regPassword"];
    $alumno->ajaxCrearAlumno();
}
/*=============================================
TRAER ALUMNOS PARA EDICIÓN
=============================================*/
if (isset($_POST["idAlumno"])) {

    $traerProducto = new AjaxAlumno();
    $traerProducto->idAlumno = $_POST["idAlumno"];
    $traerProducto->ajaxTraerAlumno();
}
/*=============================================
TRAER ALUMNOS PARA EDICIÓN DE DOCUMENTOS
=============================================*/
if (isset($_POST["idDocument"])) {

    $traerDoc = new AjaxAlumno();
    $traerDoc->idDocument = $_POST["idDocument"];
    $traerDoc->ajaxTraerAlumnoDocE();
}
/*=============================================
TRAER ALUMNOS PARA DESCARGA DE DOCUMENTOS
=============================================*/
if (isset($_POST["idDocumentD"])) {

    $traerDocD = new AjaxAlumno();
    $traerDocD->idDocumentD = $_POST["idDocumentD"];
    $traerDocD->ajaxTraerAlumnoDocDes();
}
/**===================================
 * EDITAR ALUMNO
 ===================================**/
if (isset($_POST["id"])) {
    $editarAlumno = new AjaxAlumno();
    $editarAlumno->id = $_POST["id"];
    $editarAlumno->numeroMatricula = $_POST["numeroMatriculaEdit"];
    $editarAlumno->regAlumno = $_POST["regAlumnoEdit"];

    if (isset($_FILES["fotoAlumnoEdit"])) {

        $editarAlumno->fotoAlumno = $_FILES["fotoAlumnoEdit"];
    } else {

        $editarAlumno->fotoAlumno = null;
    }
    $editarAlumno->regApellidoP = $_POST["regApellidoPEdit"];
    $editarAlumno->regApellidoM = $_POST["regApellidoMEdit"];
    $editarAlumno->regEmailA = $_POST["regEmailAEdit"];
    $editarAlumno->regPassword = $_POST["regPasswordAE"];
    $editarAlumno->passwordActualA = $_POST["passwordActualA"];
    $editarAlumno->antiguaFotoAlumno = $_POST["antiguaFotoAlumno"];
    $editarAlumno->ajaxEditarAlumno();
}