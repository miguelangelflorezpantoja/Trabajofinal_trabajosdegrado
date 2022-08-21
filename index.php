<?php
ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log", "C:/xampp8/htdocs/adminescuela/php_error_log");

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/alumno.controlador.php";
require_once "controladores/profesor.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/admin.controlador.php";
require_once "controladores/materia.controlador.php";
require_once "controladores/detalleSemestre.controlador.php";
require_once "controladores/horarioClases.controlador.php";
require_once "controladores/calificacion.controlador.php";
require_once "controladores/horarioA.controlador.php";


require_once "modelos/administradores.modelo.php";
require_once "modelos/alumno.modelo.php";
require_once "modelos/profesor.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/admin.modelo.php";
require_once "modelos/materia.modelo.php";
require_once "modelos/detalleSemestre.modelo.php";
require_once "modelos/horarioClases.modelo.php";
require_once "modelos/calificacion.modelo.php";
require_once "modelos/horarioA.modelo.php";




$plantilla = new ControladorPlantilla();
$plantilla->plantilla();