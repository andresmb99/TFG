<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesla</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <script>
        function mostrarRegistro(){
            document.getElementById('registro_form').classList.add('active');
            document.getElementById('login_form').classList.remove('active');
        }

        function mostrarLogin(){
            document.getElementById('login_form').classList.add('active');
            document.getElementById('registro_form').classList.remove('active');
        }

        window.onload = function(){
            mostrarLogin();
        }

    </script>
</head>
<body>

<div class="contenedor-formularios-botones">
    <div class="contenedor-botones-cambio">

    <button onclick="mostrarLogin()" class="botones_cambio">Iniciar Sesión</button>
    <button onclick="mostrarRegistro()" class="botones_cambio">Registrarse</button>
    </div>

    <form action="procesar_registro.php" method="POST">
    <div id="registro_form" class="contenedor">
       <h1>Registrate</h1>
        <p>Rellena los campos del formulario para crear una cuenta</p>
        <hr>
        <label for="email">Email</label>
        <input type="text" placeholder="Introduce tu email" name="email" id="email" required>
       
        <label for="pw">Contraseña</label>
        <input type="password" placeholder="Introduce contraseña" name="pw"
        id="pw" required>

        <label for="repetir_pw">Repite la contraseña</label>
        <input type="password" placeholder="Repite contraseña" name="repetir_pw" id="repetir_pw" required>
        <hr>

        <button type="submit" class="boton_registro">Registrarse</button>
    </div>
</form>

   
<form action="procesar_login.php" method="POST">
    <div id="login_form" class="contenedor" active>
        <h1>Iniciar Sesión</h1>
            <label for="email">Email</label>
            <input type="text" placeholder="Introduce tu email" name="email" id="email" required>
            
            <label for="pw">Contraseña</label>
            <input type="password" placeholder="Introcude tu contraseña" name="pw" id="pw" required>
            <hr>
            <button type="submit" class="boton_login">Iniciar Sesión</button>

        </div>
    </form>    
</div>
    
</body>
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