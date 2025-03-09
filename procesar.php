<?php
require 'sesiones.php';
require_once 'bd.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="procesar.css">
</head>
<body>
    <?php
    require 'cabecera.php';
    $res= insertar_pedido($_SESSION['carrito'], $_SESSION['numero_id']);
    if(!$res){
        echo "Error al procesar pedido";
    }else{
        echo "<div class='realizado'>Pedido realizado correctamente</div>";
    } //envia email confirmacion de pedido aqui (proximamente)
    $_SESSION['carrito']=[];
    ?>

<footer>
    <section id=footer>
        <aside class="footer-segmento">
            <h4 tittle="Tesla &copy;"><a>Tesla &copy; 2024</a></h4>
        </aside>

        <aside class="footer-segmento">
            <h4 tittle="Privacidad y legal"><a>Privacidad y legal</a></h4>
        </aside>

        <aside class="footer-segmento">
            <h4 tittle="Noticias"><a>Noticias</a></h4>
        </aside>

    </section>
</footer>
    
</body>
</html>