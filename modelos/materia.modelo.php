<?php
require_once "conexion.php";

class ModeloMateria
{
    /**===================================
     * MOSTRAR MATERIA
     ===================================**/
    static public function mdlMostrarMateria($tabla, $item, $valor)
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
     * MOSTRAR MATERIA ORDENADA POR NOMBRE
     ===================================**/
    static public function mdlMostrarMateriaOrden($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre_materia ASC");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }
    /**===================================
     * MOSTRAR MATERIA POR SEMESTRE
     ===================================**/
    static public function mdlMostrarSemestreM($tabla, $item, $valor)
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
     * MOSTRAR MATERIA PARA HORARIO
     ===================================**/
    static public function mdlMostrarMateriaHor($tabla, $item, $valor)
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
     * MOSTRAR MATERIA PARA HORARIO (SEMESTRE)
     ===================================**/
    static public function mdlMostrarMateriaHorSem($tabla, $item1, $valor1)
    {

        if ($item1 != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1");
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
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
     * MOSTRAR MATERIA PARA HORARIO (SEMESTRE)
     ===================================**/
    static public function mdlMostrarMateriaHorSemA($tabla, $item1, $valor1)
    {

        if ($item1 != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1");
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
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
    /*=============================================
	ACTIVAR MATERIA Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarMateria($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * INGRESAR MATERIA
     ===================================**/
    static function mdlIngresarMateria($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
             (clave_materia,
             id_semestre,
            estado,
            nombre_materia
            ) VALUES
            (:clave_materia,
            :id_semestre,
            :estado,
            :nombre_materia)"
        );
        $stmt->bindParam(":clave_materia", $datos["regClave"], PDO::PARAM_STR);
        $stmt->bindParam(":id_semestre", $datos["semestre"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_materia", $datos["regMat"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * INGRESAR MATERIA
     ===================================**/
    static function mdlEditarMateria($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla
            SET
            clave_materia = :clave_materia,
            estado = :estado,
            nombre_materia = :nombre_materia,
            id_semestre = :id_semestre
            WHERE id = :id"
        );
        $stmt->bindParam(":clave_materia", $datos["regClaveE"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre_materia", $datos["regMatE"], PDO::PARAM_STR);
        $stmt->bindParam(":id_semestre", $datos["semestreE"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	ELIMINAR MATERIA
	=============================================*/

    static public function mdlEliminarMateria($tabla, $datos)
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