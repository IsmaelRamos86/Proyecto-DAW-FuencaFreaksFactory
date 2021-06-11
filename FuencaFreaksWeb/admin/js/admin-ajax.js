$(document).ready(function() {

    //Crear o Actualizar un registro en la Base de datos
    $('#guardar-registro').on('submit', function(e) {

        e.preventDefault(); //Evitamos nos salte la pagina de destino de formulario

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'), //tipo de llamada
            data: datos, //lo que mandamos
            url: $(this).attr('action'), //donde lo mandamos
            dataType: 'json', //en que formato
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    swal(
                        'Bravo!',
                        'El registro ha actualizado la base de datos',
                        'success'
                    )
                } else {
                    swal(
                        'Vaya!',
                        'Algo no ha salido bien...',
                        'error'
                    )
                }
            }
        })
    });

    //Usamos este metodo AJAX cuando tenemos archivos
    $('#guardar-registro-archivo').on('submit', function(e) {

        e.preventDefault(); //Evitamos nos salte la pagina de destino de formulario

        var datos = new FormData(this);

        $.ajax({
            type: $(this).attr('method'), //tipo de llamada
            data: datos, //lo que mandamos
            url: $(this).attr('action'), //donde lo mandamos
            dataType: 'json', //en que formato
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    swal(
                        'Bravo!',
                        'El registro ha actualizado la base de datos',
                        'success'
                    )
                } else {
                    swal(
                        'Vaya!',
                        'Algo no ha salido bien...',
                        'error'
                    )
                }
            }
        })
    });

    //Eliminar un registro de la BBDD
    $('.borrar-registro').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        //Priemera parte del mensaje de confirmacion con SweetAlert2
        swal({
            title: 'Estás seguro de Borrar?',
            text: 'Una vez Eliminado no podrás recuperar el Registro',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar',
            cancelButtonText: 'Cancelar'
        }).then(function() {

            $.ajax({
                type: 'post',
                data: {
                    'id': id,
                    'registro': 'eliminar',
                },
                url: 'modelo-' + tipo + '.php',
                success: function(data) {
                    //Convertimos la cadena a objeto
                    var resultado = JSON.parse(data);
                    if (resultado.respuesta == 'exito') {
                        //Segundo Sweet Alert Confirmando la Eliminacion del Registro
                        swal(
                            'Borrado!',
                            'El Registro ha sido eliminado',
                            'success'
                        )
                        jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                    } else {
                        //Segundo Sweet Alert ERROR en la Eliminacion del Registro
                        swal(
                            'Error!',
                            'No ha llegado a borrarse el registro',
                            'error'
                        )
                    };

                },
            })


        });



    });


});