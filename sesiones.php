<?php
session_start();

function comprobar_sesion(){
    if(!isset($_SESSION['numero_id'])){
        header("Location: login.php?redirigido=true");
        exit();
    }
}
?>