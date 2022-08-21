<div class="box box-shadow-content">
    <div class="box-header with-border">
        <button class="btn1 btn-danger">Tus materias con alumnos</button>
    </div>
    <div class="box-body">
        <?php
        if (isset($_SESSION["validarSesionBackend"])) {

            $valor = $_SESSION["id"];
            $mostrarG = ControladorHorarioA::ctrMostrarClaseDAl($valor);
            // var_dump($horarioA);
            if (!$mostrarG) {
                echo '<div class="alert alert-info"><center><h4>No tienes grupos con alumnos</h4></center></div>';
            } else {
                foreach ($mostrarG as $key => $value) {
                    /**===================================
                     * TRAER MATERIA
                 ===================================**/
                    //  Para mostrar los valores que pertenecen a un campo materia, en el botón se envía la id foránea
                    // como en este caso el campo id_materia, no se envía la id de la tabla horario_al, porque al hacerlo  como esta opción
                    // se mostrará un error. En el modelo se hará la consulta con el distinct para globalizar los id_materia que coinciden, sucesivamente 
                    // al dar click en el botón, se mostrará en un array los id_alumno que coinciden con el id_materia. 
                    /**Nota: en el archivo mostrarAlumnoC.ajax.php tambien se coloca el id_materia, no el id de la tabla general. */
                    $item = "id";
                    $valor = $value["id_materia"];
                    $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
                    // var_dump($materia);
                    // echo '<button type="button" class="btn4 btn-primary btnIngresarCal" idAlumnoCal="' . $value["id_materia"] . '" data-toggle="modal" data-target="#modalAlumnoCal">' . $materia["nombre_materia"] . '</button>';
                    echo '<button type="button" class="btn4 btn-primary">' . $materia["nombre_materia"] . '</button>';
                }
            }
        }
        ?>
    </div>
</div>