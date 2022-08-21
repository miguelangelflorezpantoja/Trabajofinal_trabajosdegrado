<?php
require_once "conexion.php";

class ModeloAlumno
{
    /*=============================================
    MOSTRAR GÉMERO ALUMNO
    =============================================*/

    static public  function mdlMostrarIdentidad($tabla, $item, $valor)
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
	MOSTRAR ALUMNO
	=============================================*/

    static public function mdlMostrarAlumno($tabla, $item, $valor)
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
	MOSTRAR CONCEPTO DE PAGOS
	=============================================*/
    static public function mdlMostrarPagosAlumno($tabla, $item, $valor)
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
	MOSTRAR PAGOS
	=============================================*/
    static public function mdlMostrarPgosPDF($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id ASC");


            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	MOSTRAR DOCUMENTOS DE ALUMNO (VALIDACION)
	=============================================*/

    static public function mdlMostrarAlumnoDocAlumno($tabla, $item, $valor)
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
	MOSTRAR DOCUMENTOS
	=============================================*/

    static public function mdlMostrarAlumnoDoc($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno ORDER BY id DESC");

        $stmt->bindParam(":id_alumno", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	MOSTRAR PAGOS
	=============================================*/

    static public function mdlMostrarPagos($tabla, $valor)
    {

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_alumno = :id_alumno ORDER BY id DESC");

        $stmt->bindParam(":id_alumno", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	MOSTRAR PAGOS
	=============================================*/

    static public function mdlMostrarAlumnosEdit($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id ORDER BY id DESC");

        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }
    /*=============================================
	MOSTRAR ALUMNO EDICIÓN DOCUMENTO
	=============================================*/

    static public function mdlMostrarAlumnoDocE($tabla, $item, $valor)
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
	MOSTRAR ALUMNO PARA CLASES
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
    /*=============================================
	MOSTRAR DOCUMENTOS ALUMNO ADMINISTRADOR
	=============================================*/
    static public function mdlMostrarAlumnoDocT($tabla, $item, $valor)
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
	ACTIVAR ALUMNO Y ACTUALIZAR
	=============================================*/
    static public function mdlActualizarAlumno($tabla, $item1, $valor1, $item2, $valor2)
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
	ACTIVAR DOCUMENTOS
	=============================================*/
    static public function mdlActualizarDocumentos($tabla, $item1, $valor1, $item2, $valor2)
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
	ACTIVAR UNIFORMES PARA HOMBRES
	=============================================*/
    static public function mdlActualizarAlumnoUH($tabla, $item1, $valor1, $item2, $valor2)
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
	ACTIVAR UNIFORMES PARA MUJER
	=============================================*/
    static public function mdlActualizarAlumnoUM($tabla, $item1, $valor1, $item2, $valor2)
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
     * CREAR ALUMNO
     ===================================**/
    static public function mdlIngresarAlumno($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (matricula_al,
            foto_al,
            nombre_al,
            apellidoPaterno_al,
            apellidoMaterno_al,
            estado,
            password,
            perfil_al,
            email_al
            ) VALUES
            (:matricula_al,
            :foto_al,
            :nombre_al,
            :apellidoPaterno_al,
            :apellidoMaterno_al,
            :estado,
            :password,
            :perfil_al,
            :email_al)"
        );


        $stmt->bindParam(":matricula_al", $datos["matricula"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_al", $datos["fotoAl"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_al", $datos["nombreAl"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoPaterno_al", $datos["apellidoPaternoAl"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoMaterno_al", $datos["apellidoMaternoAl"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil_al", $datos["perfil_al"], PDO::PARAM_STR);
        $stmt->bindParam(":email_al", $datos["emailAl"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * REGISTRO ALUMNO
     ===================================**/
    static public function mdlRegistrarAlumno($tabla, $datosRegistro)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla
            (foto_al,
            nombre_al,
            apellidoPaterno_al,
            apellidoMaterno_al,
            estado,
            password,
            perfil_al,
            email_al
            ) VALUES
            (:foto_al,
            :nombre_al,
            :apellidoPaterno_al,
            :apellidoMaterno_al,
            :estado,
            :password,
            :perfil_al,
            :email_al)"
        );
        $stmt->bindParam(":foto_al", $datosRegistro["fotoalumno"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_al", $datosRegistro["nombreAl"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoPaterno_al", $datosRegistro["apellidoPaternoAl"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoMaterno_al", $datosRegistro["apellidoMaternoAl"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datosRegistro["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":password", $datosRegistro["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil_al", $datosRegistro["perfil_al"], PDO::PARAM_STR);
        $stmt->bindParam(":email_al", $datosRegistro["emailAl"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * EDITAR ALUMNO
     ===================================**/
    static public function  mdlEditarAlumno($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla
                SET
                matricula_al = :matricula_al,
                foto_al = :foto_al,
                nombre_al = :nombre_al,
                apellidoPaterno_al = :apellidoPaterno_al,
                apellidoMaterno_al = :apellidoMaterno_al,
                password = :password,
                email_al = :email_al
                WHERE id = :id"
        );
        $stmt->bindParam(":matricula_al", $datos["matriculaEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_al", $datos["fotoAlEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_al", $datos["nombreAlEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoPaterno_al", $datos["apellidoPaternoAlEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoMaterno_al", $datos["apellidoMaternoAlEdit"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["regPasswordAE"], PDO::PARAM_STR);
        $stmt->bindParam(":email_al", $datos["emailAlEdit"], PDO::PARAM_STR);
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
	ELIMINAR AlUMNO
	=============================================*/

    static public function mdlEliminarAlumno($tabla, $datos)
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
     * INGRESAR DATOS DE DOCUMENTACIÓN
     ===================================**/
    static public function mdlIngresoDocumentosAlumno($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
            (id_alumno,
            documentos,
            estado)
            VALUES
            (:id_alumno,
            :documentos,
            :estado)"
        );
        $stmt->bindParam(":id_alumno", $datos["idAalumnoD"], PDO::PARAM_INT);
        $stmt->bindParam(":documentos", $datos["documentos"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * EDITAR DOCUMENTOS DE ALUMNO
     ===================================**/
    static public function mdlEditDocumentosAlumno($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare(
            "UPDATE $tabla 
            SET
            id_alumno = :id_alumno,
            documentos = :documentos,
            estado = :estado
            WHERE id = :id"
        );
        $stmt->bindParam(":id_alumno", $datos["idAalumnoDoc"], PDO::PARAM_INT);
        $stmt->bindParam(":documentos", $datos["documentos"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    /**===================================
     * ELIMINAR DOCUMENTOS PDF
     ===================================**/
    public function mdlEliminarDocPDF($tabla, $datos)
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
     * GAURDAR DATOS DE PAGOS
     ===================================**/
    static public function mdlIngresarPago($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla 
            (id_alumno,
            id_semestre,
            pago,
            totalPago)
            VALUES
            (:id_alumno,
            :id_semestre,
            :pago,
            :totalPago)"
        );

        $stmt->bindParam(":id_alumno", $datos["idAlumno"], PDO::PARAM_INT);
        $stmt->bindParam(":id_semestre", $datos["seleccionarCategoria"], PDO::PARAM_INT);
        $stmt->bindParam(":pago", $datos["pago"], PDO::PARAM_STR);
        $stmt->bindParam(":totalPago", $datos["totalPago"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
}