<?php
require_once "sesiones.php";
require_once "bd.php";
comprobar_sesion();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pedido en Curso</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="carrito.css">
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
    require "cabecera.php";
    ?>

<button id="darkMode" class="buttonDarkMode">
        <span id="icono">🌙</span>
        <span id="texto">Modo Oscuro</span>
    </button>
    <h3 class='titulo'>Tu carrito<img src="/img/cart.gif" width="26" heigth="26"></h3>
  
    <?php
    $productos = cargar_productos(array_keys($_SESSION["carrito"]));

    if($productos === FALSE){
        echo "<p class='vacio'>Carrito vacío</p>";
        echo "<a href='categorias.php' class='boton-volver'><img src='/img/shopping.png' width='20' heigth='20'>Seguir Comprando</a>";
        exit;
    }
    $total=0;
    echo "<table>";
    echo "<tr class='tabla'><th>Nombre</th><th>Descripción</th><th>Cantidad</th><th>Eliminar</th></tr>";

     foreach($productos as $row) {
            $producto_id = $row->producto_id;
            $nombre = $row->nombre;
            $descripcion = $row->descripcion;
            $precio = $row->precio;
            $cantidad = $_SESSION['carrito'][$producto_id];
            $subtotal = $precio * $cantidad;
            $total += $subtotal;
            echo "<tr>
            <td class='titulos'>$nombre</td>
            <td class='titulos'>$descripcion</td>
            <td class='titulos'>$cantidad</td>
            <td>
            <form action= 'eliminar.php' method='POST'>
            <input name='cantidad' type='number' min='1' value='1'>
            <input type='submit' value= 'Eliminar'>
            <input name='producto_id' type='hidden' value='$producto_id'>
            </form>
            </td>
            </tr>";
     }
     echo "<tr class='tabla_total'>
     <td colspan='3' class='total'><strong>Total</strong></td>
     <td class='total'><strong>" . number_format($total, 2) . "€</strong></td>
     </tr>";
     echo "</table>";
           ?>
    <hr>
    <a href="procesar.php">Confirmar Pedido</a>

            <footer>
                <section id=footer>
                    <aside class="footer-segmento">
                        <h4 title="Tesla &copy;"><a>Tesla &copy; 2025</a></h4>
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