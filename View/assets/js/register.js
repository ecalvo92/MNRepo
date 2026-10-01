$(function () {
    $('#txtNombre').prop('readonly', true);

    $('#registerForm').validate({
        rules: {
            txtIdentificacion: { required: true },
            txtNombre: { required: true },
            txtCorreoElectronico: { required: true, email: true },
            txtContrasenna: { required: true }
        },
        messages: {
            txtIdentificacion: { required: 'La identificación es obligatoria' },
            txtNombre: { required: 'El nombre es obligatorio' },
            txtCorreoElectronico: {
                required: 'El correo electrónico es obligatorio',
                email: 'Ingrese un correo electrónico válido'
            },
            txtContrasenna: { required: 'La contraseña es obligatoria' }
        },
        errorElement: 'div',
        errorClass: 'login-error-message',
        errorPlacement: function (error, element) {
            error.insertAfter(element.closest('.login-input-group'));
        },
        highlight: function (element) {
            $(element).addClass('login-input-invalid');
        },
        unhighlight: function (element) {
            $(element).removeClass('login-input-invalid');
        }
    });
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