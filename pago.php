<?php
    // Importar las credenciales
    require __DIR__ . '\database.php';

    session_start();

    // Sesión iniciada
    if (isset($_SESSION['user'])) {
        $usuarioExistente = true;

        $user = $_SESSION['user'];

        $sql = "SELECT nombre, apellido, correo, telefono FROM cliente WHERE user = '$user'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $fila = $result->fetch_assoc();

            // Guarda los datos del usuario en variables
            $nombre = $fila['nombre'];
            $apellido = $fila['apellido'];
            $correo = $fila['correo'];
            $telefono = $fila['telefono'];
        }
    } else {
        $usuarioExistente = false;
    }

    // Recupera los datos del cliente y los ingresa a la tabla Compra
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($usuarioExistente) {
            $sql = "INSERT INTO compra ()";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pago</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    
    <div>
        <form class="contenido-pago" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="datos-personales">
                <h2> Información Personal </h2>
        
                <div class="inputs-modal-pago">
                    <input type="text" id="nombre" placeholder="Nombre">
                    <input type="text" id="apellido" placeholder="Apellidos">
                    <input type="email" id="correo" placeholder="Correo">
                    <input type="tel" id="telefono" placeholder="Teléfono">
                </div>      
            </div>
        
            <div class="realizar-pago">
                <h2> Total a Pagar </h2>
        
                <p class="texto">
                    <b>Cantidad de boletos:</b> <span id="cantidad-boletos-pago">  </span> boleto(s)
                </p>
        
                <p class="texto">
                    <b>Boleto(s):</b> <span id="numeros-boletos">  </span>
                </p>
        
                <p class="texto">
                    <b>Total:</b> $<span id="total3">  </span>
                </p>
        
                <div class="botones-pago">
                    <div id="paypal-button-container"></div>
        
                    <!-- <button class="confirmar-pago" name="confirmar-pago" id="confirmar-pago">Pago Realizado</button> -->
                </div>                    
        
                <div class="contenedor-botones-pago">    
                    <div class="boton-modal">
                        <button onclick="window.location.href = 'recibo.php';" id="imprimir-pago">Recibo</button>
                    </div>
                    
                    <div class="boton-modal">
                        <button onclick="window.location.href = 'index.php';" id="finalizar-pago">Regresar al Inicio</button>
                    </div>
                                
                </div>   
            </div>
        </form>
        
    </div>
    
    <footer>
        <div class="contenido-footer">
            <div class="elemento-footer imagenes-footer">
                <img class="imagen-footer" src="imagenes/4dx.png" alt="imagen 4dx">
                <img class="imagen-footer" src="imagenes/imax.png" alt="imagen imax">
            </div>
    
            <div class="elemento-footer iconos-redes-sociales">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                </svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                </svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M16.5 7.5l0 .01" />
                </svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-reddit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 8c2.648 0 5.028 .826 6.675 2.14a2.5 2.5 0 0 1 2.326 4.36c0 3.59 -4.03 6.5 -9 6.5c-4.875 0 -8.845 -2.8 -9 -6.294l-1 -.206a2.5 2.5 0 0 1 2.326 -4.36c1.646 -1.313 4.026 -2.14 6.674 -2.14z" />
                    <path d="M12 8l1 -5l6 1" />
                    <path d="M19 4m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                    <circle cx="9" cy="13" r=".5" fill="currentColor" />
                    <circle cx="15" cy="13" r=".5" fill="currentColor" />
                    <path d="M10 17c.667 .333 1.333 .5 2 .5s1.333 -.167 2 -.5" />
                </svg>
            </div>
    
            <div class="elemento-footer telefono">
                <p> Atención Telefónica </p>
                <p> (871)-6493-456 </p>
            </div>
        </div>

        <p class="copyright"> ©Copyright 2023. Todos los derechos reservados a MelvinPolis® | Aviso de privacidad | Términos y condiciones </p>
        
    </footer>
    
    <!-- Script Botones -->
    <script>
        const finalizarPago = document.getElementById ( "finalizar-pago" );
        const boton_recibo = document.getElementById ( "imprimir-pago" );
        const boton_paypal = document.getElementById ( "paypal-button-container" );

        const total3 = document.getElementById ( "total3" );
        const boletosTotales_pago = document.getElementById ( "cantidad-boletos-pago" );
        const numeros_boletos = document.getElementById ( "numeros-boletos" );

        finalizarPago.addEventListener ( "click", () => {
            boton_paypal.style.display = "flex";
            boton_recibo.style.display = "none";
            finalizarPago.style.display = "none";
        } );
    </script>

    <!-- Script PHP -->
    <script>
        // Identifica si el usuario inició sesión
        <?php
            if ($usuarioExistente) { ?>
                // Completar los campos del formulario con los datos del usuario
                document.getElementById('nombre').value = "<?php echo $nombre; ?>";
                document.getElementById('apellido').value = "<?php echo $apellido; ?>";
                document.getElementById('correo').value = "<?php echo $correo; ?>";
                document.getElementById('telefono').value = "<?php echo $telefono; ?>";
        <?php } ?>

        //document.addEventListener("DOMContentLoaded", function() {
        // Recupera los datos desde localStorage
        var cantBoletosTotal = localStorage.getItem('cantBoletosTotal');
        var asientos_select = localStorage.getItem('asientos_select');
        var precioTotal = localStorage.getItem('precioTotal');
        
        // Actualiza los elementos span con los datos recuperados
        document.getElementById('cantidad-boletos-pago').innerText = cantBoletosTotal;
        document.getElementById('numeros-boletos').innerText = asientos_select;
        document.getElementById('total3').innerText = precioTotal;
        //});

        // Variable global
        // const total = precioTotal;
    </script>

    <script src="https://www.paypal.com/sdk/js?client-id=AYqbtbFUBHWJE13vnIhXF0bXyCu27rauEsdg6SRUncEf960VJx0yniZ-IZCCSAIG1GCNhacyJxegmUgR&currency=USD"></script>
    <script src="app.js"></script>

</body>
</html>