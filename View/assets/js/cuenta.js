$(function () {
    $('#PasswordForm').validate({
        rules: {
            txtContrasenaActual: { required: true },
            txtContrasenaNueva: { required: true },
            txtConfirmarContrasena: { required: true, equalTo: '#txtContrasenaNueva' }
        },
        messages: {
            txtContrasenaActual: { required: 'La contraseña actual es obligatoria' },
            txtContrasenaNueva: { required: 'La nueva contraseña es obligatoria' },
            txtConfirmarContrasena: { required: 'Debe confirmar la nueva contraseña', equalTo: 'Las contraseñas no coinciden' }
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