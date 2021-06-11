$(function() {


    // Agregar clase a menú para marcar en la página que estamos
    $('body.nosotros nav.navegacion-principal a:contains("Nosotros")').addClass('activo');
    $('body.eventos nav.navegacion-principal a:contains("Partidas")').addClass('activo');
    $('body.amigos nav.navegacion-principal a:contains("Directores")').addClass('activo');

    //Scrolling en el NavBar

    var alturaVentana = $(window).height();
    var alturaBarra = $('.barra').innerHeight();
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > alturaVentana) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': alturaBarra + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    });

    //Menú de hamburguesa Responsive

    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });



    //Aqui estamos gestinando el cuadro de primer vistazo a nuestras partidas
    $('.programa-evento .info-mesa:first').show();
    $('.menu-programa a:first').addClass('activo');
    $('.menu-programa a').on('click', function() {
        $('.menu-programa a').removeClass('activo');
        $(this).addClass('activo');
        $('.ocultar').hide();
        var enlace = $(this).attr('href');
        $(enlace).fadeIn(1000);
        return false;
    });

    //Animaciones para los números con JQuery
    var resumenEvento = jQuery('.resumen-evento');
    if (resumenEvento.length > 0) {
        $('.resumen-evento').waypoint(function() {
            $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1200);
            $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 20 }, 1200);
            $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 95 }, 1200);

        }, {
            offset: '60%'
        });
    };


    //Cuenta atrás

    $('.cuenta-atras').countdown('2021/07/09 00:00:00', function(event) {
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });


    // LETTERING
    $("#intro-text > h1").css('opacity', 1).lettering('words').children("span").lettering().children("span").lettering();
});