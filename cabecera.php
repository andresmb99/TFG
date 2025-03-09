<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cabecera.css">
    <script>
        window.onload= function(){
            setTimeout(function(){
                document.querySelector('.bienvenido').classList.add('ocultar');

            },5000);
        };
    </script>

</head>
<body>
<header class="header">
    <div class="bienvenido">
        Bienvenido/a:<?php echo $_SESSION['email'];?>
    </div>
    <nav>
        <ul class="lista">
            <li><a class="lista-item" href="categorias.php">Inicio</a></li>
            <li><a class="lista-item" href="carrito.php">Carrito</a></li>
            <li><a class="lista-item" href="logout.php">Cerrar sesión</a></li>

        </ul>
    </nav>

</header>

    
</body>
</html>