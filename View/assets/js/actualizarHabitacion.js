$(function () {
    $.validator.addMethod('enteroPositivo', function (value, element) {
        return this.optional(element) || /^[1-9]\d*$/.test(value);
    });

    $.validator.addMethod('decimalPositivo', function (value, element) {
        return this.optional(element) || (/^\d+(\.\d{1,2})?$/.test(value) && parseFloat(value) > 0);
    });

    $('#txtCapacidad').on('input', function () {
        this.value = this.value.replace(/\D/g, '');
    });

    $('#txtPrecio').on('input', function () {
        let valor = this.value.replace(/[^\d.]/g, '');
        const punto = valor.indexOf('.');
        if (punto !== -1) {
            valor = valor.substring(0, punto + 1) + valor.substring(punto + 1).replace(/\./g, '').substring(0, 2);
        }
        this.value = valor;
    });

    $('#ActualizarHabitacionForm').validate({
        rules: {
            txtCapacidad: { required: true, enteroPositivo: true },
            txtPrecio: { required: true, decimalPositivo: true },
            txtCaracteristicas: { required: true },
            txtImagen: { required: true }
        },
        messages: {
            txtCapacidad: {
                required: 'La capacidad es obligatoria',
                enteroPositivo: 'Ingrese un número entero mayor a 0'
            },
            txtPrecio: {
                required: 'El precio es obligatorio',
                decimalPositivo: 'Ingrese un precio mayor a 0 (máximo 2 decimales)'
            },
            txtCaracteristicas: { required: 'Las características son obligatorias' },
            txtImagen: {
                required: 'La imagen es obligatoria'
            }
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

    $('#imgVistaPrevia')
        .on('load', function () {
            $(this).removeClass('d-none');
            $('#sinVistaPrevia').addClass('d-none');
        })
        .on('error', function () {
            if ($('#txtImagen').val().trim() !== '') {
                MostrarMensajeVistaPrevia('No se pudo cargar la imagen de la URL indicada');
            }
        });

    $('#txtImagen').on('input change', function () {
        const url = $(this).val().trim();

        if (url === '') {
            $('#imgVistaPrevia').attr('src', '');
            MostrarMensajeVistaPrevia('Ingrese la URL de la imagen para visualizarla');
            return;
        }

        $('#imgVistaPrevia').attr('src', url);
    }).trigger('change');
});

function MostrarMensajeVistaPrevia(mensaje) {
    $('#imgVistaPrevia').addClass('d-none');
    $('#sinVistaPrevia small').text(mensaje);
    $('#sinVistaPrevia').removeClass('d-none');
}