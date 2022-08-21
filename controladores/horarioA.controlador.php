<?php
class ControladorHorarioA
{
    /**===================================
     * MOSTRAR HORARIO DE ALUMNOS
    ===================================**/
    static public function ctrMostrarHorarioA($item, $valor)
    {
        $tabla = "horario_al";
        $respuesta = ModeloHorarioA::mdlMostrarHorarioA($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR HORARIO ALUMNO
     ===================================**/

    static public function ctrMostrarHorAl($valor)
    {
        $tabla = "horario_al";
        $respuesta = ModeloHorarioA::mdlMostrarHorAl($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNOS PARA CALIFICACIONES
     ===================================**/
    static public function ctrMostrarCalifAl($item, $valor)
    {
        $tabla = "horario_al";
        $respuesta = ModeloHorarioA::mdlMostrarCalifAl($tabla, $item, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR DATOS PARA MATERIA PROFESOR
    ===================================**/
    static public function ctrMostrarClaseDAl($valor)
    {
        $tabla = "horario_al";
        $respuesta = ModeloHorarioA::mdlMostrarClaseDAl($tabla, $valor);

        return $respuesta;
    }
    /**===================================
     * MOSTRAR ALUMNO DESDE TABALA ALUMNO
     ===================================**/
    static public function ctrMostrarAlumnoC($item, $valor)
    {

        $tabla = "alumno";
        $respuesta = ModeloHorarioA::mdlMostrarAlumnoC($tabla, $item, $valor);

        return $respuesta;
    }
}