<div class="col-md-12 col-sm-12">
    <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tablaCalificacionesPA" width="100%">
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Tipo de nota</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["validarSesionBackend"])) {

                    $valor = $_SESSION["id"];
                    $mostrarC = ControladorCalificacion::ctrMostrarCalificacionPerAL($valor);
                    // var_dump($mostrarC);
                    foreach ($mostrarC as $key => $value) {
                        $item = "id";
                        $valor = $value["id_materia"];
                        $materia = ControladorMateria::ctrMostrarMateriaHor($item, $valor);
                        // var_dump($grupo);
                        echo ' <tr>
                          <td>' . ($key + 1) . '</td>
                              <td>' . $materia["nombre_materia"] . '</td>
                              <td><center>' . $value["primera_eval"] . '</center></td>';
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