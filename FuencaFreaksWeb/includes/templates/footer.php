<footer class="site-footer">
        <div class="contenedor clearfix">
            <div class="footer-informacion">
                <h3>Sobre <span>FuencaFreaksFactory</span></h3>
                <p>FuencaFreaksFactory lleva en activo desde 2017. Desde el distrito madrileño de Fuencarral, nos esforzamos en hacer accesibles los juegos de mesa modernos, así como juegos de rol de diversas temáticas. Nuestras mesas de juego están dirigidas y
            explicadas por los mejores Directores de Juego, no teniendo que preocuparte nada más que de disfrutar.</p>
            </div>
            <div class="ultimos-tweets">
                <h3>Últimos <span>tweets</span></h3>
                <a class="twitter-timeline" data-lang="es" data-height="200" data-theme="dark" data-link-color="#fe4918" href="https://twitter.com/FuencaFreaks?ref_src=twsrc%5Etfw">Tweets by FuencaFreaks</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>            </div>
            <div class="menu">
                <h3>Redes <span>sociales</span></h3>
                <nav class="redes-sociales">
                    <a href="https://www.meetup.com/es-ES/FUENCAFREAKSFACTORY" target="_blank"><i class="fab fa-meetup" aria-hidden="true"></i></a>
                    <a href="https://twitter.com/FuencaFreaks" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/fuencafreaksfactory/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="mailto:fuencafreaksfactory@gmail.com"><i class="fas fa-envelope-open-text"></i></a>
                </nav>
            </div>
        </div>
        
            <!-- Begin Mailchimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                    /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                    We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                </style>
                <div style="display:none;">
                    <div id="mc_embed_signup">
                        <form action="https://gmail.us6.list-manage.com/subscribe/post?u=5c904883f8b47d85a577cedf7&amp;id=aac8a0135f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                            <h2>Suscribete y no te pierdas las novedades</h2>
                        <div class="indicates-required"><span class="asterisk">*</span> Campo requerido</div>
                        <div class="mc-field-group">
                            <label for="mce-EMAIL">Correo Electrónico  <span class="asterisk">*</span>
                        </label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5c904883f8b47d85a577cedf7_aac8a0135f" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribirse" name="subscribe" id="mc-embedded-subscribe" class="button loat-right"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        
    </footer>




    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <!-- Aqui metemos nuestros plugins para tenerlos en archivos separados -->
    <!-- Este plugin de JQuery anima números -->
    <script src="js/jquery.animateNumber.min.js"></script>
    <!-- Este plugin de JQuery es para cuentas regresivas -->
    <script src="js/jquery.countdown.min.js"></script>
    <!-- Este plugin de JQuery es para modificar textos -->
    <script src="js/jquery.lettering.js"></script>
    <!-- Este plugin para las inscripciones -->
    <script src="js/cotizador.js"></script>
    <!-- Este plugin para las inscripciones -->
  


    <?php
        $archivo = basename($_SERVER['PHP_SELF']); /* Esta linea retorna a la variable el nombre del archivo cargado */
        $pagina = str_replace('.php','',$archivo); /* Esta linea reemplaza el primer parametro por el segundo de lo encontrado en el tercer parametro */
        if($pagina == 'amigos' || $pagina == 'index'){
            /* Este plugin de JQuery es para colorbox para la galeria amigos */
            echo '<script src="js/jquery.colorbox-min.js"></script>';
            /* Este plugin de JQuery es para activar una animacion cuando es visible */
            echo '<script src="js/jquery.waypoints.min.js"></script>';
        }
        elseif($pagina == 'nosotros'){
            /* Este plugin de JQuery es para lightbox para la galeria nosotros */
            echo '<script src="js/lightbox.js"></script>';
        }
    ?>

    <!-- Agregamos el JS de Leaftlet para incluir el mapa  -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
