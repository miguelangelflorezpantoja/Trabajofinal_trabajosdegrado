<div class="col-md-12 col-sm-12">
    <div class="box-body">
        <a href="vistas/modulos/reportes.php?reporteal=horario_al">
            <button class="btn2 btn-danger" data-toggle="tooltip" data-placement="top" title="Imprimir horario">Horario
                <i class="fas fa-file-excel"></i></button>
        </a>
        <table class="table table-bordered table-hover table-striped dt-responsive tablaHorarioAlumnoP" width="100%">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Materia</th>
                    <th>Grupo</th>
                    <th>Semestre</th>
                    <th>Día</th>
                    <th>Hora inicio</th>
                    <th>Hora final</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["validarSesionBackend"])) {

                    $valor = $_SESSION["id"];
                    $mostrarA = ControladorHorarioA::ctrMostrarHorAl($valor);

                    foreach ($mostrarA as $key => $value) {
                        $item = "id";
                        $valor = $value["id_materia"];
                        $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
                        // var_dump($grupo);
                        /**===================================
                         * TRAER MATERIA EN RELACIÓN A CLASE (SEMESTRE)
                        ===================================**/
                        $item1 = "id";
                        $valor1 = $value["id_materia"];
                        $materiaSem = ControladorMateria::ctrMostrarMateriaHorSem($item1, $valor1);
                        foreach ($materiaSem as $key => $value1) {
                            /**===================================
                             * TRAER SEMESTRE
                            ===================================**/
                            $item = "id";
                            $valor = $value1["id_semestre"];
                            $detalleSem = ControladorGruSem::ctrMostrarGruSem($item, $valor);

                            $semestre = $detalleSem["semestre"];
                        }
                        $item = "id";
                        $valor = $value["id_grupo"];
                        $grupo = ControladorUbicacion::ctrMostrarGrupoAula($item, $valor);

                        echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                              <td>' . $materia["nombre_materia"] . '</td>
                              <td>' . $grupo["nombre_g"] . '</td>
                              <td>' . $semestre . '</td>
                              <td>' . $value["dia"] . '</td>
                              <td>' . $value["horaInicio"] . '</td>
                              <td>' . $value["horaFinal"] . '</td>';

                        echo '
                      </tr>';
                    }
                }
                ?>
            </tbody>
            <!-- Se trae desde js -->
        </table>
    </div>
</div>