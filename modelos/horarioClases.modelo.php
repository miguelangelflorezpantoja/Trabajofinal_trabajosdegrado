<?php
require_once "conexion.php";

class ModeloHorarioC
{
    /**===================================
     * MOSTRAR HORARIO DE CLASES
     ===================================**/
    static public function mdlMostrarHorarioC($tabla, $item, $valor)
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
     * MOSTRAR HORARIO DE CLASES vALIDACIÓN
     ===================================**/
    static public function mdlMostrarClasesMG($tabla, $item, $item1, $valor, $valor1)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item1 = :$item1");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
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
     * MOSTRAR CLASES PARA HORARIO ALUMNOS
     ===================================**/
    static public function mdlMostrarClaseCA($tabla, $item, $valor)
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
     * MOSTRAR MATERIA PARA CLASES
     ===================================**/
    static public function mdlMostrarMateriaC($tabla, $item, $valor)
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
     * MOSTRAR CLASE PARA ALUMNO
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
     * MOSTRAR DATOS PARA PROFESOR
     ===================================**/
    static public function mdlMostrarHorarioDP($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_profesor = :id_profesor ORDER BY id DESC");

        $stmt->bindParam(":id_profesor", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
	ACTIVAR HORARIO CLASE Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarHorarioC($tabla, $item1, $valor1, $item2, $valor2)
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
    /*=============================================
	ACTIVAR HORARIO CLASE Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarHorarioA($tabla, $item1, $valor1, $item2, $valor2)
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
    /**=================================================================
     * MOSTRAR VALIDACIÓN DE DATOS NO REPETIDOS PARA CPASE ALUMNO
     ===================================================================*/
    static public function mdlMostrarValD($tabla, $item1, $valor1, $item2, $valor2)
    {

        if ($item1 != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item1 = :$item1 AND $item2 = :$item2");
            $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);
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
     * GUARDAR DATOS HORARIO DE CLASE
     ===================================**/
    static public function mdlIngresarHorarioC($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla (
            id_materia,
            id_grupo,
            id_profesor,
            estado,
            dia,
            horaInicio,
            horaFinal
            ) VALUES
            (:id_materia,
            :id_grupo,
            :id_profesor,
            :estado,
            :dia,
            :horaInicio,
            :horaFinal)"
        );

        $stmt->bindParam(":id_materia", $datos["seleccionarMateria"], PDO::PARAM_INT);
        $stmt->bindParam(":id_grupo", $datos["seleccionarGrupo"], PDO::PARAM_INT);
        $stmt->bindParam(":id_profesor", $datos["selecProfesor"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":dia", $datos["seleccionarDia"], PDO::PARAM_STR);
        $stmt->bindParam(":horaInicio", $datos["regHoraInicial"], PDO::PARAM_STR);
        $stmt->bindParam(":horaFinal", $datos["regHoraFinal"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * EDITAR HORARIO DE CLASES
     ===================================**/
    static public function mdlEditarHorarioC($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla SET
            id_materia = :id_materia,
            id_grupo = :id_grupo,
            id_profesor = :id_profesor,
            estado = :estado,
            dia = :dia,
            horaInicio = :horaInicio,
            horaFinal = :horaFinal
            WHERE id = :id"
        );
        $stmt->bindParam(":id_materia", $datos["seleccionarMateriaE"], PDO::PARAM_INT);
        $stmt->bindParam(":id_grupo", $datos["seleccionarGrupoE"], PDO::PARAM_INT);
        $stmt->bindParam(":id_profesor", $datos["selecProfesorE"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":dia", $datos["seleccionarDiaE"], PDO::PARAM_STR);
        $stmt->bindParam(":horaInicio", $datos["regHoraInicialE"], PDO::PARAM_STR);
        $stmt->bindParam(":horaFinal", $datos["regHoraFinalE"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	ELIMINAR HOARIO DE LA CLASE
	=============================================*/

    static public function mdlEliminarHoarioC($tabla, $datos)
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
    /**===================================
     * CREAR HORARIO DE CLASES ALUMNOS
     ===================================**/
    static public function mdlIngresarHorarioCA($tabla, $datos)
    {
        // var_dump($datos, json_encode($datos));
        // return $datos;
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (id_alumno,
            id_materia,
            id_grupo,
            id_profesor,
            estado,
            dia,
            horaInicio,
            horaFinal
            ) VALUES
            (:id_alumno,
            :id_materia,
            :id_grupo,
            :id_profesor,
            :estado,
            :dia,
            :horaInicio,
            :horaFinal)"
        );

        $stmt->bindParam(":id_alumno", $datos["selecAlumnoC"], PDO::PARAM_INT);
        $stmt->bindParam(":id_materia", $datos["seleccionarMAlumno"], PDO::PARAM_INT);
        $stmt->bindParam(":id_grupo", $datos["seleccionarGrupoA"], PDO::PARAM_INT);
        $stmt->bindParam(":id_profesor", $datos["selecPA"], PDO::PARAM_INT);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":dia", $datos["seleccionarDA"], PDO::PARAM_STR);
        $stmt->bindParam(":horaInicio", $datos["regHoraIA"], PDO::PARAM_STR);
        $stmt->bindParam(":horaFinal", $datos["regHoraFA"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	ELIMINAR HOARIO DEL ALUMNO
	=============================================*/

    static public function mdlEliminarHorarioA($tabla, $datos)
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