$(function () {
    $('#forgotPasswordForm').validate({
        rules: {
            txtIdentificacion: { required: true }
        },
        messages: {
            txtIdentificacion: { required: 'La identificación es obligatoria' }
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