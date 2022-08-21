<?php
require_once "conexion.php";

class ModeloCalificacion
{
    /**===================================
     * MOSTRAR CALIFICACIONES PARA VALIDAR EXISTENCIA
     ===================================**/
    static public function mdlMostrarCalificacion($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * MOSTRAR CALIFICACIONES PARA EDITAR
     ===================================**/
    static public function mdlMostrarCalificacionesE($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * MOSTRAR CALIFICACIONES
     ===================================**/
    static public function mdlMostrarCalificacionAl($tabla, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor ORDER BY id DESC");

        $stmt->bindParam(":id_profesor", $valor2, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /**===================================
     * MOSTRAR CALIFICACIONES DESACTIVAR
     ===================================**/
    static public function mdlMostrarCalificacionAlD($tabla, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT id_materia FROM $tabla WHERE id_profesor = :id_profesor ORDER BY id DESC");

        $stmt->bindParam(":id_profesor", $valor2, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /**===================================
     * MOSTRAR CALIFICACIONES
     ===================================**/
    static public function mdlMostrarCalificacionPerAL($tabla, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno ORDER BY id DESC");

        $stmt->bindParam(":id_alumno", $valor2, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    /**===================================
     * INGRESAR CALIFICACIONES 
     ===================================**/
    public static function mdlIgresarCalificacion($tabla, $datos)
    {
        // var_dump($value);
        $zero = 0;

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (
                id_materia,
                id_alumno,
                id_profesor,
                primera_eval)
                VALUES(
                :id_materia,
                :id_alumno,
                :id_profesor,
                :primera_eval)"
        );
        $stmt->bindParam(":id_materia", $datos["seleccionarMAlumno"], PDO::PARAM_INT);
        $stmt->bindParam(":id_alumno", $datos["selecAlumnoC"], PDO::PARAM_INT);
        $stmt->bindParam(":id_profesor", $datos["selecPA"], PDO::PARAM_INT);
        $stmt->bindParam(":primera_eval", $zero, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
        $stmt = null;
    }
    /**===================================
     * EDITAR CALIFICACIONES
     ===================================**/
    static public function mdlEditarCalificacion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            primera_eval = :primera_eval
            WHERE id = :id"
        );
        $stmt->bindParam(":primera_eval", $datos["primEval"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * ELIMINAR CALIFICACIONES
     ===================================**/
    static public function mdlEliminarCalificacion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}