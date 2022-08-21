<?php
require_once "conexion.php";

class ModeloHorarioA
{
    /**===================================
     * MOSTRAR HORARIO DE ALUMNOS
     ===================================**/
    static public function mdlMostrarHorarioA($tabla, $item, $valor)
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
     * MOSTRAR DATOS PARA ALUMNO
     ===================================**/
    static public function mdlMostrarHorAl($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno ORDER BY id DESC");

        $stmt->bindParam(":id_alumno", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /**===================================
     * MOSTRAR HORARIO DE ALUMNOS
     ===================================**/
    static public function mdlMostrarCalifAl($tabla, $item, $valor)
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
     * MOSTRAR DATOS PARA PROFESOR
     ===================================**/
    static public function mdlMostrarClaseDAl($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT DISTINCT id_materia FROM $tabla WHERE id_profesor = :id_profesor ORDER BY id DESC");

        $stmt->bindParam(":id_profesor", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    MOSTRAR GÉMERO ALUMNO
    =============================================*/

    static public function mdlMostrarAlumnoC($tabla, $item, $valor)
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
}