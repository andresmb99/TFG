<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'sesiones.php';
require_once 'bd.php';
comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="productos.css">
    <script>
        document.addEventListener("DOMContentLoaded", () =>{
            const button= document.getElementById("darkMode");
            const icono= document.getElementById("icono");
            const texto= document.getElementById("texto");
            const body = document.body;

            //cargar el modo oscuro desde localStorage
            if(localStorage.getItem("darkMode") ==="enabled"){
                body.classList.add("dark-mode");
                icono.textContent= "*";
                texto.textContent= "Modo Claro";
            }

            button.addEventListener("click", ()=>{
                body.classList.toggle("dark-mode");

                if(body.classList.contains("dark-mode")){
                    localStorage.setItem("darkMode", "enabled");
                    icono.textContent="🌞";
                    texto.textContent= "Modo Claro";
                }else{
                    localStorage.setItem("darkMode", "disabled");
                    icono.textContent= "🌙";
                    texto.textContent= "Modo Oscuro";
                }
            });
        });
    </script>
</head>
<body>
    <?php
    require 'cabecera.php';
    ?>

<button id="darkMode" class="buttonDarkMode">
        <span id="icono">🌙</span>
        <span id="texto">Modo Oscuro</span>
    </button>
    
    <?php
    $cat = cargar_categoria($_GET['categoria']);
    $productos = cargar_productos_categorias($_GET['categoria']);

    if ($cat === FALSE or $productos === FALSE) {
        echo "<p class='error'>Error al conectar</p>";
    } else {
        foreach ($cat as $row) {
            echo "<h2 class='h2'>Categoría: " . ($row->nombre) . "</h2>";
            echo "<h3 class='h3'>" . ($row->descripcion) . "</h3>";
        } 
            echo "<div class='productos-container'>";
            foreach ($productos as $row) {
                $producto_id = $row->producto_id; 
                $nombre = $row->nombre;
                $descripcion = $row->descripcion;
                $stock = $row->stock;
                $imagen_url = $row->imagen_url;
                $precio = $row->precio; 
    
                echo "<div class='producto'>
                        <div class='producto-imagen'>
                            <img src='$imagen_url' alt='$nombre'>
                        </div>
                        <div class='producto-info'>
                            <h3>$nombre</h3>
                            <p>$descripcion</p>
                            <p><strong>Stock:</strong> $stock</p>
                            <p><strong>Precio:</strong> $precio</p>
                            <form action='anadir.php' method='POST'>
                                <input name='cantidad' type='number' min='1' value='1'>
                                <input type='submit' value='Añadir al pedido'>
                                <input name='producto_id' type='hidden' value='$producto_id'>
                            </form>
                        </div>
                    </div>";
            }
            echo "</div>";
        }
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