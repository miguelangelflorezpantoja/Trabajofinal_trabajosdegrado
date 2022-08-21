<?php

class ControladorUsuarios
{
    /**===================================
     * MOSTRAR TOTAL USUARIOS
     ===================================**/
    static public function ctrMostrarTotalUsuarios($orden)
    {
        $tabla = "usuarios";
        $repuesta = ModeloUsuarios::mdlMostrarTotalUsuarios($tabla, $orden);

        return $repuesta;
    }
}