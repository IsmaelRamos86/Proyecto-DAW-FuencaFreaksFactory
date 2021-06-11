(function() {
    'use strict'
    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function() {



        //Campos de los datos del ususario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos de las opciones ofrecidas

        var opcion_partida = document.getElementById('budget-1');
        var opcion_socio = document.getElementById('budget-2');
        var opcion_jornada = document.getElementById('budget-3');



        //div y botones
        var calcular = document.getElementById('calcular');
        var botonRegistro = document.getElementById('btnRegistro');
        var errorDiv = document.getElementById('error');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        //Extras
        var pegatinas = document.getElementById('pegatinas');
        var camisas = document.getElementById('camisas_club');

        botonRegistro.disabled = true; /* botón de pagar en formulario de registro.php deshabilitado  */
        if (botonRegistro.disabled == true) {
            botonRegistro.style.backgroundColor = "var(--dark-light)";
            botonRegistro.style.borderColor = "var(--dark-light)";
            botonRegistro.style.color = "var(--primario)";
        }

        if (document.getElementById('calcular')) {
            calcular.addEventListener('click', calcularImporte);

            opcion_partida.addEventListener('click', mostrarDias);
            opcion_socio.addEventListener('click', mostrarDias);
            opcion_jornada.addEventListener('click', mostrarDias);

            nombre.addEventListener('blur', validarCampo);
            apellido.addEventListener('blur', validarCampo);
            email.addEventListener('blur', validarCampo);
            email.addEventListener('blur', validarEmail);

            var formulario_editar = document.getElementsByClassName('editar-registrado');
            if (formulario_editar.length > 0) {
                if (opcion_partida.value || opcion_socio || opcion_jornada.value) {
                    mostrarDias();
                };
            };

            function validarCampo() {
                if (this.value == '') {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Campo obligatorio";
                    errorDiv.style.border = '2px solid red';
                    this.style.border = '2px solid red';

                } else {
                    errorDiv.style.display = "none";
                    this.style.border = '1px solid var(--oscuro)';
                }
            }

            function validarEmail() {
                if (this.value.indexOf('@') > -1) {
                    errorDiv.style.display = "none";
                    this.style.border = '1px solid var(--oscuro)';
                } else {
                    errorDiv.style.display = "block";
                    errorDiv.innerHTML = "Obligatorio en campo una @";
                    errorDiv.style.border = '2px solid red';
                    this.style.border = '2px solid red';
                }
            }



            function calcularImporte(event) {
                event.preventDefault();


                if (regalo.value === '-------- Regalos --------') {
                    alert('Debes elegir un Regalo');
                    regalo.focus();
                } else {
                    var coste = 0,
                        ticketOpcion1 = 0,
                        ticketOpcion2 = 0,
                        ticketOpcion3 = 0,
                        partidas = 0,
                        contCheck = 0,
                        input = document.getElementsByTagName('input');


                    /* Los IF comprueban que los Input de las opciones de las partidas esten seleccionadas y le asigna 
                        su valor correspondiente para despues mostrarlo */
                    if (input[3].checked) {
                        coste = 15;
                        ticketOpcion1 = 1;
                        partidas = 3;
                    }

                    if (input[4].checked) {
                        coste = 5;
                        ticketOpcion2 = 1;
                        partidas = 1;
                    }

                    if (input[5].checked) {
                        coste = 20;
                        ticketOpcion3 = 1;
                        partidas = 5;
                    }

                    for (let i = 6; i < (input.length - 10); i++) {
                        if (input[i].checked) {
                            contCheck++;
                        }

                    }
                    lista_productos.style.display = 'block';
                    lista_productos.innerHTML = '';

                    if (contCheck != partidas) {

                        lista_productos.innerHTML += '* Tiene que marcar la misma cantidad de partidas que ha seleccionado.<br/>';
                        botonRegistro.disabled = true;
                        botonRegistro.style.backgroundColor = "var(--dark-light)";
                        botonRegistro.style.borderColor = "var(--dark-light)";
                        botonRegistro.style.color = "var(--primario)";
                    } else {

                        var cantCamisas = parseInt(camisas.value, 10) || 0,
                            cantPegatinas = parseInt(pegatinas.value, 10) || 0;

                        var totalPagar = coste +
                            (cantCamisas * 10) * 0.93 + (cantPegatinas * 2);

                        var listadoProductos = [];

                        if (ticketOpcion1 >= 1) {
                            listadoProductos.push(ticketOpcion1 + ' ticket 3 Partidas');
                        }
                        if (ticketOpcion2 >= 1) {
                            listadoProductos.push(ticketOpcion2 + ' ticket 1 Partidas');
                        }
                        if (ticketOpcion3 >= 1) {
                            listadoProductos.push(ticketOpcion3 + ' ticket 5 Partidas');
                        }
                        if (cantCamisas >= 1) {
                            listadoProductos.push(cantCamisas + ' camisetas del club');
                        }
                        if (cantPegatinas >= 1) {
                            listadoProductos.push(cantPegatinas + ' paquetes de pegatinas');
                        }
                        /* lista_productos.style.display = 'block'; */

                        /*                     lista_productos.innerHTML = '';
                         */
                        for (var i = 0; i < listadoProductos.length; i++) {
                            lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                        }

                        suma.innerHTML = totalPagar.toFixed(2) + ' €'; /* toFixed formatea que solo devulva 2 decimales */

                        botonRegistro.disabled = false;
                        if (botonRegistro.disabled == false) {
                            botonRegistro.style.backgroundColor = "var(--primario)";
                            botonRegistro.style.borderColor = "var(--secundario)";
                            botonRegistro.style.color = "var(--blanco)";
                        }

                        document.getElementById("total_pedido").value = totalPagar;
                    }
                }
            }

            function mostrarDias() {
                var ticketOpcionPartida = parseInt(opcion_partida.value),
                    ticketOpcionSocio = parseInt(opcion_socio.value),
                    ticketOpcionJornada = parseInt(opcion_jornada.value);

                var diasElegidos = [];
                var diasNoElegidos = [];



                /* Parte que muestra todos los días SIEMPRE */

                if (ticketOpcionPartida >= 1 || ticketOpcionSocio >= 1 || ticketOpcionJornada >= 1) {
                    diasElegidos.push('viernes', 'sábado', 'domingo');
                } else {
                    diasNoElegidos.push('viernes', 'sábado', 'domingo');
                    ocultarDias(diasNoElegidos);
                }

                for (let i = 0; i < diasElegidos.length; i++) {
                    document.getElementById(diasElegidos[i]).style.display = 'block';
                }
            }

            function ocultarDias(diasNoElegidos) {
                for (let i = 0; i < diasNoElegidos.length; i++) {
                    document.getElementById(diasNoElegidos[i]).style.display = 'none';
                }
            }


        }


    }); //DOM CONTENT LOADED
})();