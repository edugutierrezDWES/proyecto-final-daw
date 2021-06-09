(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('form-horizontal');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {

                let dd = $("#dato_entrada").val().slice(0,2);
                let mm = $("#dato_entrada").val().slice(3,5);
                let yy = $("#dato_entrada").val().slice(6);
                let dato_entrada = new Date(yy+"-"+mm+"-"+dd);
                
                dd = $("#dato_salida").val().slice(0,2);
                mm = $("#dato_salida").val().slice(3,5);
                yy = $("#dato_salida").val().slice(6);
                let dato_salida = new Date(yy+"-"+mm+"-"+dd);
                if (today <= dato_entrada && dato_entrada < dato_salida)
                {
                    $('.fecha_validacion').removeClass('is-invalid');
                    $('#error_fechas').removeClass('d-block');
                    $('.fecha_validacion').addClass('is-valid');
                }
                else {
                    $('.fecha_validacion').removeClass('is-valid');
                    $('.fecha_validacion').addClass('is-invalid');
                    $('#error_fechas').addClass('d-block');
                    event.preventDefault();
                    event.stopPropagation();
                }
            }, false);
        });
    }, false);
})();