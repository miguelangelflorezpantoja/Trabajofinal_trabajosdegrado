/**===================================
 * =========Materia====================
 ===================================*/

/**===================================
 * CARGAR TABLA DINÁMICA DE Materia
 ===================================*/
// $.ajax({

//     url: "ajax/tablaMateria.ajax.php",
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
$(".tablaMateria").DataTable({
    "ajax": "ajax/tablaMateria.ajax.php",
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
/**--------Fin activar grupo */
$("input").focus(function () {
    $(".alert").remove();

});
/**===================================
 * ACTIVAR MATERIA
 ===================================*/
$(document).on("click", ".btnActivarMateria", function () {

    const idMateria = $(this).attr("idMateria");
    // console.log("idMateria ", idMateria);
    const estadoMateria = $(this).attr("estadoMateria");
    // console.log("estadoMateria ", estadoMateria);

    const datos = new FormData();
    datos.append("activarIdMat", idMateria);
    datos.append("activarMateria", estadoMateria);

    $.ajax({

        url: "ajax/materia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta", respuesta);

        }

    });

    if (estadoMateria == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoMateria', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activado');
        $(this).attr('estadoMateria', 0);

    }

})
/*=============================================
VALIDAR EL REGISTRO DE MATERIA
=============================================*/
$(".guardarMateria").click(function () {

    $(".alert").remove();
    /*=============================================
    VALIDAR LA CLAVE
    =============================================*/

    const clave = $("#regClave").val();
    // console.log("clave ", clave);

    if (clave != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(clave)) {

            $("#regClave").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regClave").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL NOMBRE
   =============================================*/

    const nombreMat = $("#regMat").val();
    // console.log("nombreMat ", nombreMat);

    if (nombreMat != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombreMat)) {

            $("#regMat").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regMat").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/*=============================================
REVISAR SI CLAVE MATERIA EXISTE
=============================================*/
$(".regClave").change(function () {

    $(".alert").remove();

    const claveMat = $(this).val();
    // console.log("claveMat ", claveMat);


    const datos = new FormData();
    datos.append("regClave", claveMat);

    $.ajax({
        url: "ajax/materia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".regClave").parent().after('<div class="alert alert-warning">La clave materia ya existe en la base de datos</div>');

                $(".regClave").val("");

            }

        }

    })

})
/*=============================================
REVISAR SI NOMBRE MATERIA EXISTE
=============================================*/
$(".regMat").change(function () {

    $(".alert").remove();

    const regMat = $(this).val();
    // console.log("regMat ", regMat);


    const datos = new FormData();
    datos.append("regMat", regMat);

    $.ajax({
        url: "ajax/materia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".regMat").parent().after('<div class="alert alert-warning">La clave materia ya existe en la base de datos</div>');

                $(".regMat").val("");

            }

        }

    })

})
/*=============================================
VALIDAR EL REGISTRO DE EDICIÓN MATERIA
=============================================*/
$("#modalEditarMateria .guardarMateriaEditar").click(function () {

    $(".alert").remove();
    /*=============================================
    VALIDAR LA CLAVE
    =============================================*/

    const clave = $("#regClaveE").val();
    // console.log("clave ", clave);

    if (clave != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(clave)) {

            $("#regClaveE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regClaveE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL NOMBRE
   =============================================*/

    const nombreMat = $("#regMatE").val();
    // console.log("nombreMat ", nombreMat);

    if (nombreMat != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombreMat)) {

            $("#regMatE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regMatE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/*=============================================
EDITAR GRUPO
=============================================*/
$('.tablaMateria tbody').on("click", ".btnEditarMateria", function () {

    const idMateria = $(this).attr("idMateria");

    const datos = new FormData();
    datos.append("idMateria", idMateria);

    $.ajax({
        url: "ajax/materia.ajax.php",
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

            $("#modalEditarMateria .idMateria").val(respuesta[0]["id"]);
            $("#modalEditarMateria .regClave").val(respuesta[0]["clave_materia"]);
            $("#modalEditarMateria .regMat").val(respuesta[0]["nombre_materia"]);

            /*=============================================
           TRAEMOS SEMESTRE
           =============================================*/

            if (respuesta[0]["id_semestre"] != 0) {

                const datosMateria = new FormData();
                datosMateria.append("semestre", respuesta[0]["id_semestre"]);

                $.ajax({
                    url: "ajax/materia.ajax.php",
                    method: "POST",
                    data: datosMateria,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (respuesta) {
                        // console.log("respuesta ", respuesta);

                        $("#modalEditarMateria .seleccionarCategoria").val(respuesta["id"]);
                        $("#modalEditarMateria .optionMateria").html(respuesta["semestre"]);

                    }
                })
            } else {

                $("#modalEditarMateria .optionMateria").html("SIN SEMESTRE");
            }
        }
    })
})
/**===================================
 * ELIMINAR MATERIA
 ===================================*/
$('.tablaMateria tbody').on("click", ".btnEliminarMateria", function () {

    let idMateria = $(this).attr("idMateria");

    swal({
        title: '¿Está seguro de aliminar la materia?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar materia!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=gestormat&idMateria=" + idMateria;

        }

    })
})
/**===================================
 * =========Fin materia
 ===================================*/



