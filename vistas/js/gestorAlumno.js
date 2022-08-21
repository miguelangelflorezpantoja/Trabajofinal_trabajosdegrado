/**===================================
 * CARGAR TABLA DINÁMICA DE CATEGORÍAS
 ===================================*/
// $.ajax({

//     url: "ajax/tablaAlumno.ajax.php",
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

$(".tablaAlumno").DataTable({
    "ajax": "ajax/tablaAlumno.ajax.php",
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
 * TABLA MOSTRAR DOCUMENTOS
 ===================================*/
$(".tablaMostrarDocAlad").DataTable({
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
 * ACTIVAR CATEGORÍA
 ===================================*/
/**Se antepone el document con el on en el la función click para 
 * accionar el botón porque el documento de la tabla no lo carga el 
 * html sino el ajax. El document -on  indica que primero se cargará todoo el documento.
 */
/**==========================
 * FORMATEAR LOS INPUT
 * Al colocarse en el input una vez más teniendo un alerta estas se remueven.
 ============================*/

$(document).on("click", ".btnActivarA", function () {

    const idAlumno = $(this).attr("idAlumno");
    // console.log("idAlumno ", idAlumno);
    const estadoAlumno = $(this).attr("estadoAlumno");
    // console.log("estadoAlumno ", estadoAlumno);

    const datos = new FormData();
    datos.append("activarIdA", idAlumno);
    datos.append("activarAlumno", estadoAlumno);

    $.ajax({

        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta", respuesta);

        }

    });

    if (estadoAlumno == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('No inscrito');
        $(this).attr('estadoAlumno', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Inscrito');
        $(this).attr('estadoAlumno', 0);

    }

})
/**----Limpiar el alert de validacion al poscionar el focus en el input.*/
$("input").focus(function () {
    $(".alert").remove();

});
/**-----Convertir en mayúsculas la entrada en el input */
function mayusA(e) {
    e.value = e.value.toUpperCase();
}
/*=============================================
REVISAR SI LA MATRÍCULA EXISTE
=============================================*/

$(".validarMatricula").change(function () {

    $(".alert").remove();

    const matricula = $(this).val();
    // console.log("matricula ", matricula);

    const datos = new FormData();
    datos.append("validarMatricula", matricula);

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

            if (respuesta.length != 0) {

                $(".validarMatricula").parent().after('<div class="alert alert-warning">La matrícula ya existe en la base de datos</div>');

                $(".validarMatricula").val("");

            }

        }

    })

})
/**===================================
 * CALCULARA IMPORTE
 ===================================*/
$(".cuota").change(function () {

    const cuotaPrecio = $(this).val();
    // console.log("cuotaPrecio ", cuotaPrecio);

    $(".cantidad").change(function () {

        let cantidadElement = $(this).val();
        // console.log("cantidadElement ", cantidadElement);
        importe = Math.floor(cantidadElement * cuotaPrecio);
        // console.log("importe ", importe);
        $(".showImporte").val(importe);
    })
})

/**--------------Fin calcular la edad */
/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
$(".guardarAlumno").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/

    const nombre = $("#regAlumno").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL APELLIDO PATERNO
   =============================================*/

    const apellidoPaterno = $("#regApellidoP").val();
    // console.log("nombre ", apellidoPaterno);

    if (apellidoPaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoPaterno)) {

            $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL APELLIDO PATERNO
    =============================================*/

    const apellidoMaterno = $("#regApellidoM").val();
    // console.log("nombre ", apellidoMaterno);

    if (apellidoMaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoMaterno)) {

            $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const email = $("#regEmail").val();

    if (email != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email) && $.trim(email).length !== 0) {

            $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (validarEmailRepetido) {

        //     $("#regEmail").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }


    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordA").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordA").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    } else {
        $("#regPasswordA").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/**---------------Fin validar campos alumno. */
/**===================================
 * REVISAR SI AlUMNO YA EXISTE
 ===================================*/
$(".validarCategoria").change(function () {
    // Se remueve el mensaje.
    $(".alert").remove();

    const categoria = $(this).val();
    // console.log("categoria", categoria);

    const datos = new FormData();
    datos.append("validarCategoria", categoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            // console.log("respuesta", respuesta);

            if (respuesta) {

                $(".validarCategoria").parent().after('<div class="alert alert-warning">Esta categoría ya existe en la base de datos</div>')
                // Al desactivarse el alert se vacía el input.
                $(".validarCategoria").val("");
            }

        }

    })
});
/**===================================
 * REVISAR SI CORREO ELECTRÓNICO EXISTE
 ===================================*/
$(".regEmailA").change(function () {
    // Se remueve el mensaje.
    $(".alert").remove();

    const correo = $(this).val();
    // console.log("categoria", categoria);

    const datos = new FormData();
    datos.append("validarCorreo", correo);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            // console.log("respuesta", respuesta);

            if (respuesta) {

                $(".regEmailA").parent().after('<div class="alert alert-warning">Este correo electrónico ya existe en la base de datos</div>')
                // Al desactivarse el alert se vacía el input.
                $(".regEmailA").val("");
            }

        }

    })
});
/**------Fin revisar si categorías existe */
/**===================================
 *LIMPIAR INPUTAS DEL MODAL EN ENTRADAS
 ===================================*/
$('#crearCuenta').on('hidden.bs.modal', function () {
    $("#crearCuenta .fotoAlumno").val("");
    $("#crearCuenta .regAlumno").val("");
    $("#crearCuenta .regApellidoP").val("");
    $("#crearCuenta .regApellidoM").val("");
    $("#crearCuenta .regEmailA").val("");
    $("#crearCuenta .regPassword").val("");
});
/**===================================
 * VALIDAR EL TIPO DE ARCHIVO PDF
 ===================================*/
$(document).on('change', '.datosAlumno', function () {
    // this.files[0].size recupera el tamaño del archivo
    // alert(this.files[0].size);
    var fileName = this.files[0].name;
    var fileSize = this.files[0].size;

    if (fileSize > 4000000) {
        $(".datosAlumno").val("");

        swal({
            title: "Error al subir el archivo",
            text: "¡El archivo no debe pesar más de 4MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });
        this.value = '';
        this.files[0].name = '';
    } else {
        // Recuperamos la extensión del archivo
        var ext = fileName.split('.').pop();

        // Convertimos en minúscula porque 
        // la extensión del archivo puede estar en mayúscula
        ext = ext.toLowerCase();

        // console.log(ext);
        switch (ext) {
            case 'pdf': break;
            default:
                $(".datosAlumno").val("");

                swal({
                    title: "Error al subir el archivo",
                    text: "¡El archivo no está en formato PDF!",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });
                this.value = ''; // Reset del valor
        }
    }
});
/**--------Fin validación de archivos PDF */
/*=============================================
SUBIENDO LA FOTO ALUMNO
=============================================*/
let imagenAlumno = null;
$(".fotoAlumno").change(function () {

    imagenAlumno = this.files[0];
    /**Nota: al ejecutar el código y colocar los límites de la cadena de 
     * trasferencia de datos en los códigos correspondientes a este apartado,
     * se presentaba un error, el atributo imagenAlumno retronaba nulo,
     * el error estaba en declarar la línea anterior con un tipo de variable,
     * en este caso era const. 
     */
    // console.log("imagenAlumno ", imagenAlumno);

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    if (imagenAlumno["type"] != "image/jpeg" && imagenAlumno["type"] != "image/png") {
        // Se deja una vez más el espacio.
        $(".fotoAlumno").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        // return;

    } else if (imagenAlumno["size"] > 2000000) {

        $(".fotoAlumno").val("");

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
        datosImagen.readAsDataURL(imagenAlumno);

        $(datosImagen).on("load", function (event) {

            const rutaImagen = event.target.result;

            $(".previsualizarPortada").attr("src", rutaImagen);

        })
    }

})

/**----------------Fin subiendo foto alumno. */
/**===================================
 * GUARDAR DATOS ALUMNO
 ===================================*/
$(".guardarAlumno").click(function () {
    /**===================================
     * ALMACENAMIENTO DE TODOS LOS CAMPOS 
     * DE ALUMNO.
     ===================================*/
    const numeroMatricula = $(".numeroMatricula").val();
    // console.log("numeroMatricula ", numeroMatricula);
    const regAlumno = $(".regAlumno").val();
    const regApellidoP = $(".regApellidoP").val();
    const regApellidoM = $(".regApellidoM").val();
    const regEmailA = $(".regEmailA").val();
    const regPassword = $(".regPassword").val();

    const datosAlumno = new FormData();
    datosAlumno.append("fotoAlumno", imagenAlumno);
    datosAlumno.append("numeroMatricula", numeroMatricula);
    datosAlumno.append("regAlumno", regAlumno);
    datosAlumno.append("regApellidoP", regApellidoP);
    datosAlumno.append("regApellidoM", regApellidoM);
    datosAlumno.append("regEmailA", regEmailA);
    datosAlumno.append("regPassword", regPassword);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datosAlumno,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            if (respuesta == "ok") {

                swal({
                    type: "success",
                    title: "Los datos alumno se han guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "pagos";

                    }
                })
            }
        }
    })

})
/**----------Fin gaurdar datos alumno */
/*=============================================
VALIDAR LA EDICIÓN DE ALUMNOS
=============================================*/
$("#modalEditarAlumno .guardarCambiosAlumnoAd").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/

    const nombre = $("#regAlumno").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL APELLIDO PATERNO
   =============================================*/

    const apellidoPaterno = $("#regApellidoP").val();
    // console.log("nombre ", apellidoPaterno);

    if (apellidoPaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoPaterno)) {

            $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL APELLIDO PATERNO
    =============================================*/

    const apellidoMaterno = $("#regApellidoM").val();
    // console.log("nombre ", apellidoMaterno);

    if (apellidoMaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoMaterno)) {

            $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const email = $("#regEmail").val();

    if (email != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email) && $.trim(email).length !== 0) {

            $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (validarEmailRepetido) {

        //     $("#regEmail").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }

    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordAE").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordAE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    } //else {
    //     $("#regPasswordAE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
    //     return false;
    // }
})
/**---------------Fin validar campos alumno. */
/**===================================
 * EDITAR ALUMNOS
 ===================================*/
$('.tablaAlumno tbody').on("click", ".btnEditarAlumno", function () {

    let idAlumno = $(this).attr("idAlumno");

    const datos = new FormData();
    datos.append("idAlumno", idAlumno);

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

            /**===================================
             * TRAER FOTO ALUMNO
             ===================================*/
            if (respuesta[0]["foto_al"] != 0) {
                $("#modalEditarAlumno .previsualizarPortada").attr("src", respuesta[0]["foto_al"]);
                $("#modalEditarAlumno .antiguaFotoAlumno").val(respuesta[0]["foto_al"]);
            } else {
                $("#modalEditarAlumno .previsualizarPortada").attr("src", "vistas/img/alumno/default/anonymous.png");
            }

            /**----Fin traer imagen alumno */

            $("#modalEditarAlumno .idAlumno").val(respuesta[0]["id"]);
            $("#modalEditarAlumno .numeroMatricula").val(respuesta[0]["matricula_al"]);
            $("#modalEditarAlumno .regAlumno").val(respuesta[0]["nombre_al"]);
            $("#modalEditarAlumno .regApellidoP").val(respuesta[0]["apellidoPaterno_al"]);
            $("#modalEditarAlumno .regApellidoM").val(respuesta[0]["apellidoMaterno_al"]);
            $("#modalEditarAlumno .regEmailA").val(respuesta[0]["email_al"]);


            $("#modalEditarAlumno .passwordActualA").val(respuesta[0]["password"]);
            /*=============================================
            GUARDAR CAMBIOS DEL ALUMNO
            =============================================*/
            $(".guardarCambiosAlumnoAd").click(function () {
                /*=============================================
                PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
                =============================================*/
                if ($("#modalEditarAlumno .regAlumno").val() != "" &&
                    $("#modalEditarAlumno .regApellidoP").val() != "" &&
                    $("#modalEditarAlumno .regApellidoM").val() != "" &&
                    $("#modalEditarAlumno .regEmailA").val() != "") {

                    editarAlumnoAd();
                } else {
                    swal({
                        title: "Llenar todos los campos obligatorios",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"
                    });

                    return;
                }
            })
            /**---------Fin guardar cambios del alumno. */
        }
    })
})
/**-------------Fin editar alumnos */
function editarAlumnoAd() {
    let idAlumno = $("#modalEditarAlumno .idAlumno").val();
    // console.log("idAlumno ", idAlumno);
    const numeroMatricula = $("#modalEditarAlumno .numeroMatricula").val();
    // console.log("numeroMatricula ", numeroMatricula);
    const regAlumno = $("#modalEditarAlumno .regAlumno").val();
    const regApellidoP = $("#modalEditarAlumno .regApellidoP").val();
    const regApellidoM = $("#modalEditarAlumno .regApellidoM").val();
    const regEmailA = $("#modalEditarAlumno .regEmailA").val();
    const regPasswordAE = $("#modalEditarAlumno .regPasswordAE").val();
    const passwordActualA = $("#modalEditarAlumno .passwordActualA").val();
    const antiguaFotoAlumno = $("#modalEditarAlumno .antiguaFotoAlumno").val();

    const datosAlumno = new FormData();
    datosAlumno.append("id", idAlumno);
    datosAlumno.append("fotoAlumnoEdit", imagenAlumno);
    datosAlumno.append("numeroMatriculaEdit", numeroMatricula);
    datosAlumno.append("regAlumnoEdit", regAlumno);
    datosAlumno.append("regApellidoPEdit", regApellidoP);
    datosAlumno.append("regApellidoMEdit", regApellidoM);
    datosAlumno.append("regEmailAEdit", regEmailA);
    datosAlumno.append("regPasswordAE", regPasswordAE);
    datosAlumno.append("passwordActualA", passwordActualA);
    datosAlumno.append("antiguaFotoAlumno", antiguaFotoAlumno);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datosAlumno,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            // console.log("respuesta ", respuesta);
            if (respuesta == "ok") {

                swal({
                    type: "success",
                    title: "Los datos alumno se han modificado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "mostraralumno";

                    }
                })
            }
        }
    })
}
/**-------------Fin editar alumnos */
/*=============================================
VALIDAR LA EDICIÓN DE ALUMNOS
=============================================*/
$("#modalCompletarAlumno .guardarCambiosAlumno").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/
    setTimeout(function () {
        $(".alert").fadeOut();
    }, 3000);

    const nombre = $("#regAlumno").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regAlumno").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /**===================================
     * VALIDAR SEXO
     ===================================*/
    const sexo = $("#regSexo").val();
    if (sexo == "") {
        $("#regSexo").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /**===================================
     * VALIDAR ESTADO
     ===================================*/
    const estado = $("#regEstado").val();
    if (estado == "") {
        $("#regEstado").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL APELLIDO PATERNO
   =============================================*/

    const apellidoPaterno = $("#regApellidoP").val();
    // console.log("nombre ", apellidoPaterno);

    if (apellidoPaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoPaterno)) {

            $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL APELLIDO PATERNO
    =============================================*/

    const apellidoMaterno = $("#regApellidoM").val();
    // console.log("nombre ", apellidoMaterno);

    if (apellidoMaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoMaterno)) {

            $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoM").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR NACIONALIDAD
    =============================================*/

    const nacionalidad = $("#regNacionalidadA").val();
    // console.log("nombre ", nacionalidad);

    if (nacionalidad != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nacionalidad)) {

            $("#regNacionalidadA").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regNacionalidadA").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const email = $("#regEmail").val();

    if (email != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email) && $.trim(email).length !== 0) {

            $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (validarEmailRepetido) {

        //     $("#regEmail").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmail").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }
    /**===================================
     * VALIDACIÓN DE TELÉFONO
     ===================================*/
    const telefono = $("#regTelA").val();

    if (telefono != "") {

        const expresion = /^\d{10}$/;
        // console.log("expresion ", expresion);
        // const expresion2 = /\s/;

        if (!expresion.test(telefono) && $.trim(telefono).length !== 0) {

            $("#regTelA").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Es obligatorio 10 números, no se permiten caracteres especiales sólo números</div>')

            return false;
        }
    } else {
        $("#regTelA").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /**===================================
     * VALIDACIÓN DE TELÉFONO ALTERNO
     ===================================*/
    const telefono2 = $("#regTelAalterno").val();

    if (telefono2 != "") {

        const expresion = /^\d{10}$/;
        // console.log("expresion ", expresion);
        // const expresion2 = /\s/;

        if (!expresion.test(telefono2) && $.trim(telefono2).length !== 0) {

            $("#regTelAalterno").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Es obligatorio 10 números, no se permiten caracteres especiales sólo números</div>')

            return false;
        }
    } else {
        $("#regTelAalterno").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /**===================================
     * VALIDACIÓN DE CÓDIGO POSTAL
     ===================================*/
    const codPostal = $("#regCP").val();

    if (codPostal != "") {

        const expresion = /^\d{5}$/;
        // console.log("expresion ", expresion);
        // const expresion2 = /\s/;

        if (!expresion.test(codPostal) && $.trim(codPostal).length !== 0) {

            $("#regCP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Es obligatorio 5 dígitos, no se permiten caracteres especiales sólo números</div>')

            return false;
        }
    } else {
        $("#regCP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordAE").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordAE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    } //else {
    //     $("#regPasswordAE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
    //     return false;
    // }
})
/**---------------Fin validar campos alumno. */
/**===================================
 * Completar información alumnos
 ===================================*/
$(document).on("click", ".btnCompletarAlumno", function () {

    let idAlumno = $(this).attr("idAlumno");
    // console.log("idAlumno ", idAlumno);

    const datos = new FormData();
    datos.append("idAlumno", idAlumno);

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

            /**===================================
             * TRAER FOTO ALUMNO
             ===================================*/
            if (respuesta[0]["foto_al"] != 0 || respuesta[0]["foto_al"] != null) {
                $("#modalCompletarAlumno .previsualizarPortada").attr("src", respuesta[0]["foto_al"]);
                $("#modalCompletarAlumno .antiguaFotoAlumno").val(respuesta[0]["foto_al"]);
            } else {
                $("#modalCompletarAlumno .previsualizarPortada").attr("src", "vistas/img/alumno/default/anonymous.png");
            }


            /**----Fin traer imagen alumno */

            $("#modalCompletarAlumno .idAlumno").val(respuesta[0]["id"]);
            $("#modalCompletarAlumno .numeroMatricula").val(respuesta[0]["matricula_al"]);
            $("#modalCompletarAlumno .regAlumno").val(respuesta[0]["nombre_al"]);
            $("#modalCompletarAlumno .regApellidoP").val(respuesta[0]["apellidoPaterno_al"]);
            $("#modalCompletarAlumno .regApellidoM").val(respuesta[0]["apellidoMaterno_al"]);
            $("#modalCompletarAlumno .regEmailA").val(respuesta[0]["email_al"]);

            $("#modalCompletarAlumno .passwordActualA").val(respuesta[0]["password"]);
            /*=============================================
            GUARDAR CAMBIOS DEL ALUMNO
            =============================================*/
            $(".guardarCambiosAlumno").click(function () {
                /*=============================================
                PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
                =============================================*/
                if ($("#modalCompletarAlumno .regAlumno").val() != "" &&
                    $("#modalCompletarAlumno .regApellidoP").val() != "" &&
                    $("#modalCompletarAlumno .regApellidoM").val() != "" &&
                    $("#modalCompletarAlumno .regEmailA").val() != "") {

                    editarAlumno();
                } else {
                    swal({
                        title: "Llenar todos los campos obligatorios",
                        type: "error",
                        confirmButtonText: "¡Cerrar!"
                    });

                    return;
                }
            })
            /**---------Fin guardar cambios del alumno. */
        }
    })
})
/**-------------Fin editar alumnos */
function editarAlumno() {
    let idAlumno = $("#modalCompletarAlumno .idAlumno").val();
    // console.log("idAlumno ", idAlumno);
    const numeroMatricula = $("#modalCompletarAlumno .numeroMatricula").val();
    // console.log("numeroMatricula ", numeroMatricula);
    const regAlumno = $("#modalCompletarAlumno .regAlumno").val();
    const regApellidoP = $("#modalCompletarAlumno .regApellidoP").val();
    const regApellidoM = $("#modalCompletarAlumno .regApellidoM").val();
    const regEmailA = $("#modalCompletarAlumno .regEmailA").val();
    const regPasswordAE = $("#modalCompletarAlumno .regPasswordAE").val();
    const passwordActualA = $("#modalCompletarAlumno .passwordActualA").val();
    const antiguaFotoAlumno = $("#modalCompletarAlumno .antiguaFotoAlumno").val();

    const datosAlumno = new FormData();
    datosAlumno.append("id", idAlumno);
    datosAlumno.append("fotoAlumnoEdit", imagenAlumno);
    datosAlumno.append("numeroMatriculaEdit", numeroMatricula);
    datosAlumno.append("regAlumnoEdit", regAlumno);
    datosAlumno.append("regApellidoPEdit", regApellidoP);
    datosAlumno.append("regApellidoMEdit", regApellidoM);
    datosAlumno.append("regEmailAEdit", regEmailA);
    datosAlumno.append("regPasswordAE", regPasswordAE);
    datosAlumno.append("passwordActualA", passwordActualA);
    datosAlumno.append("antiguaFotoAlumno", antiguaFotoAlumno);

    $.ajax({
        url: "ajax/alumno.ajax.php",
        method: "POST",
        data: datosAlumno,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            // console.log("respuesta ", respuesta);
            if (respuesta == "ok") {

                swal({
                    type: "success",
                    title: "Los datos alumno se han modificado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "mostraralumno";

                    }
                })
            }
        }
    })
}
/**-------------Fin completar información alumno */
/**===================================
 * =================FUNCIONALIDAD DE DOCUMENTOS PDF
 ===================================*/
/**VALIDACIÓN DE EXITENCIA DE ARCHIVO PDF */
$(".datosAlumno").change(function () {

    $(".alert").remove();

    const datosAlumno = $(this).val();
    // console.log("DatosAlumno ", DatosAlumno);

    const datos = new FormData();
    datos.append("validarDatosAlumno", datosAlumno);

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

            if (respuesta.length != 0) {

                $(".datosAlumno").parent().after('<div class="alert alert-warning">Ya tienes docuementos con el mismo nombre</div>');

                $(".datosAlumno").val("");

            }

        }

    })

})
/**===================================
 * ELIMINAR ALUMNO
 ===================================*/
$('.tablaAlumno tbody').on("click", ".btnEliminarAlumno", function () {

    let idAlumno = $(this).attr("idAlumno");
    const fotoAlumno = $(this).attr("fotoAlumno");

    swal({
        title: '¿Está seguro de borrar el alumno?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar alumno!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=mostraralumno&idAlumno=" + idAlumno + "&fotoAlumno=" + fotoAlumno;

        }

    })
})
/**===================================
 * MOSTRAR DATOS DE DOCUMENTOS DE ALUMNO
 ===================================*/
$(".tablaMostrarDoc").on("click", ".btnEditarDocumento", function () {

    const idDocument = $(this).attr("idDocument");
    // console.log("idDocument ", idDocument);

    const datos = new FormData();
    datos.append("idDocument", idDocument);

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
            $("#modalEditarDocumento .idDocument").val(respuesta["id"]);
            $("#modalEditarDocumento .idAlumnoDoc").val(respuesta["id_alumno"]);
            $("#modalEditarDocumento .datosAlumnoAntiguo").val(respuesta["documentos"]);
        }
    })
})
/**-----------Fin mostrar documentos alumno. */
/**===================================
 * ELIMINAR PDF DOCUMENTO
 ===================================*/
$('.tablaMostrarDoc').on("click", ".btnEliminarDocumento", function () {

    let idDocument = $(this).attr("idDocument");
    console.log("idDocument ", idDocument);
    const docpdf = $(this).attr("docpdf");
    // console.log("docpdf ", docpdf);

    swal({
        title: '¿Está seguro de borrar el documento PDF?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar documento PDF!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=perfilalumno&idDocument=" + idDocument + "&docpdf=" + docpdf;

        }

    })
})
/**===================================
 * MOSTRAR DATOS DE DOCUMENTOS DE ALUMNO EN ADNMINSTRADOR
 ===================================*/
$(".tablaMostrarDocAlad").on("click", ".btnEditarDocumentoA", function () {

    const idDocument = $(this).attr("idDocument");
    // console.log("idDocument ", idDocument);

    const datos = new FormData();
    datos.append("idDocument", idDocument);

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
            $("#modalEditarDocumentoA .idDocument").val(respuesta["id"]);
            $("#modalEditarDocumentoA .idAlumnoDoc").val(respuesta["id_alumno"]);
            $("#modalEditarDocumentoA .datosAlumnoAntiguo").val(respuesta["documentos"]);
        }
    })
})
/**===================================
 * ELIMINAR PDF DOCUMENTO ADMISTRADOR
 ===================================*/
$('.tablaMostrarDocAlad').on("click", ".btnEliminarDocumentoA", function () {

    let idDocument = $(this).attr("idDocument");
    // console.log("idDocument ", idDocument);
    const docpdf = $(this).attr("docpdf");
    // console.log("docpdf ", docpdf);

    swal({
        title: '¿Está seguro de borrar el documento PDF?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar documento PDF!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=documentos&idDocument=" + idDocument + "&docpdf=" + docpdf;

        }

    })
})
