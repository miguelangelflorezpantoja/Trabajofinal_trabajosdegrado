/*=============================================
LIMPIA EL FORMULARIO DE INGRESO DE PARQUES MEMORIALES
=============================================*/

$('.modal').on('hidden.bs.modal', function () {

    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.

    // $(".alert").remove(); //lo utilice para borrar la clase alert de mensaje de duplicidad

})
/**===================================
 * ICHECK
 ===================================*/
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
});
/* jQueryKnob */
$('.knob').knob();
// Sidebar menu
$('.sidebar-menu').tree();
// Colopicker
$('.my-colorpicker').colorpicker();
// Tags input
$(".tagsInput").tagsinput({
    maxTags: 10,
    confirmKeys: [44],
    cancelConfirmKeysOnEmpty: false,
    trimValue: false
})
// Se forza a ingresar estilos diferentes al input del tag.
$(".bootstrap-tagsinput").css({
    "padding": "11px",
    "width": "100%",
    "border-radius": "1px",
    "margin-botton": ".5rem"
})
// Datepicker
// startDate: '0d' indica que no se puede seleccionar un día anterior al actual.
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    endDate: '0d'
});

// Time
const input = $('#regHoraInicial').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

const input2 = $('#regHoraFinal').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
// Edición de la fecha
const inputE = $('#regHoraInicialE').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

const inputE2 = $('#regHoraFinalE').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
// Ingresar horario de alumno
const inputEA = $('#regHoraInicialEA').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});

const inputEA2 = $('#regHoraFinalEA').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': 'now'
});
//Initialize Select2 Elements
$(function () {
    $('.select2').select2()
})
$(document).ready(function () {
    $('#tablaAlumno').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
//CORRECCIÓN BOTONERAS OCULTAS BACKEND 
if (window.matchMedia("(max-width:767px)").matches) {

    $("body").removeClass('sidebar-collapse');

} else {
    $("body").addClass('sidebar-collapse');

}



