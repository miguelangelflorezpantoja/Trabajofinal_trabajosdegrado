/**===================================
 * CARGAR TABLA DINÁMICA PARA CLASES
 ===================================*/
$.ajax({

    url: "ajax/tablaHorarioA.ajax.php",
    success: function (respuesta) {
        // Sólo se descomenta para mostrar errores.
        console.log("respuesta", respuesta);

    }
})

/**Se usan para una carga rápida de datos.
 * "deferRender": true,
     "retrieve": true,
     "processing": true,

 */
$(".tablaHorarioA").DataTable({
    "ajax": "ajax/tablaHorarioA.ajax.php",
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

$(".tablaHorarioAlumnoP").DataTable({
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
    }
});

/**===================================
 * ACTIVAR HORARIO ALUMNO
 ===================================*/
$(document).on("click", ".btnActivarHorarioA", function () {

    const idHorarioA = $(this).attr("idHorarioA");
    // console.log("idHorarioA ", idHorarioA);
    const estadoHorarioA = $(this).attr("estadoHorarioA");
    // console.log("estadoHorarioP ", estadoHorarioP);

    const datos = new FormData();
    datos.append("activarIdHoA", idHorarioA);
    datos.append("activarHorarioA", estadoHorarioA);

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

    if (estadoHorarioA == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoHorarioA', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoHorarioA', 0);

    }

})
/**--------Fin activar horario alumno*/
/**===================================
 * ALERTA PARA LA EDICIÓN DE HORARIO ALUMNO
 ===================================*/
$('.tablaHorarioA tbody').on("click", ".btnEditarHorarioA", function () {

    // let idHorarioEA = $(this).attr("idHorarioA");
    swal({
        title: "Editar horario alumno",
        text: "¡Para editar horario del alumno, abrir pestaña de horario de clases!",
        type: "error",
        confirmButtonText: "¡Cerrar!"
    });
})

/**===================================
* ELIMINAR HORARIO DEL ALUMNO
===================================*/
$('.tablaHorarioA tbody').on("click", ".btnEliminarHorarioA", function () {

    let idHorarioA = $(this).attr("idHorarioA");
    // console.log("idHorarioA ", idHorarioA);

    swal({
        title: '¿Está seguro de borrar el horario del alumno?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar el horario del alumno!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=horarioAlumno&idHorarioA=" + idHorarioA;

        }

    })
})
/**===================================
 * VALIDACIÓN GUARDAR DATOS HORARIO ALUMNO
 ===================================*/
$(".editarHorarioClaseAl").submit(function () {
    /*=============================================
   VALIDAR EL ID PARA EL NOMBRE ALUMNO
   =============================================*/

    var select = $("#selecAlumnoC").val();

    if (select == null) {
        $('.select2').parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})