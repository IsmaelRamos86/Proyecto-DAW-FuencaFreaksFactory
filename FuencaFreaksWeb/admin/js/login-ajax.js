$(document).ready(function() {

    //Login en el Administrador de Eventos
    $('#login-admin').on('submit', function(e) {

        e.preventDefault(); //Evitamos nos salte la pagina de destino de formulario

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'), //tipo de llamada
            data: datos, //lo que mandamos
            url: $(this).attr('action'), //donde lo mandamos
            dataType: 'json', //en que formato
            success: function(data) {
                var resultado = data;
                if (resultado.respuesta == 'acceso_correcto') {
                    swal(
                        'Bienvenido/a ' + resultado.usuario + '!',
                        'Sus credenciales son correctas',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'dashboard.php';
                    }, 2000);
                } else {
                    swal(
                        'Vaya!',
                        'Usuario y/o Password incorrectos',
                        'error'
                    )
                }

            }
        })
    });

});