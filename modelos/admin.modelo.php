<?php
require_once "conexion.php";

class ModeloAdmin
{
    /**===================================
     * MOSTRAR ADMINISTRADORES  
     ===================================**/
    static public function mdlMostrarAdmin($tabla, $item, $valor)
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
	ACTIVAR ADMINISTRADOR Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarGrupo($tabla, $item1, $valor1, $item2, $valor2)
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
	REGISTRO DE ADMINISTRADOR
	=============================================*/

    static public function mdlIngresarAdmin($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (nombre,
            email,
            foto,
            estado,
            password,
            perfil
            ) VALUES
            (:nombre,
            :email,
            :foto,
            :estado,
            :password,
            :perfil)"
        );

        $stmt->bindParam(":nombre", $datos["regAdmin"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["regEmailAd"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["fotoAdmin"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["regPerfilAd"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * EDITAR ADMINSTRADORES
     ===================================**/
    static function mdlEditarAdmin($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla 
            SET
            nombre = :nombre,
            email = :email,
            foto = :foto,
            estado = :estado,
            password = :password,
            perfil = :perfil
            WHERE id = :id"
        );
        $stmt->bindParam(":nombre", $datos["regAdminE"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["regEmailAdE"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["fotoAdminE"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["regPasswordE"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["regPerfilAdE"], PDO::PARAM_STR);
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
	ELIMINAR ADMINISTRADORES
	=============================================*/

    static public function mdlEliminarAdmin($tabla, $datos)
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