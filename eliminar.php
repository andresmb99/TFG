<?php
require_once 'sesiones.php';
comprobar_sesion();
$producto_id = $_POST['producto_id'];
$cantidad = (int)$_POST['cantidad'];

if(isset($_SESSION['carrito'][$producto_id])){
    $_SESSION['carrito'][$producto_id] -= $cantidad;

    if($_SESSION['carrito'][$producto_id] <=0){
        unset($_SESSION['carrito'][$producto_id]);
    }
}
header("Location: carrito.php");
?>