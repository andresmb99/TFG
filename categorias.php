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
    <link rel="stylesheet" href="categorias.css">
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
    <?php require 'cabecera.php';?>
    <button id="darkMode" class="buttonDarkMode">
        <span id="icono">🌙</span>
        <span id="texto">Modo Oscuro</span>
    </button>
    <div class="contenedor_categorias">
        <h1 class="h1">Nuestros productos</h1>
        <?php
        $categorias = cargar_categorias();
        if($categorias == false){
            echo "<p class='error'>Error de conexión con la base de datos</p>";

        }else{
            echo "<ul class='lista-categorias'>";
            foreach($categorias as $row){
                $url = "productos.php?categoria=" .$row->categoria_id;
                echo "<li><a href='$url'>".$row->nombre."</a></li>";
                $row->nombre . "</li>";
            }
            echo "</ul>";
        }
        ?>
    </div>

    <div class="contenido-add"></div>
    <div class="texto-contenido-add">
            <h3>Nuevo Model 3</h3>
            <p>Recorra hasta 702 km (WLTP) con una sola carga gracias al diseño exterior mejorado y optimizado para conseguir la máxima aerodinámica.</p>
    </div>

    <div class="contenido-add-2"></div>
    <div class="texto-contenido-add-2">
        <h3>Robotaxi</h3>
        <p>Llame a su taxi y utilícelo todo el tiempo que necesite para hacer sus recados, desplazamientos y mucho más.</p>
    </div>

    <footer>
        
    <section id="footer">
        <aside class="footer-segmento">
            <h4 title="Tesla &copy;"><a>Tesla &copy; 2024</a></h4>
        </aside>

        <aside class="footer-segmento">
            <h4 title="Privacidad y legal"><a>Privacidad y legal</a></h4>
        </aside>

        <aside class="footer-segmento">
            <h4 title="Noticias"><a>Noticias</a></h4>
        </aside>

    </section>

    </footer>
    
</body>
</html>