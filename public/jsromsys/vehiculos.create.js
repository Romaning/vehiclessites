$(function () {

});
/*var otronuveorequerimiento =  "<div class='row'>" +
    "<div class='col-lg-1'><input type='text' value='"+ano+"' class='form-control' name='campoa[]'></div>" +
    "<div class='col'><input type='text' value='' class='form-control' name='campob[]'></div>" +
    "<div class='col'><input type='text' value='' class='form-control' name='campoc[]'></div>" +
    "<div class='col'><input type='text' value='' class='js-flatpickr form-control material_green' name='campod[]' id='datepickerr"+contador+"' placeholder='Año-mes-dia'></div>" +
    "<div class='col'><input type='file' value='' class='form-control' name='campoe[]'></div>" +
    "<div class='btn-eliminar'>" +
    "<i class='fas fa-trash'></i>" +
    "</div>" +
    "</div>" +
    "</div>" +
    "</div>";*/

/*
var contador = 0;
var fechaano= new Date();
var ano = fechaano.getFullYear();
*/

var nuveorequerimiento = $('#body_tb_insertar_campos').html();
$(document).on('click', '#btn_generar_filas', function () {
    /*contador = contador +1;*/
    $('#body_tb_insertar_campos').append(nuveorequerimiento);
    $(".datepickerr"/*+contador*/).flatpickr();
    $(".datepickerr"/*+contador*/).flatpickr("option", "dateFormat", "yy-mm-dd");
});

$(document).on('click', '.btn-eliminar', function () {
    $(this).parent().remove();
})
/*var roman = $('input[name=inputarray]').val();*/

/*
var nuveorequerimiento = $('#body_tb_insertar_campos').html();
$('#btn_genra').click(function () {
    $('#body_tb_insertar_campos').append(nuveorequerimiento);
});
*/

/*
var contador = 0;
$('#btn_generar_filas').click(function () {
    contadorFila = contadorIdFilas();
    var fecha = new Date();
    var ano = fecha.getFullYear();
    $('#tabla_insertar_campos').append(
        "<tr id='fila" + contadorFila + "'>" +
        "<td>" +
        "<input type='text'  id='campoa" + contador + "' value='" + ano + "'>" +
        "</td>" +
        "<td>" +
        "<input type='text'  id='campob" + contador + "'>" +
        "</td>" +
        "<td>" +
        "<input type='text'  id='campoc" + contador + "'>" +
        "</td>" +
        "<td>" +
        "<label for='example-flatpickr-custom'>FECHA FIN COBERTURA DE SOAT</label>" +
        "<input type='text' class='js-flatpickr form-control bg-white' id='fecha_fin_cobertura_soat'" +
        "name='fecha_fin_cobertura_soat' placeholder='Año-mes-dia' data-date-format='Y-m-d'>" +
        "</td>" +
        "<td>" +
        "<input type='file'  id='campoe" + contador + "'>" +
        "</td>" +
        "<td>" +
        "<input type='text'  id='campof" + contador + "'>" +
        "</td>" +
        "</tr>"
    );
});

function contadorIdFilas() {
    contador = contador + 1;
    return contador;
}
*/
