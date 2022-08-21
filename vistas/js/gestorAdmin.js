/**===================================
 * CARGAR TABLA DINÁMICA DE ADMINISTRADORES
 ===================================*/
// $.ajax({

//     url: "ajax/tablaAdmin.ajax.php",
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
$(".tablaAdministrador").DataTable({
    "ajax": "ajax/tablaAdmin.ajax.php",
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
            title: 'Información de administradores'
        },
        {
            extend: 'csvHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Desacargar en CSV',
            className: 'btn1 btn-warning mr',
            title: 'Información de administradores'
        },
        {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i> ',
            titleAttr: 'Exportar a Excel',
            className: 'btn1 btn-success mr',
            title: 'Información de administradores'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i> ',
            titleAttr: 'Exportar a PDF',
            className: 'btn1 btn-danger mr ',
            title: 'Información de administradores'
        },
        {
            extend: 'print',
            text: '<i class="fa fa-print"></i> ',
            titleAttr: 'Imprimir',
            className: 'btn1 btn-primary mr',
            title: 'Información de administradores'
        },
    ]
});

$(document).on("click", ".btnActivarAd", function () {

    const idAdmin = $(this).attr("idAdmin");
    // console.log("idAdmin ", idAdmin);
    const estadoAdmin = $(this).attr("estadoAdmin");
    // console.log("estadoAdmin ", estadoAdmin);

    const datos = new FormData();
    datos.append("activarIdAd", idAdmin);
    datos.append("activarAdmin", estadoAdmin);

    $.ajax({

        url: "ajax/admin.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta", respuesta);

        }

    });

    if (estadoAdmin == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoAdmin', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activo');
        $(this).attr('estadoAdmin', 0);

    }
})
/**===================================
 * REVISAR DOCUMENTOS
 ===================================*/
$(document).on("click", ".btnActivarD", function () {

    const idDocument = $(this).attr("idDocument");
    // console.log("idDocument ", idDocument);
    const estadoDoc = $(this).attr("estadoDoc");
    // console.log("estadoDo ", estadoDoc);

    var datos = new FormData();
    datos.append("idDocumentAl", idDocument);
    datos.append("estadoDoc", estadoDoc);

    $.ajax({

        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log("respuesta", respuesta);
        }

    })

    if (estadoDoc == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('No revisado');
        $(this).attr('estadoDoc', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Revisado');
        $(this).attr('estadoDoc', 0);
    }

})

$("input").focus(function () {
    $(".alert").remove();

});
/*=============================================
REVISAR SI NOMBRE USUARIO EXISTE
=============================================*/

$(".regAdmin").change(function () {

    $(".alert").remove();

    const admin = $(this).val();
    // console.log("admin ", admin);


    const datos = new FormData();
    datos.append("regAdmin", admin);

    $.ajax({
        url: "ajax/admin.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".regAdmin").parent().after('<div class="alert alert-warning">El administraor ya existe en la base de datos</div>');

                $(".regAdmin").val("");

            }

        }

    })

})

/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/
$(".regEmailAd").change(function () {

    $(".alert").remove();

    const emailAd = $(this).val();
    // console.log("admin ", admin);


    const datos = new FormData();
    datos.append("regEmailAd", emailAd);

    $.ajax({
        url: "ajax/admin.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".regEmailAd").parent().after('<div class="alert alert-warning">El email ya existe en la base de datos, por favor, registre otro diferente</div>');

                $(".regEmailAd").val("");

            }

        }

    })

})
/*=============================================
VALIDAR EL REGISTRO DE AMINISTRADOR
=============================================*/
$("#guardarAdmin").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/

    const nombre = $("#regAdmin").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regAdmin").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regAdmin").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const emailAd = $("#regEmailAd").val();

    if (emailAd != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(emailAd) && $.trim(emailAd).length !== 0) {

            $("#regEmailAd").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (emailAd) {

        //     $("#regEmailAd").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor, ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmailAd").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }
    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordAd").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordAd").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    } else {
        $("#regPasswordAd").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
        VALIDAR PERFIL
    =============================================*/

    const perfil = $("#regPerfilAd").val();
    // console.log("perfil ", perfil);

    if (perfil != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(perfil)) {

            $("#regPerfilAd").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regPerfilAd").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/**---------------Fin validar campos administrador. */
/*=============================================
SUBIENDO LA FOTO ADMINISTRADOR
=============================================*/
let imagenAdministrador = null;
$(".fotoAdmin").change(function () {

    imagenAdministrador = this.files[ 0 ];
    /**Nota: al ejecutar el código y colocar los límites de la cadena de 
     * trasferencia de datos en los códigos correspondientes a este apartado,
     * se presentaba un error, el atributo imagenAdministrador retronaba nulo,
     * el error estaba en declarar la línea anterior con un tipo de variable,
     * en este caso era const. 
     */
    // console.log("imagenAdministrador ", imagenAdministrador);

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    if (imagenAdministrador[ "type" ] != "image/jpeg" && imagenAdministrador[ "type" ] != "image/png") {
        // Se deja una vez más el espacio.
        $(".fotoAdmin").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        // return;

    } else if (imagenAdministrador[ "size" ] > 2000000) {

        $(".fotoAdmin").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        // return;

    } else {
        // Esa imagen se convierte en un archivo.
        const datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagenAdministrador);

        $(datosImagen).on("load", function (event) {

            const rutaImagen = event.target.result;

            $(".previsualizarAdmin").attr("src", rutaImagen);

        })
    }

})

/**----------------Fin subiendo foto administrador. */
/*=============================================
VALIDAR LA EDICIÓN DE ADMINISTRADOR
=============================================*/
$("#modalEditarAdmin .guardarAdminEditar").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/

    const nombre = $("#regAdminE").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regAdminE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regAdminE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const emailAd = $("#regEmailAdE").val();

    if (emailAd != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(emailAd) && $.trim(emailAd).length !== 0) {

            $("#regEmailAdE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (emailAd) {

        //     $("#regEmailAdE").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor, ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmailAdE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }
    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordAdE").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordAdE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    }
    // else {
    //     $("#regPasswordAdE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
    //     return false;
    // }
    /*=============================================
        VALIDAR PERFIL
    =============================================*/

    const perfil = $("#regPerfilAdE").val();
    // console.log("perfil ", perfil);

    if (perfil != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(perfil)) {

            $("#regPerfilAdE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regPerfilAdE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/**---------------Fin validar campos administrador. */
/*=============================================
EDITAR ADMINISTRADOR
=============================================*/
$('.tablaAdministrador tbody').on("click", ".btnEditarAdmin", function () {

    const idAdmin = $(this).attr("idAdmin");

    const datos = new FormData();
    datos.append("idAdmin", idAdmin);

    $.ajax({
        url: "ajax/admin.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            /**===================================
             * TRAER FOTO ADMINISTADOR
             ===================================*/
            if (respuesta[ 0 ][ "foto" ] != 0) {
                $("#modalEditarAdmin .previsualizarAdmin").attr("src", respuesta[ 0 ][ "foto" ]);
                $("#modalEditarAdmin .antiguaFotoAdmin").val(respuesta[ 0 ][ "foto" ]);
            } else {
                $("#modalEditarAdmin .previsualizarAdmin").attr("src", "vistas/img/admin/default/anonymous.png");
            }
            $("#modalEditarAdmin .idAdmin").val(respuesta[ 0 ][ "id" ]);
            $("#modalEditarAdmin .regAdmin").val(respuesta[ 0 ][ "nombre" ]);
            $("#modalEditarAdmin .regEmailAd").val(respuesta[ 0 ][ "email" ]);
            $("#modalEditarAdmin .passwordActual").val(respuesta[ 0 ][ "password" ]);
            $("#modalEditarAdmin .regPerfilAd").val(respuesta[ 0 ][ "perfil" ]);
        }
    })
})
/**===================================
 * ELIMINAR ADMINISTRADOR
 ===================================*/
$('.tablaAdministrador tbody').on("click", ".btnEliminarAdmin", function () {

    let idAdmin = $(this).attr("idAdmin");
    const fotoAdmin = $(this).attr("fotoAdmin");

    swal({
        title: '¿Está seguro de borrar el profesor?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar administrador!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=administrador&idAdmin=" + idAdmin + "&fotoAdmin=" + fotoAdmin;

        }

    })
})
