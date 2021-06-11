
<!-- Incluimos nuestro Header  -->
<?php include_once './includes/templates/header.php';
// header("Refresh:15; url=http://localhost/programacion_PHP/ProyectoDAW/FuencaFreaksWeb/");
header("Refresh:15; url=http://localhost/ProyectoDAW/FuencaFreaksWeb/");
?>
    <section class="seccion contenedor">
        <h2>Resumen del registro</h2>

                <?php

                $resultado = filter_var( $_GET['exito'], FILTER_VALIDATE_BOOLEAN); // esta linea si no tiene esos comandos no se ejecuta el false

                $id_pago = $_GET['id_pago'];

                if ($resultado && isset($_GET['paymentId'])){
                    $paymentId = $_GET['paymentId'];
                    ?>
                    <div class="resultado correcto">
                    EL pago se ha realizado correctamente y el ID del pago es <?=$paymentId;?>
                    </div>

                    <?php
                        require_once('includes/funciones/bd_conexion.php');
                        $stmt = $db->prepare('UPDATE participantes SET pagado = ? WHERE id_participante = ?');
                        $pagado = 1;
                        $stmt->bind_param('ii', $pagado, $id_pago);
                        $stmt->execute();
                        $stmt->close();
                        $db->close();
                }else{
                    ?>
                    <div class="resultado error">
                    El pago se ha cancelado.
                    </div>
            <?php }


?>


    </section>

<!-- Incluimos nuestro Footer  -->
<?php include_once './includes/templates/footer.php';?>
