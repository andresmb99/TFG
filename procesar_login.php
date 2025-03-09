<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'bd.php';
require_once 'sesiones.php';

if ($_SERVER["REQUEST_METHOD"] =="POST"){
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    if(empty($email) || empty($pw)){
        echo "Introduce ambos campos.";
        exit();
    } 

    //comprobar si el usuario existe
    $u = comprobar_usuario($email, $pw);

    if($u === FALSE){
        //redirigir a loging
        header("Location: login.php?error=true");
        exit();
    }else{
        //iniciar sesion y guardar los datos del usuario
        session_start();
        $_SESSION['carrito'] = [];
        $_SESSION['numero_id'] = $u->numero_id;
        $_SESSION['email'] = $u->email;

        echo("Redirigiendo a categorias.php");
        //redirigir a categorias después de iniciar sesion
        header("Location: categorias.php");
        exit();
    }
}
?>