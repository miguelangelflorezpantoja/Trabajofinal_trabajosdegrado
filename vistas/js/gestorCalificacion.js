/**===================================
 * OCULTAR COLuMNA
 ===========0 ========================*/
const tabla = $('#cali').DataTable({
    "dom": "",

    "columnDefs": [
        {
            "targets": [0, 1],
            "visible": false,
            searcheable: false
        },
        {
            "targets": [2, 3, 4],
            "visible": false,
            searcheable: false
        },
        {
            "targets": [5, 6, 7],
            "visible": false,
            searcheable: false
        }
    ]
});
/**===================================
 * OCULTAR COLuMNA
 ===========0 ========================*/
const tablaS = $('#caliS').DataTable({
    "dom": "",

    "columnDefs": [
        {
            "targets": [1],
            "visible": false,
            searcheable: false
        },
        {
            "targets": [2],
            "visible": false,
            searcheable: false
        },
    ]
});

$(".tablaMostrarCalficaionAl").DataTable({
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
/**===================================
 * MOSTRAR CALIFICAIONES PERFIL ALUMNO
 ===================================*/
$(".tablaCalificacionesPA").DataTable({
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

/*=============================================
VALIDAR ENTRADA DE CALIFICACIONES
=============================================*/
$("#modalAlumnoCal .guardarCalif").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/
    setTimeout(function () {
        $(".alert").fadeOut();
    }, 3000);
    const evalFirst = $(".evalPrimera").val();
    // console.log("evalFirst ", evalFirst);

    if (evalFirst != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalFirst)) {

            $(".evalPrimera").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres</div>')

            return false;

        }
    } else {

        $(".evalPrimera").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})

/**===================================
 * POSCIONNAR EL FOCUS DEL INPUT
 ===================================*/
$(document).ready(function () {
    // Consultamos los campos en nuestra pantalla
    let campos = $('input');

    // Indice del campo que actualmente tiene el foco
    let indiceCampoConFoco = 0;

    // Por defecto ponemos el foco en el primer campo
    campos[indiceCampoConFoco].focus();

    $(document).keydown((event) => {
        if (event.which == 13 || event.keyCode == 13) {
            // Se ha presionado la tecla Enter

            // Aumentamos el indice del campo a enfocar
            if (indiceCampoConFoco < (campos.length - 1)) {
                indiceCampoConFoco++;
            } else {
                indiceCampoConFoco = 0;
            }

            // Enfocar en el campo según el indice actual
            campos[indiceCampoConFoco].focus();
        }
    });
})

document.addEventListener('keypress', function (evt) {
    if (evt.key !== 'Enter') {
        return;
    }

    let element = evt.target;
    // console.log("element ", element);

    if (!element.classList.contains('focusNext')) {
        return;
    }

    let tabIndex = element.tabIndex + 1;
    var next = document.querySelector('[tabindex="' + tabIndex + '"]');

    if (next) {
        next.focus();
        event.preventDefault();
    }
});
/**===================================
 * MOSTRAR MATERIAS
 ===================================*/
$(document).on("click", ".btnIngresarCal", function () {

    let idMateriaP = $(this).attr("idAlumnoCal");
    // console.log("idMateriaP ", idMateriaP);

    const datos = new FormData();
    datos.append("idMateriaP", idMateriaP);

    $.ajax({
        url: "ajax/mostrarAlumnosC.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(JSON.stringify(respuesta));
            const mostrarAl = JSON.parse(JSON.stringify(respuesta));
            // console.log(mostrarAl[0].id_alumno);

            if (mostrarAl[0].estado != 0) {
                tabla.row().clear();
                // Limpia los datos para una segunda entrada al hacer click.
                //$(".tablaMostrarAlumnoC tbody").html("");

                for (let i = 0; i < mostrarAl.length; i++) {
                    // console.log("mostrarAl.length ", mostrarAl.length);
                    const datosAlumno = new FormData();
                    datosAlumno.append("idAlumnoCal", mostrarAl[i].id_alumno);

                    $.ajax({

                        url: "ajax/mostrarAlumnosC.ajax.php",
                        method: "POST",
                        data: datosAlumno,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        success: function (respuesta) {
                            // console.log("respuesta ", respuesta);

                            tabla.row.add([
                                (i + 1),
                                mostrarAl[i].id_alumno,
                                mostrarAl[i].id_materia,
                                `<input type="hidden" min="1" class="form-control evalPrimera">`,
                                `<input type="hidden" min="1" class="form-control evalSegunda">`,
                                `<input type="hidden" min="1" class="form-control evalTercera">`,
                                `<input type="hidden" min="1" class="form-control evalCuarta">`,
                                `<input type="hidden" min="1" class="form-control evalOrdinaria">`,

                            ]).draw();
                        }
                    })
                }
            }
        }
    })
})
/**===================================
 * GUARDAR CALIFICACIONES
 ===================================*/
$(document).ready(function () {
    $(".guardarCalif").click(function () {

        let valores = [];

        $(".tablaMostrarAlumnoC tbody").find("tr").each(function () {
            let row = $(this);
            let idAlumno = tabla.row(row).data()[1];
            let idMateria = tabla.row(row).data()[2];
            let col3 = $(this).find('.evalPrimera').val();
            let col4 = $(this).find('.evalSegunda').val();
            let col5 = $(this).find('.evalTercera').val();
            let col6 = $(this).find('.evalCuarta').val();
            let col7 = $(this).find('.evalOrdinaria').val();
            valores.push({
                idAlumno,
                idMateria,
                col3,
                col4,
                col5,
                col6,
                col7
            });
        })

        guardar(valores);
    })
});

const guardar = async data => {
    try {
        // console.log(data)
        const exec = await $.ajax({
            url: "ajax/alumno.ajax.php",
            type: "POST",
            data: { 'data': JSON.stringify(data) },
            cache: false
        });
        // console.log(exec)
        if (exec == "ok") {

            swal({
                type: "success",
                title: "Los datos alumnos se han generado correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function (result) {
                if (result.value) {

                    window.location = "calificacion";

                }
            })
        }
    } catch (e) {
        console.log(e)
    }
}
/**===================================
 * VALIDAR SI SE INGRESO CALIFICACIÓN 
 * EN PRIMERA EVALUACIÓN.
 ===================================*/

$("#modalAlumnoCal .validarCal").change(function () {

    $(".alert").remove();
    const primerEval = $(this).val();
    console.log("primerEval ", primerEval);

    const datosCal = new FormData();
    datosCal.append("validarCalificacion", primerEval);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datosCal,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".validarCal").parent().after('<div class="alert alert-warning">Ya exiten calificaciones en ésta columna, si desesa editarlas realicelo en las tablas de abajo.</div>');

                $(".validarCal").val("");

            }
        }
    })
})
/*=============================================
VALIDAR ENTRADA DE CALIFICACIONES PARA EDICIÓN
=============================================*/
$("#modalAlumnoCal .guardarCalif").click(function () {

    setTimeout(function () {
        $(".alert").fadeOut();
    }, 3000);
    const evalprimera = $(".primeraEval").val();
    // console.log("evalprimera ", evalprimera);

    if (evalprimera != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalprimera)) {
            $(".primeraEval").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres especiales</div>')
            return false;

        }
    } else {
        $(".primeraEval").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    const evalSegunda = $(".segundaEval").val();
    // console.log("evalSegunda ", evalSegunda);

    if (evalSegunda != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalSegunda)) {
            $(".segundaEval").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres especiales</div>')
            return false;

        }
    } else {
        $(".segundaEval").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    const evalTercera = $(".terceraEval").val();
    // console.log("evalTercera ", evalTercera);

    if (evalTercera != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalTercera)) {
            $(".terceraEval").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres especiales</div>')
            return false;

        }
    } else {
        $(".terceraEval").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    const evalCuarta = $(".cuartaEval").val();
    // console.log("evalCuarta ", evalCuarta);

    if (evalCuarta != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalCuarta)) {
            $(".cuartaEval").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres especiales</div>')
            return false;

        }
    } else {
        $(".cuartaEval").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    const evalQuinta = $(".ordinEval").val();
    // console.log("evalQuinta ", evalQuinta);

    if (evalQuinta != "") {

        const expresion = /^\d*\.?\d*$/;

        if (!expresion.test(evalQuinta)) {
            $(".ordinEval").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten letras y caracteres especiales</div>')
            return false;

        }
    } else {
        $(".ordinEval").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/**===================================
 * INGRESAR CALIFICACIONES PARA MODIFICAR
 ===================================*/
$('.tablaMostrarCalficaionAl').on("click", ".btnEditarCal", function () {

    let ideditCal = $(this).attr("ideditCal");
    // console.log("ideditCal ", ideditCal);
    const datos = new FormData();
    datos.append("ideditCal", ideditCal);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            $("#modalEditarCal .idCalificacion").val(respuesta[0]["id"]);
            $("#modalEditarCal .primeraEval").val(respuesta[0]["primera_eval"]);
            $("#modalEditarCal .segundaEval").val(respuesta[0]["segund_eval"]);
            $("#modalEditarCal .terceraEval").val(respuesta[0]["tercera_eval"]);
            $("#modalEditarCal .cuartaEval").val(respuesta[0]["cuarta_eval"]);
            $("#modalEditarCal .ordinEval").val(respuesta[0]["cal_ordinaria"]);
        }
    })
})
/**===================================
 * TABLA DE CALIFICACIONES ADMINISTRADOR
 ===================================*/
/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaAlumnoCal.ajax.php",
//     success: function (respuesta) {
//         // Sólo se descomenta para mostrar errores.
//         console.log("respuesta", respuesta);

//     }

// })
/**Se usan para una carga rápid de datos.
 * "deferRender": true,
     "retrieve": true,
     "processing": true,

 */

$(".tablaAlumnoCal").DataTable({
    "ajax": "ajax/tablaAlumnoCal.ajax.php",
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
    responsive: "true",
    dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: [
        {
            extend: 'copyHtml5',
            text: '<i class="fas fa-copy"></i>',
            titleAttr: 'Copiar al portapapeles',
            className: 'btn1 btn-primary mr',
            title: 'Datos de alumnos'
        },
        {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Desacargar en CSV',
            className: 'btn1 btn-warning mr',
            title: 'Datos de alumnos'
        },
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn1 btn-success mr',
            title: 'Datos de alumnos'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn1 btn-danger mr ',
            orientation: 'landscape',
            title: 'Datos de alumnos',
            pageSize: 'LEGAL',
            customize: function (doc) {
                doc.defaultStyle.fontSize = 8;
            }
        },
        {
            extend: 'print',
            text: '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn1 btn-primary mr',
            title: 'Datos de alumnos'
        },
    ]
});
/**===================================
 * DESACTIVAR BOTÓN
 ===================================*/
function desactivaBoton(id) {
    document.getElementById(id).disabled = true;
}

/**===================================
 * GESTOR CALIFICACIÓN PARA ADMINISTRADOR
 ===================================*/
$('.tablaAlumnoCal').on("click", ".btnEditarCalAd", function () {

    let ideditCal = $(this).attr("ideditCal");
    // console.log("ideditCal ", ideditCal);
    const datos = new FormData();
    datos.append("ideditCal", ideditCal);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            $("#modalEditarCalAd .idCalificacion").val(respuesta[0]["id"]);
            $("#modalEditarCalAd .primeraEval").val(respuesta[0]["primera_eval"]);
            $("#modalEditarCalAd .segundaEval").val(respuesta[0]["segund_eval"]);
            $("#modalEditarCalAd .terceraEval").val(respuesta[0]["tercera_eval"]);
            $("#modalEditarCalAd .cuartaEval").val(respuesta[0]["cuarta_eval"]);
            $("#modalEditarCalAd .ordinEval").val(respuesta[0]["cal_ordinaria"]);
        }
    })
})
/**===================================
 * ELIMINAR CALIFICACIONES
 ===================================*/
$('.tablaAlumnoCal tbody').on("click", ".btnEliminarCal", function () {

    let ideditCal = $(this).attr("ideditCal");

    swal({
        title: '¿Está seguro de eliminar las calificaciones del alumno?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar calificaciones!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=calificacionalumno&ideditCal=" + ideditCal;

        }

    })
})

