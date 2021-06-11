$(document).ready(function() {
    $('.sidebar-menu').tree()


    //  script de paginación
    $('#resgistros').DataTable({
        'paging': true,
        // 'pageLength': 3,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'language': {
            paginate: {
                next: 'Siguiente',
                previous: 'Anterior',
                last: 'Último',
                first: 'Primero'
            },

            info: 'Mostrando _START_ a _END_ de _TOTAL_ registros',
            emptyTable: 'No existen datos disponibles',
            infoEmpty: 'No hay registros',
            search: 'Buscar',
            "lengthMenu": "Mostrando _MENU_ registros por página"
        }
    });



    $('#crear-registro-admin').attr('disabled', true);

    $('#repetir-password').on('blur', function() {
        var password_nuevo = $('#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado-password').text('Passwords Correctas');
            $('#resultado-password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('#crear-registro-admin').attr('disabled', false);
        } else {
            $('#resultado-password').text('No coinciden ambas passwords');
            $('#resultado-password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('#crear-registro-admin').attr('disabled', true);
        }

    });
    //Llamada a Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
    //Llamada a Timepicker
    $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false

    });
    $('#icono').iconpicker();

    // LINE CHART

    $.getJSON('./servicio-registrados.php', function(data) {
        console.log(data);

        var line = new Morris.Line({
            element: 'grafica-registros',
            resize: true,
            data: data,
            xkey: ['fecha'],
            ykeys: ['inscritos'],
            labels: ['Inscritos'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto',
            parseTime: false
        });

    });
});