<?php
require_once "../controladores/horarioClases.controlador.php";
require_once "../modelos/horarioClases.modelo.php";

class AjaxHorarioC
{
    /**===================================
     * ACTIVAR HORARIO DE CLASES
     ===================================**/
    public $activarGrupo;
    public $activarIdG;

    public function ajaxActivarHorarioC()
    {
        $tabla = "horario_p";

        $item1 = "estado";
        $valor1 = $this->activarHorarioC;

        $item2 = "id";
        $valor2 = $this->activarIdHoC;
        $respuesta = ModeloHorarioC::mdlActualizarHorarioC($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /**===================================
     * ACTIVAR HORARIO DE ALUMNO
     ===================================**/
    public $activarA;
    public $activarHorarioA;

    public function ajaxActivarHorarioA()
    {
        $tabla = "horario_al";

        $item1 = "estado";
        $valor1 = $this->activarHorarioA;

        $item2 = "id";
        $valor2 = $this->activarIdHoA;
        $respuesta = ModeloHorarioC::mdlActualizarHorarioA($tabla, $item1, $valor1, $item2, $valor2);

        echo $respuesta;
    }
    /*=============================================
    EDITAR HORARIO CLASES
    =============================================*/

    public $idHorarioC;

    public function ajaxEditarHorarioC()
    {

        $item = "id";
        $valor = $this->idHorarioC;

        $respuesta = ControladorHorarioC::ctrMostrarHorarioC($item, $valor);

        echo json_encode($respuesta);
    }
    /*=============================================
    EDITAR MATERIA PARA CLASES
    =============================================*/

    public $materia;

    public function ajaxEditarMateriaC()
    {

        $item = "id";
        $valor = $this->materia;

        $respuesta = ControladorHorarioC::ctrMostrarMateriaC($item, $valor);

        echo json_encode($respuesta);
    }
    /**===================================
     * NO REPETRIR GRUPO Y MATERIA
     ===================================**/
    public $validarMateriaC;

    public function ajaxvalidarMateriaGrupo()
    {

        $item = "id_materia";
        $valor = $this->validarMateriaC;

        $respuesta = ControladorHorarioC::ctrMostrarHorarioC($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        // return $respuesta;
        echo json_encode($respuesta);
    }
    /**===================================
     * NO REPETIR GRUPO Y MATERIA
     ===================================**/
    public $validarGrupo;

    public function ajaxvalidarMateriaGrupoC()
    {

        $item = "id_grupo";
        $valor = $this->validarGrupo;

        $respuesta = ControladorHorarioC::ctrMostrarHorarioC($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        // return $respuesta;
        echo json_encode($respuesta);
    }
}
/**===================================
 * VALIDAR NO REPETIR GRUPO Y MATERIA
 ===================================**/
if (isset($_POST["validarMateria"])) {
    // var_dump($_POST["validarMateria"]);
    $valvalidarMateria = new AjaxHorarioC();
    $valvalidarMateria->validarMateriaC = $_POST["validarMateria"];
    $valvalidarMateria->ajaxvalidarMateriaGrupo();
}
/**===================================
 * VALIDAR NO REPETIR GRUPO Y MATERIA
 ===================================**/
if (isset($_POST["validarGrupo"])) {
    // var_dump($_POST["validarGrupo"]);
    $valvalidarGrupo = new AjaxHorarioC();
    $valvalidarGrupo->validarGrupo = $_POST["validarGrupo"];
    $valvalidarGrupo->ajaxvalidarMateriaGrupoC();
}
/*=============================================
ACTIVAR HORARIO DE CLASES
=============================================*/

if (isset($_POST["activarHorarioC"])) {

    $activarHorarioC = new AjaxHorarioC();
    $activarHorarioC->activarHorarioC = $_POST["activarHorarioC"];
    $activarHorarioC->activarIdHoC = $_POST["activarIdHoC"];
    $activarHorarioC->ajaxActivarHorarioC();
}
/*=============================================
ACTIVAR HORARIO DE ALUMNOS
=============================================*/

if (isset($_POST["activarHorarioA"])) {

    $activarHorarioA = new AjaxHorarioC();
    $activarHorarioA->activarHorarioA = $_POST["activarHorarioA"];
    $activarHorarioA->activarIdHoA = $_POST["activarIdHoA"];
    $activarHorarioA->ajaxActivarHorarioA();
}
/*=============================================
EDITAR HORARIO DE CLASES
=============================================*/
if (isset($_POST["idHorarioC"])) {

    $editarHorarioC = new AjaxHorarioC();
    $editarHorarioC->idHorarioC = $_POST["idHorarioC"];
    $editarHorarioC->ajaxEditarHorarioC();
}
/*=============================================
EDITAR MATERIA PARA CLASES
=============================================*/
if (isset($_POST["materia"])) {

    $editarMateriaC = new AjaxHorarioC();
    $editarMateriaC->materia = $_POST["materia"];
    $editarMateriaC->ajaxEditarMateriaC();
}