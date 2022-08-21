/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - adminescuela
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`adminescuela` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `adminescuela`;

/*Table structure for table `administradores` */

DROP TABLE IF EXISTS `administradores`;

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `password` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta_admin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `administradores` */

insert  into `administradores`(`id`,`nombre`,`email`,`foto`,`estado`,`password`,`perfil`,`fechaAlta_admin`) values 
(1,'Miguel ','miguel@gmail.com','vistas/img/admin/admin1/554.jpg',1,'$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','admin','2022-08-21 13:38:27');

/*Table structure for table `alumno` */

DROP TABLE IF EXISTS `alumno`;

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidoPaterno_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidoMaterno_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `password` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_al` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta_al` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `alumno` */

insert  into `alumno`(`id`,`matricula_al`,`foto_al`,`nombre_al`,`apellidoPaterno_al`,`apellidoMaterno_al`,`estado`,`password`,`perfil_al`,`email_al`,`fechaAlta_al`) values 
(1,'','vistas/img/alumno/alumno1/937.png','Alberto','Sanchez','Sanchez',1,'$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','alumno','alberto@gmail.com','2022-08-15 12:37:50');

/*Table structure for table `calificacion` */

DROP TABLE IF EXISTS `calificacion`;

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `primera_eval` float DEFAULT NULL,
  `fechaAlta_cal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `calificacion` */

insert  into `calificacion`(`id`,`id_materia`,`id_alumno`,`id_profesor`,`primera_eval`,`fechaAlta_cal`) values 
(3,1,1,1,0,'2022-08-21 11:56:01');

/*Table structure for table `documentacion` */

DROP TABLE IF EXISTS `documentacion`;

CREATE TABLE `documentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `documentos` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechaAlta_doc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `documentacion` */

/*Table structure for table `horario_al` */

DROP TABLE IF EXISTS `horario_al`;

CREATE TABLE `horario_al` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `dia` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFinal` time DEFAULT NULL,
  `fechaAltaA_cla` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `horario_al` */

insert  into `horario_al`(`id`,`id_alumno`,`id_materia`,`id_grupo`,`id_profesor`,`estado`,`dia`,`horaInicio`,`horaFinal`,`fechaAltaA_cla`) values 
(3,1,1,14,1,1,'MARTES','07:00:00','08:00:00','2022-08-21 10:50:35'),
(5,1,1,14,1,1,'MARTES','07:00:00','08:00:00','2022-08-21 10:53:16'),
(7,1,1,NULL,2,1,NULL,NULL,NULL,'2022-08-21 12:16:33'),
(8,1,1,NULL,2,1,NULL,NULL,NULL,'2022-08-21 12:16:51');

/*Table structure for table `horario_p` */

DROP TABLE IF EXISTS `horario_p`;

CREATE TABLE `horario_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id_profesor` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechaAlta_hop` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `horario_p` */

insert  into `horario_p`(`id`,`id_materia`,`id_profesor`,`estado`,`fechaAlta_hop`) values 
(9,1,1,1,'2022-08-21 10:52:00'),
(10,1,1,1,'2022-08-21 10:52:06'),
(11,1,2,1,'2022-08-21 12:16:11');

/*Table structure for table `materia` */

DROP TABLE IF EXISTS `materia`;

CREATE TABLE `materia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_materia` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nombre_materia` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta_mat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `materia` */

insert  into `materia`(`id`,`clave_materia`,`estado`,`nombre_materia`,`fechaAlta_mat`) values 
(1,'NG',1,'NOTA DE GRADO','2022-08-21 10:24:57');

/*Table structure for table `profesor` */

DROP TABLE IF EXISTS `profesor`;

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto_ma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_ma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `apPaterno_ma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `apMaterno_ma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `password` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil_p` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_ma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta_ma` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `profesor` */

insert  into `profesor`(`id`,`foto_ma`,`nombre_ma`,`apPaterno_ma`,`apMaterno_ma`,`estado`,`password`,`perfil_p`,`email_ma`,`fechaAlta_ma`) values 
(1,'vistas/img/profesor/profesor1/222.jpg','Martín','santos','santos',1,'$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','profesor','martin@gmail.com','2022-08-15 13:21:30'),
(2,'vistas/img/profesor/profesor1/411.jpg','Sebastián','Méndez','Méndez',1,'$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy','profesor','sebas@gmail.com','2022-08-21 12:48:49');

/* Procedure structure for procedure `SP_LISTAR_COMBO_DEPARTAMENTO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_LISTAR_COMBO_DEPARTAMENTO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_DEPARTAMENTO`(IN `ID_TIPODIRECCION` INT)
SELECT * FROM tipodepartamento WHERE Id_TipoDireccion = ID_TIPODIRECCION */$$
DELIMITER ;

/* Procedure structure for procedure `SP_LISTAR_COMBO_DIRECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_LISTAR_COMBO_DIRECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_DIRECCION`()
SELECT * FROM tipodireccion */$$
DELIMITER ;

/* Procedure structure for procedure `SP_LISTAR_COMBO_ROL` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_LISTAR_COMBO_ROL` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_ROL`()
SELECT 
roles.Id_Rol,
roles.Roles
FROM
roles */$$
DELIMITER ;

/* Procedure structure for procedure `SP_LISTAR_COMBO_SECCION` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_LISTAR_COMBO_SECCION` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_COMBO_SECCION`(IN `ID_TIPODEPARTAMENTO` INT)
SELECT * FROM tiposeccion WHERE Id_TipoDepartamento = ID_TIPODEPARTAMENTO */$$
DELIMITER ;

/* Procedure structure for procedure `SP_LISTAR_USUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_LISTAR_USUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_LISTAR_USUARIO`()
BEGIN
DECLARE CANTIDAD int;
SET @CANTIDAD:=0;
SELECT
@CANTIDAD:=@CANTIDAD+1 AS posicion,
personas.Id_Persona,
personas.Nombre,
personas.Usuario,
personas.Correo,
personas.sexo,
personas.Id_Rol,
personas.Estado,
roles.Roles
FROM
personas
INNER JOIN roles ON personas.Id_Rol = roles.Id_Rol;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_MODIFICAR_ESTADO_USUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_MODIFICAR_ESTADO_USUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MODIFICAR_ESTADO_USUARIO`(IN `IDUSUARIO` INT, IN `ESTATUS` VARCHAR(20))
UPDATE personas SET 
Estado = ESTATUS
WHERE Id_Persona = IDUSUARIO */$$
DELIMITER ;

/* Procedure structure for procedure `SP_REGISTRAR_USUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_REGISTRAR_USUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_REGISTRAR_USUARIO`(IN `NOMBRE` VARCHAR(150), IN `PUSUARIO` VARCHAR(50), IN `CONTRA` VARCHAR(250), IN `CORREO` VARCHAR(150), IN `SEXO` CHAR(1), IN `ROL` INT)
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM personas WHERE Usuario = BINARY PUSUARIO);
IF @CANTIDAD=0 THEN 
INSERT INTO personas(
    Nombre,
    Usuario,
    Clave,
    Correo,
    sexo,
    Id_Rol,
    Estado)
VALUES
    (NOMBRE,
    PUSUARIO,
    CONTRA,
    CORREO,
    SEXO,
    ROL,
    'ACTIVO');
    SELECT 1;
ELSE
    SELECT 2;
END IF;
END */$$
DELIMITER ;

/* Procedure structure for procedure `SP_VERIFICAR_USUARIO` */

/*!50003 DROP PROCEDURE IF EXISTS  `SP_VERIFICAR_USUARIO` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VERIFICAR_USUARIO`(IN `USUARIO` VARCHAR(50))
SELECT 
personas.Id_Persona,
personas.Nombre,
personas.Usuario,
personas.Clave,
personas.Correo,
personas.sexo,
personas.Estado,
roles.Roles
FROM 
personas
INNER JOIN roles ON personas.Id_Rol = roles.Id_Rol
WHERE Usuario = BINARY USUARIO */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
