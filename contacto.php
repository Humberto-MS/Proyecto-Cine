<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MelvinPolis </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="styles.css" rel="stylesheet">
    
</head>
<body>
    <header>
        <a href="index.php">
            <div class="logo">
                <h1> MelvinPolis </h1>
                <img src="imagenes/melvin.jpg" alt="melvin image">
            </div>
        </a>
        
        <nav>
            <ul class="navegación-principal">
                <li class="dropdown">
                    <a href="#"> Más &#x25BE; </a>
                    
                    <div class="dropdown-content">
                        <a style="cursor: pointer" onclick="toggleModoClaro()">Cambiar Modo</a>
                        <a href="contacto.php"> Contacto </a>
                        <a href="sobre-nosotros.php"> Sobre Nosotros </a>
                    </div>
                </li>

                <li> <a href="index.php"> Inicio </a> </li>
                <?php
                    if (isset($_SESSION['user'])) {
                        // Si el usuario tiene una sesión iniciada, mostrar "Log Out"
                        echo '<li> <a href="logout.php"> Log Out </a> </li>';
                    } else {
                        // Si el usuario no tiene una sesión iniciada, mostrar "Log In"
                        echo '<li> <a href="login.php"> Log In </a> </li>';
                    }
                ?>
            </ul>
        </nav>
    </header>

    <section class="contenedor-contacto">
        <h2> Contáctanos </h2>

        <div id="contacto-p">
            <p> Ponte en contacto con nosotros, queremos saber tu opinión </p>
        </div>

        <form action="" method="post" id="form-contacto" onsubmit="return(validarContacto());">
            <div class="contenedor-campos">
                <div class="campo">
                    <h3> Nombre: </h3>
                    <input type="text" placeholder="Tu Nombre" id="nombre-c" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ, ]+" title="a-z">
                </div>

                <div class="campo">
                    <h3> Email: </h3>
                    <input type="email" placeholder="Tu Email" id="correo-c" title="correo@correo.com">
                </div>

                <div class="campo">
                    <h3> Teléfono: </h3>
                    <input type="tel" placeholder="Tu Teléfono" id="telefono-c" pattern="\+\d{1,3}\d{10}|^\d{10}" title="+123, 123">
                </div>

                <div class="campo">
                    <h3> Asunto: </h3>
                    <input type="text" placeholder="Asunto del correo" id="asunto">
                </div>

                <div class="campo">
                    <h3> Mensaje: </h3>
                    <textarea id="mensaje"></textarea>
                </div>
            </div>

            <div class="alinear-boton">
                <button type="submit"> Enviar </button>
            </div>
        </form>
        
    </section>
   
    <hr>

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

    <script>
        // Obtener el estado actual del modo claro desde localStorage
        const isModoClaro = localStorage.getItem('modo-claro') === 'true';
        const body = document.body;
        const copyright = document.querySelector ( '.copyright' );

        // Aplicar el modo claro si está activado
        if ( isModoClaro ) {
            toggleModoClaro();
        }

        // Actualizar el estado en localStorage cuando se hace clic en el botón
        function toggleModoClaro() {
            body.classList.toggle ( 'modo-claro' );

            if ( body.classList.contains ( 'modo-claro' ) ) {
                copyright.style.color = 'black';
            } else {
                copyright.style.color = 'white';
            }
            
            // Guardar el estado actual del modo claro en localStorage
            localStorage.setItem ( 'modo-claro', body.classList.contains ('modo-claro') );
        }
    </script>

    <script src="validacion.js"></script>
</body>
</html>