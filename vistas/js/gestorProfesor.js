/**===================================
 * CARGAR TABLA DINÁMICA DE PROFESORES
 ===================================*/
// $.ajax({

//     url: "ajax/tablaProfesor.ajax.php",
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
$(".tablaProfesor").DataTable({
    "ajax": "ajax/tablaProfesor.ajax.php",
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
 * TALBA HORARIO PROFESOR
 ===================================*/
$(".tablaHorarioProfesorH").DataTable({
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
$(document).on("click", ".btnActivarP", function () {

    const idProfesor = $(this).attr("idProfesor");
    // console.log("idProfesor ", idProfesor);
    const estadoProfesor = $(this).attr("estadoProfesor");
    // console.log("estadoProfesor ", estadoProfesor);

    const datos = new FormData();
    datos.append("activarIdP", idProfesor);
    datos.append("activarProfesor", estadoProfesor);

    $.ajax({

        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta", respuesta);

        }

    });

    if (estadoProfesor == 0) {

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoProfesor', 1);

    } else {

        $(this).addClass('btn-success');
        $(this).removeClass('btn-danger');
        $(this).html('Activo');
        $(this).attr('estadoProfesor', 0);

    }

})
/**----Limpiar el alert de validacion al poscionar el focus en el input.*/
$("input").focus(function () {
    $(".alert").remove();

});
/**-----Convertir en mayúsculas la entrada en el input */
function mayusP(e) {
    e.value = e.value.toUpperCase();
}
/*=============================================
REVISAR SI LA CÉDULA EXISTE
=============================================*/

$(".validarCedula").change(function () {

    $(".alert").remove();

    const cedula = $(this).val();
    // console.log("cedula ", cedula);

    const datos = new FormData();
    datos.append("validarCedula", cedula);

    $.ajax({
        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".validarCedula").parent().after('<div class="alert alert-warning">La cédula ya existe en la base de datos</div>');

                $(".validarCedula").val("");

            }
        }
    })
})
/*=============================================
REVISAR SI LA EMAIL EXISTE
=============================================*/

$(".regEmailP").change(function () {

    $(".alert").remove();

    const emailP = $(this).val();
    // console.log("emailP ", emailP);

    const datos = new FormData();
    datos.append("validaremailP", emailP);

    $.ajax({
        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);

            if (respuesta.length != 0) {

                $(".regEmailP").parent().after('<div class="alert alert-warning">El correo electrónico ya existe en la base de datos</div>');

                $(".regEmailP").val("");

            }

        }

    })

})

/*=============================================
VALIDAR EL REGISTRO DE USUARIO
=============================================*/
$(".guardarProfesor").click(function () {
    /*=============================================
    VALIDAR CÉDULA
    =============================================*/

    const cedula = $("#cedulaP").val();
    const nombre = $("#regProfesor").val();
    const apellidoPaterno = $("#regApellidoPP").val();
    const apellidoMaterno = $("#regApellidoMP").val();
    const nacionalidad = $("#regNacionalidadP").val();
    const email = $("#regEmail").val();
    const telefono = $("#regTelP").val();
    const telefono2 = $("#regTelPalterno").val();
    const codPostal = $("#regCPP").val();
    const password = $("#regPasswordP").val();
    const estadoM = $("#regestadoMP").val();
    const genero = $("#reggeneroP").val();
    const fechaN = $("#fechaN").val();
    // console.log("cedula ", cedula);
    if (cedula !== "" && nombre !== "" && apellidoMaterno !== "" && apellidoPaterno !== "" && password !== "" && password !== "") {



        if (cedula != "") {

            const expresion = /^[a-zA-Z0-9]*$/;

            if (!expresion.test(cedula)) {

                $("#cedulaP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

                return false;

            }
        } else {

            $("#cedulaP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
            return false;
        }
        /*=============================================
        VALIDAR EL NOMBRE
        =============================================*/


        // console.log("nombre ", nombre);

        if (nombre != "") {

            const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

            if (!expresion.test(nombre)) {

                $("#regProfesor").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

                return false;

            }
        } else {

            $("#regProfesor").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
            return false;
        }
        /*=============================================
        VALIDAR EL APELLIDO PATERNO
        =============================================*/


        // console.log("nombre ", apellidoPaterno);

        if (apellidoPaterno != "") {

            const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

            if (!expresion.test(apellidoPaterno)) {

                $("#regApellidoPPP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

                return false;

            }
        } else {

            $("#regApellidoPP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
            return false;
        }
        /*=============================================
        VALIDAR EL APELLIDO PATERNO
        =============================================*/


        // console.log("nombre ", apellidoMaterno);

        if (apellidoMaterno != "") {

            const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

            if (!expresion.test(apellidoMaterno)) {

                $("#regApellidoMP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

                return false;

            }
        } else {

            $("#regApellidoMP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
            return false;
        }

        /*=============================================
        VALIDAR EL EMAIL
        =============================================*/


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



        if (password != "") {

            const expresion = /^[a-zA-Z0-9]*$/;

            if (!expresion.test(password)) {

                $("#regPasswordP").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

                return false;
            }
        } else {
            $("#regPasswordP").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
            return false;
        }

    } else {
        swal({
            type: "success",
            title: "Todos los datos requeridos deben llenarse",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        })
    }
})
/**---------------Fin validar campos Profesor. */
/*=============================================
SUBIENDO LA FOTO ALUMNO
=============================================*/
let imagenProfesor = null;
$(".fotoProfesor").change(function () {
    console.log("Hola");
    imagenProfesor = this.files[0];
    /**Nota: al ejecutar el código y colocar los límites de la cadena de 
     * trasferencia de datos en los códigos correspondientes a este apartado,
     * se presentaba un error, el atributo imagenProfesor retronaba nulo,
     * el error estaba en declarar la línea anterior con un tipo de variable,
     * en este caso era const. 
     */
    console.log("imagenProfesor ", imagenProfesor);

    /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
    if (imagenProfesor["type"] != "image/jpeg" && imagenProfesor["type"] != "image/png") {
        // Se deja una vez más el espacio.
        $(".fotoProfesor").val("");

        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        // return;

    } else if (imagenProfesor["size"] > 2000000) {

        $(".fotoProfesor").val("");

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
        datosImagen.readAsDataURL(imagenProfesor);

        $(datosImagen).on("load", function (event) {

            const rutaImagen = event.target.result;

            $(".previsualizarPortada").attr("src", rutaImagen);

        })
    }

})

/**----------------Fin subiendo foto alumno. */
/**===================================
 * GUARDAR DATOS PROFESOR
 ===================================*/
$(".guardarProfesor").click(function () {
    /**===================================
     * ALMACENAMIENTO DE TODOS LOS CAMPOS 
     * DE PROFESOR.
     ===================================*/
    const numeroCedula = $(".numeroCedula").val();
    // console.log("numeroCedula ", numeroCedula);
    const regProfesor = $(".regProfesor").val();
    const regApellidoPP = $(".regApellidoPP").val();
    const regApellidoMP = $(".regApellidoMP").val();
    const regEmailP = $(".regEmailP").val();
    const regPasswordP = $(".regPasswordP").val();

    const datosProfesor = new FormData();
    datosProfesor.append("fotoProfesor", imagenProfesor);
    datosProfesor.append("numeroCedula", numeroCedula);
    datosProfesor.append("regProfesor", regProfesor);
    datosProfesor.append("regApellidoPP", regApellidoPP);
    datosProfesor.append("regApellidoMP", regApellidoMP);
    datosProfesor.append("regEmailP", regEmailP);
    datosProfesor.append("regPasswordP", regPasswordP);

    $.ajax({
        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datosProfesor,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            // console.log("respuesta ", respuesta);
            if (respuesta == "ok") {

                swal({
                    type: "success",
                    title: "Los datos profesor se han guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "profesor";

                    }
                })
            }
        }
    })
})
/**----------Fin gaurdar datos alumno */
/*=============================================
VALIDAR LA EDICIÓN DE PROFESOR
=============================================*/
$("#modalEditarProfesor .guardarCambiosProfesor").click(function () {
    /*=============================================
    VALIDAR EL NOMBRE
    =============================================*/

    const nombre = $("#regProfesorE").val();
    // console.log("nombre ", nombre);

    if (nombre != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(nombre)) {

            $("#regProfesorE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regProfesorE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
   VALIDAR EL APELLIDO PATERNO
   =============================================*/

    const apellidoPaterno = $("#regApellidoPPE").val();
    // console.log("nombre ", apellidoPaterno);

    if (apellidoPaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoPaterno)) {

            $("#regApellidoPPE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoPPE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
    /*=============================================
    VALIDAR EL APELLIDO PATERNO
    =============================================*/

    const apellidoMaterno = $("#regApellidoMPE").val();
    // console.log("nombre ", apellidoMaterno);

    if (apellidoMaterno != "") {

        const expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

        if (!expresion.test(apellidoMaterno)) {

            $("#regApellidoMPE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten números ni caracteres especiales</div>')

            return false;

        }
    } else {

        $("#regApellidoMPE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }

    /*=============================================
    VALIDAR EL EMAIL
    =============================================*/
    const email = $("#regEmailE").val();

    if (email != "") {
        const expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

        if (!expresion.test(email) && $.trim(email).length !== 0) {

            $("#regEmailE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> Escriba correctamente el correo electrónico</div>')

            return false;
        }

        // if (validarEmailRepetido) {

        //     $("#regEmailE").parent().after('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

        //     return false;
        // }
    } else {

        $("#regEmailE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

        return false;
    }

    /*=============================================
    VALIDAR CONTRASEÑA
    =============================================*/

    const password = $("#regPasswordPE").val();

    if (password != "") {

        const expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {

            $("#regPasswordPE").parent().after('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

            return false;
        }
    } else {
        $("#regPasswordPE").parent().after('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')
        return false;
    }
})
/**---------------Fin validar campos Profesor. */
/**===================================
 * EDITAR PROFESOR
 ===================================*/
$('.tablaProfesor tbody').on("click", ".btnEditarProfesor", function () {

    let idProfesor = $(this).attr("idProfesor");

    const datos = new FormData();
    datos.append("idProfesor", idProfesor);

    $.ajax({
        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            /**===================================
             * TRAER FOTO ALUMNO
             ===================================*/
            if (respuesta[0]["foto_ma"] != 0) {
                $("#modalEditarProfesor .previsualizarPortada").attr("src", respuesta[0]["foto_ma"]);
                $("#modalEditarProfesor .antiguaFotoProfesor").val(respuesta[0]["foto_ma"]);
            } else {
                $("#modalEditarProfesor .previsualizarPortada").attr("src", "vistas/img/profesor/default/anonymous.png");
            }

            /**----Fin traer imagen alumno */

            $("#modalEditarProfesor .idProfesor").val(respuesta[0]["id"]);
            $("#modalEditarProfesor .numeroCedula").val(respuesta[0]["cedula"]);
            $("#modalEditarProfesor .regProfesor").val(respuesta[0]["nombre_ma"]);
            $("#modalEditarProfesor .regApellidoPP").val(respuesta[0]["apPaterno_ma"]);
            $("#modalEditarProfesor .regApellidoMP").val(respuesta[0]["apMaterno_ma"]);
            $("#modalEditarProfesor .regEmailP").val(respuesta[0]["email_ma"]);
            $("#modalEditarProfesor .passwordActualP").val(respuesta[0]["password"]);

            /*=============================================
            GUARDAR CAMBIOS DEL ALUMNO
            =============================================*/
            $(".guardarCambiosProfesor").click(function () {
                /*=============================================
                PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
                =============================================*/
                if ($("#modalEditarProfesor .regProfesor").val() != "" &&
                    $("#modalEditarProfesor .regApellidoPP").val() != "" &&
                    $("#modalEditarProfesor .regApellidoMP").val() != "" &&
                    $("#modalEditarProfesor .regEmailP").val() != "") {

                    editarProfesor();
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
function editarProfesor() {
    let idProfesor = $("#modalEditarProfesor .idProfesor").val();
    // console.log("idProfesor ", idProfesor);
    const numeroCedula = $("#modalEditarProfesor .numeroCedula").val();
    // console.log("numeroMatricula ", numeroMatricula);
    const regProfesor = $("#modalEditarProfesor .regProfesor").val();
    const regApellidoPP = $("#modalEditarProfesor .regApellidoPP").val();
    const regApellidoMP = $("#modalEditarProfesor .regApellidoMP").val();
    const regEmailP = $("#modalEditarProfesor .regEmailP").val();
    const regPasswordPE = $("#modalEditarProfesor .regPasswordPE").val();
    const passwordActualP = $("#modalEditarProfesor .passwordActualP").val();
    const antiguaFotoProfesor = $("#modalEditarProfesor .antiguaFotoProfesor").val();

    const datosProfesor = new FormData();
    datosProfesor.append("id", idProfesor);
    datosProfesor.append("fotoProfesorEdit", imagenProfesor);
    datosProfesor.append("numeroCedulaEdit", numeroCedula);
    datosProfesor.append("regProfesorEdit", regProfesor);
    datosProfesor.append("regApellidoPPEdit", regApellidoPP);
    datosProfesor.append("regApellidoMPEdit", regApellidoMP);
    datosProfesor.append("regEmailPEdit", regEmailP);
    datosProfesor.append("regPasswordPE", regPasswordPE);
    datosProfesor.append("passwordActualP", passwordActualP);
    datosProfesor.append("antiguaFotoProfesor", antiguaFotoProfesor);

    $.ajax({
        url: "ajax/profesor.ajax.php",
        method: "POST",
        data: datosProfesor,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {

            // console.log("respuesta ", respuesta);
            if (respuesta == "ok") {

                swal({
                    type: "success",
                    title: "Los datos profesor se han modificado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function (result) {
                    if (result.value) {

                        window.location = "profesor";

                    }
                })
            }
        }
    })
}
/**===================================
 * ELIMINAR ALUMNO
 ===================================*/
$('.tablaProfesor tbody').on("click", ".btnEliminarProfesor", function () {

    let idProfesor = $(this).attr("idProfesor");
    const fotoProfesor = $(this).attr("fotoProfesor");

    swal({
        title: '¿Está seguro de borrar el profesor?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sí, borrar profesor!'
    }).then(function (result) {

        if (result.value) {

            window.location = "index.php?ruta=profesor&idProfesor=" + idProfesor + "&fotoProfesor=" + fotoProfesor;

        }

    })
})

