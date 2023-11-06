<?php
    include ('funciones.php');
    $compra = obtener_datos_recibo();

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Pago</title>
</head>
<body>
    <h1>Recibo de Pago</h1>

    <div>
        <?php
            $com = mysqli_fetch_assoc ( $compra );

            $id = $com [ 'id_compra' ];
            $titulo = $com [ 'titulo_espanol' ];
            $nombre = $com [ 'nombre' ];
            $apellidos = $com [ 'apellidos' ];
            $correo = $com [ 'correo' ];
            $tel = $com [ 'telefono' ];
            $boletos = $com [ 'cant_boletos' ];
            $asientos = $com [ 'asientos' ];
            $total = $com [ 'total' ];

            if ( $com ) { ?>
                <p>
                    <strong>Número de Compra:</strong> 
                    <span id="numeroCompra"> <?php echo $id; ?> </span>
                </p>
                
                <p>
                    <strong>Título de la Película:</strong> 
                    <span id="tituloPelicula"> <?php echo $titulo; ?> </span>
                </p>

                ---------------------------------------------
                
                <p>
                    <strong>Nombre:</strong> 
                    <span id="nombre"> <?php echo $nombre; ?> </span>
                </p>
                
                <p>
                    <strong>Apellidos:</strong> 
                    <span id="apellidos"> <?php echo $apellidos; ?> </span>
                </p>
                
                <p>
                    <strong>Correo:</strong> 
                    <span id="correo"> <?php echo $correo; ?> </span>
                </p>
                
                <p>
                    <strong>Teléfono:</strong> 
                    <span id="telefono"> <?php echo $tel; ?> </span>
                </p>
                
                ---------------------------------------------

                <p>
                    <strong>Cantidad de Boletos:</strong> 
                    <span id="cantidadBoletos"> <?php echo $boletos; ?> </span>
                </p>
                
                <p>
                    <strong>Asientos:</strong> 
                    <span id="asientos"> <?php echo $asientos; ?> </span>
                </p>
                
                <p>
                    <strong>Total a Pagar:</strong> 
                    $<span id="totalPagar"> <?php echo $total; ?> </span>
                </p>
            <?php } ?>
    </div>

    <button onclick="window.print()">Imprimir Recibo</button>
    <button id="finalizar-pago">Regresar al Inicio</button>

    <script>
        const finalizarPago = document.getElementById ( "finalizar-pago" );

        finalizarPago.addEventListener ( "click", () => {
            window.location.replace ( 'logout.php', '_self' );
        } )

        asientos = localStorage.getItem('asientos_select');
        titulo = localStorage.getItem('titulo');
    </script>
</body>
</html>