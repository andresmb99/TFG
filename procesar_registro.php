<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'bd.php';
require_once 'sesiones.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $repetir_pw = $_POST['repetir_pw'];

    //validacion basica
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email inválido. Introduce un email válido.";
        return;
    }

    //comprobar que las pw´s coincidan
    if($pw !== $repetir_pw){
        echo "Las contraseñas no coinciden";
        return;
    }

    //comprobar si el email existe
    $u= comprobar_usuario($email, $pw);
    if($u !== FALSE){
        echo "Este email ya está registrado.";
        return;
    }

    //insertar nuevo user a bbdd
    $resultado = registrar_usuario($email, $pw);
    if($resultado){
        echo "Registrado exitosamente. Ya puedes iniciar sesión.";
        header("Location: login.php");
        exit();
    }else{
        echo "Error al registrar su usuario.";
    }
}

//funcion registrar nuevo user
function registrar_usuario($email, $pw){
    $bd= obtenerConexion();

    //hashear contra
    $pw_hash= password_hash($pw, PASSWORD_DEFAULT);

    //insertar a BBDD
    $sql= "INSERT INTO usuarios (email, pw) VALUES (?, ?)";
    $res= $bd->prepare($sql);
    return $res->execute([$email, $pw_hash]);
}
?>