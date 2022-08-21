<?php
class ControladorGruSem
{
    /**===================================
     * MOSTRAR SEMESTRES
     ===================================**/
    static public function ctrMostrarGruSem($item, $valor)
    {

        $tabla = "detalle_semestre";
        $respuesta = ModeloGruSem::mdlMostrarGruSem($tabla, $item, $valor);

        return $respuesta;
    }
}