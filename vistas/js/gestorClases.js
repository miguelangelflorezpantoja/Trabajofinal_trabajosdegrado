/**===================================
 * =========Horario para clases====================
 ===================================*/

/**===================================
 * CARGAR TABLA DINÁMICA PARA CLASES
 ===================================*/
// $.ajax({

//     url: "ajax/tablaHorClases.ajax.php",
//     success: function (respuesta) {
//         // Sólo se descomenta para mostrar errores.
//         console.log("respuesta", respuesta);

//     }
// })

/**Se usan para una carga rápida de datos.
 * "deferRender": true,
     "retrieve": true,
     "processing": true,

 */
$(".tablaHorarioC").DataTable({
    "ajax": "ajax/tablaHorClases.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    },
    //para usar los botones   
    responsive: "true"
});
$("#modalAgregarGrupo").change(function () {
    $("#modalAgregarGrupo").html("");
})

/**===================================
 * ACTIVAR GRUPO
 ===================================*/
$(document).on("click", ".btnActivarHorarioC", function () {

    const idHorarioC = $(this).attr("idHorarioC");
    // console.log("idHorarioP ", idHorarioP);
    const estadoHorarioC = $(this).attr("estadoHorarioC");
    // console.log("estadoHorarioP ", estadoHorarioP);

    const datos = new FormData();
    datos.append("activarIdHoC", idHorarioC);
    datos.append("activarHorarioC", estadoHorarioC);

    $.ajax({

        url: "ajax/horarioC.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta", respuesta);

        }

    });

    if (estadoHorarioC == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoHorarioC', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoHorarioC', 0);

    }

})
/**--------Fin activar grupo */

/**===================================
 * VALIDACIONES DE GRUPO MATERIA
 ===================================*/
// $(".validarMateriaC").change(function () {
//     /**----Limpiar el alert de validacion al posicionar el focus en el input.*/
//     $("select").focus(function () {
//         $(".alert").remove();

//     });
//     // $(".alert").remove();

//     let materia = $(this).val();
//     // console.log("materia ", materia);

//     const datos = new FormData();
//     datos.append("validarMateria", materia);

//     $.ajax({
//         url: "ajax/horarioC.ajax.php",
//         method: "POST",
//         data: datos,
//         cache: false,
//         contentType: false,
//         processData: false,
//         dataType: "json",
//         success: function (respuesta) {
//             // console.log("respuesta", respuesta);

//             if (respuesta.length != 0) {

//                 $(".validarMateriaC").parent().after('<div class="alert alert-warning">La materia y el grupo ya están asignados.</div>');
//                 $(".validarMateriaC").val("");
//             }
//         }
//     })
// })
/*=============================================
EDITAR HORARIO DE CLASES
=============================================*/
$('.tablaHorarioC tbody').on("click", ".btnEditarHorarioC", function () {

    const idHorarioC = $(this).attr("idHorarioC");

    const datos = new FormData();
    datos.append("idHorarioC", idHorarioC);

    $.ajax({
        url: "ajax/horarioC.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            /**===================================
             * TRAER DATOS
             ===================================*/

            $("#modalEditarHorariorC .idHorarioC").val(respuesta[0]["id"]);

            /*=============================================
            TRAEMOS MATERIA
            =============================================*/

            if (respuesta[0]["id_materia"] != 0) {

                const datosMateria = new FormData();
                datosMateria.append("materia", respuesta[0]["id_materia"]);

                $.ajax({
                    url: "ajax/horarioC.ajax.php",
                    method: "POST",
                    data: datosMateria,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        // console.log("respuesta ", respuesta);

                        $("#modalEditarHorariorC .seleccionarMateria").val(respuesta["id"]);
                        $("#modalEditarHorariorC .optionEditarMateriaC").html(respuesta["nombre_materia"]);

                    }
                })
            } else {

                $("#modalEditarHorariorC .optionEditarMateriaC").html("SIN MATERIA");
            }
            /*=============================================
            TRAEMOS GRUPO
            =============================================*/

            if (respuesta[0]["id_grupo"] != 0) {

                const datosAula = new FormData();
                datosAula.append("grupo", respuesta[0]["id_grupo"]);

                $.ajax({
                    url: "ajax/ubicacion.ajax.php",
                    method: "POST",
                    data: datosAula,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        //  console.log("respuesta ", respuesta);

                        $("#modalEditarHorariorC .seleccionarGrupo").val(respuesta["id"]);
                        $("#modalEditarHorariorC .optionEditarGrupoC").html(respuesta["nombre_g"]);

                    }
                })
            } else {

                $("#modalEditarHorariorC .optionEditarGrupoC").html("SIN MATERIA");
            }
            /**===================================
             * TRAER DÍA
             ===================================*/

            if (respuesta[0]["dia"] != 0) {
                $("#modalEditarHorariorC .seleccionarDia").val(respuesta[0]["dia"]);
            } else {
                $("#modalEditarHorariorC .optionEditarDia").html("SIN GRUPO");
            }
            /**===================================
             * TRAER MAESTRO
             ===================================*/
            if (respuesta[0]["id_profesor"] != 0) {

                const datosProfesor = new FormData();
                // console.log("datosProfesor", datosProfesor);
                datosProfesor.append("profesorE", respuesta[0]["id_profesor"]);

                $.ajax({
                    url: "ajax/profesor.ajax.php",
                    method: "POST",
                    data: datosProfesor,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        // console.log("respuesta ", respuesta);
                        /**Se coloca la función select2() para asociar el id a editar */
                        $("#modalEditarHorariorC .selecProfesor").val(respuesta["id"]).select2();
                        $("#modalEditarHorariorC .optionEditarProfesor").html(respuesta["nombre_ma"] + " " + respuesta["apPaterno_ma"] + " " + respuesta["apMaterno_ma"]);

                    }
                })
            } else {

                $("#modalEditarHorariorC .optionEditarProfesor").html("SIN MAESTRO");
            }
            /**===================================
             * TRAER HORA
             ===================================*/
            $("#modalEditarHorariorC #regHoraInicialE").val(respuesta[0]["horaInicio"]);
            $("#modalEditarHorariorC #regHoraFinalE").val(respuesta[0]["horaFinal"]);
        }
    })
})
/*=============================================
EDITAR HORARIO DE CLASES PARA ALUMNOS
=============================================*/
$('.tablaHorarioC tbody').on("click", ".btnEditarHorarioCA", function () {

    const idHorarioC = $(this).attr("idHorarioC");

    const datos = new FormData();
    datos.append("idHorarioC", idHorarioC);

    $.ajax({
        url: "ajax/horarioC.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            /**===================================
             * TRAER DATOS
             ===================================*/

            $("#modalEditarHorariorCA .idHorarioC").val(respuesta[0]["id"]);

            /*=============================================
            TRAEMOS MATERIA
            =============================================*/

            if (respuesta[0]["id_materia"] != 0) {

                const datosMateria = new FormData();
                datosMateria.append("materia", respuesta[0]["id_materia"]);

                $.ajax({
                    url: "ajax/horarioC.ajax.php",
                    method: "POST",
                    data: datosMateria,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        // console.log("respuesta ", respuesta);

                        $("#modalEditarHorariorCA .seleccionarMateria").val(respuesta["id"]);
                        $("#modalEditarHorariorCA .optionEditarMateriaC").html(respuesta["nombre_materia"]);

                    }
                })
            } else {

                $("#modalEditarHorariorCA .optionEditarMateriaC").html("SIN MATERIA");
            }
            /*=============================================
            TRAEMOS GRUPO
            =============================================*/

            if (respuesta[0]["id_grupo"] != 0) {

                const datosAula = new FormData();
                datosAula.append("grupo", respuesta[0]["id_grupo"]);

                $.ajax({
                    url: "ajax/ubicacion.ajax.php",
                    method: "POST",
                    data: datosAula,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        //  console.log("respuesta ", respuesta);

                        $("#modalEditarHorariorCA .seleccionarGrupo").val(respuesta["id"]);
                        $("#modalEditarHorariorCA .optionEditarGrupoC").html(respuesta["nombre_g"]);

                    }
                })
            } else {

                $("#modalEditarHorariorCA .optionEditarGrupoC").html("SIN MATERIA");
            }
            /**===================================
             * TRAER DÍA
             ===================================*/

            if (respuesta[0]["dia"] != 0) {
                $("#modalEditarHorariorCA .seleccionarDia").val(respuesta[0]["dia"]);
            } else {
                $("#modalEditarHorariorCA .optionEditarDia").html("SIN GRUPO");
            }
            /**===================================
             * TRAER MAESTRO
             ===================================*/
            if (respuesta[0]["id_profesor"] != 0) {

                const datosProfesor = new FormData();
                // console.log("datosProfesor", datosProfesor);
                datosProfesor.append("profesorE", respuesta[0]["id_profesor"]);

                $.ajax({
                    url: "ajax/profesor.ajax.php",
                    method: "POST",
                    data: datosProfesor,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        // console.log("respuesta ", respuesta);
                        /**Se coloca la función select2() para asociar el id a editar */
                        $("#modalEditarHorariorCA .selecProfesor").val(respuesta["id"]).select2();
                        $("#modalEditarHorariorCA .optionEditarProfesor").html(respuesta["nombre_ma"] + " " + respuesta["apPaterno_ma"] + " " + respuesta["apMaterno_ma"]);

                    }
                })
            } else {

                $("#modalEditarHorariorCA .optionEditarProfesor").html("SIN MAESTRO");
            }
            /**===================================
             * TRAER HORA
             ===================================*/
            $("#modalEditarHorariorCA #regHoraInicialE").val(respuesta[0]["horaInicio"]);
            $("#modalEditarHorariorCA #regHoraFinalE").val(respuesta[0]["horaFinal"]);
        }
    })
})
/**===================================
 * ELIMINAR HORARIO DE CLASES
 ===================================*/
$('.tablaHorarioC tbody').on("click", ".btnEliminarHorarioC", function () {

    let idHorarioC = $(this).attr("idHorarioC");

    swal({
        title: '¿Está seguro de borrar el horario de la clase?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar el horario de la clase!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=horarioClases&idHorarioC=" + idHorarioC;

        }

    })
})
/**===================================
 * -----------Fin horario profesores.
 ===================================*/

