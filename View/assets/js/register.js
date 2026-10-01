$(function () {
    $('#txtNombre').prop('readonly', true);
});

function ConsultarNombre()
{
    let identificacion = $("#txtIdentificacion").val();
    $("#txtNombre").val("");

    if(identificacion.length >= 9) {
        $.ajax({
            url: 'https://apis.gometa.org/cedulas/' + identificacion,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if(response && response.resultcount > 0) {
                    $("#txtNombre").val(response.nombre);
                }
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
}