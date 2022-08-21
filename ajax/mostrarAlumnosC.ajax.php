<?php
require_once "../controladores/horarioA.controlador.php";
require_once "../modelos/horarioA.modelo.php";

class AjaxMostrarAlumnoCal
{
    /**===================================
     * MOSTRAR ALUMNOS PARA CALIFICACIONES
     ===================================**/

    public $idMateriaP;
    public function ajaxTraerMateriaP()
    {
        /**Al colocar el id_materia, se crea un array mutldimensional, todos los datos corrsponden
         * a la información de los campos que se relacionar a la id de seeion abierta, en esta caso lo que se 
         * solicita mostrar son los datos de materia y su contenido alumnos.
         */
        $item = "id_materia";
        $valor = $this->idMateriaP;

        $respuesta = ControladorHorarioA::ctrMostrarCalifAl($item, $valor);
        // var_dump($respuesta, json_encode($respuesta));
        echo json_encode($respuesta);
    }
    /*=============================================
    MOSTRAR ALUMNO DESDE TABLA ALUMNO
    =============================================*/

    public $idAlumnoCal;

    public function ajaxMostrarAlumnoC()
    {

        $item = "id";
        $valor = $this->idAlumnoCal;

        $respuesta = ControladorHorarioA::ctrMostrarAlumnoC($item, $valor);

        echo json_encode($respuesta);
    }
}
/**===================================
 * MOSTRAR ALUMNOS PARA CALIFICACIONES
 ===================================**/

if (isset($_POST["idMateriaP"])) {
    $mostrarMateriaP = new AjaxMostrarAlumnoCal();
    $mostrarMateriaP->idMateriaP = $_POST["idMateriaP"];
    $mostrarMateriaP->ajaxTraerMateriaP();
}
/*=============================================
  MOSTRAR ALUMNO DESDE TABLA ALUMNO
  =============================================*/
if (isset($_POST["idAlumnoCal"])) {

    $alumno = new AjaxMostrarAlumnoCal();
    $alumno->idAlumnoCal = $_POST["idAlumnoCal"];
    $alumno->ajaxMostrarAlumnoC();
}