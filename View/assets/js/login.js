$(function () {
    $('#loginForm').validate({
        rules: {
            txtIdentificacion: { required: true },
            txtContrasenna: { required: true }
        },
        messages: {
            txtIdentificacion: { required: 'La identificación es obligatoria' },
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