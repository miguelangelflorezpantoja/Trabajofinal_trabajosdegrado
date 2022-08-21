<?php
require_once "conexion.php";

class ModeloProfesores
{
    /*=============================================
    MOSTRAR GÉNERO PROFESOR
    =============================================*/

    static public function mdlMostrarIdentidad($tabla, $item, $valor)
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
    /*=============================================
	ACTIVAR PROFESOR Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarProfesor($tabla, $item1, $valor1, $item2, $valor2)
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
	MOSTRAR PROFESORES
	=============================================*/

    static public function mdlMostrarProfesor($tabla, $item, $valor)
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
    /*=============================================
	MOSTRAR PROFESORES POR HORARIO
	=============================================*/

    static public function mdlMostrarProfesorH($tabla, $item, $valor)
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
    /*=============================================
	ELIMINAR PRODUCTO
	=============================================*/

    static public function mdlEliminarProducto($tabla, $datos)
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
     * CREAR ALUMNO
     ===================================**/
    static public function mdlIngresarProfesor($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (foto_ma,
            nombre_ma,
            apPaterno_ma,
            apMaterno_ma,
            estado,
            password,
            perfil_p,
            email_ma
            ) VALUES
            (:foto_ma,
            :nombre_ma,
            :apPaterno_ma,
            :apMaterno_ma,
            :estado,
            :password,
            :perfil_p,
            :email_ma)"
        );

        $stmt->bindParam(":foto_ma", $datos["fotoP"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_ma", $datos["nombreP"], PDO::PARAM_STR);
        $stmt->bindParam(":apPaterno_ma", $datos["apellidoPaternoP"], PDO::PARAM_STR);
        $stmt->bindParam(":apMaterno_ma", $datos["apellidoMaternoP"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil_p", $datos["perfil_p"], PDO::PARAM_STR);
        $stmt->bindParam(":email_ma", $datos["emailP"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * EDITAR PROFESOR
     ===================================**/
    static public function  mdlEditarProfesor($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla
                SET
                foto_ma = :foto_ma,
                nombre_ma = :nombre_ma,
                apPaterno_ma = :apPaterno_ma,
                apMaterno_ma = :apMaterno_ma,
                password = :password,
                perfil_p = :perfil_p,
                email_ma = :email_ma
                WHERE id = :id"
        );

        $stmt->bindParam(":foto_ma", $datos["fotoPEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_ma", $datos["nombrePEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":apPaterno_ma", $datos["apellidoPaternoPEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":apMaterno_ma", $datos["apellidoMaternoPEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["regPasswordPE"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil_p", $datos["perfil_p"], PDO::PARAM_STR);
        $stmt->bindParam(":email_ma", $datos["emailPEdit"], PDO::PARAM_STR);
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
	ELIMINAR PROFESOR
	=============================================*/

    static public function mdlEliminarProfesor($tabla, $datos)
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