<?php
    require __DIR__ . '\funciones.php';
    $pelicula = obtener_pelicula_con_variable();

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

    <section class="seccion-pelicula">

        <?php
            $peli = mysqli_fetch_assoc ( $pelicula );

            $titulo_esp    = $peli [ 'titulo_espanol' ];
            $titulo_ing    = $peli [ 'titulo_ingles'  ];
            $imagen        = $peli [ 'imagen'         ];
            $sinopsis      = $peli [ 'sinopsis'       ];
            $clasificacion = $peli [ 'clasificacion'  ];
            $genero        = $peli [ 'genero'         ];
            $director      = $peli [ 'director'       ];
            $reparto       = $peli [ 'reparto'        ];
            $trailer       = $peli [ 'trailer'        ];
            
            if ( $peli ) { ?>
                <div class="informacion-pelicula">
                    <div class="contenido-titulo">
                        <img class="imagen-pelicula" 
                             src=<?php echo $imagen; ?> 
                             alt="pelicula interestelar">
                        
                        <div class="titulo">
                            <h2 class="titulo-espanol"> <?php echo $titulo_esp; ?> </h2>
                            <h4 class="titulo-ingles"> <?php echo $titulo_ing; ?> </h4>
                        </div>
                    </div>

                    <p class="sinopsis">
                        <?php echo $sinopsis; ?>
                    </p>

                    <p class="clasificacion">
                        <span> <b>Clasificación:</b> </span>
                        <?php echo $clasificacion; ?>
                    </p>

                    <p class="genero">
                        <span> <b>Género:</b> </span>
                        <?php echo $genero; ?>
                    </p>

                    <p class="director">
                        <span> <b>Director:</b> </span>
                        <?php echo $director; ?>
                    </p>

                    <p class="reparto">
                        <span> <b>Reparto:</b> </span>
                        <?php echo $reparto; ?>
                    </p>
                </div>

                <div class="contenedor-ht">
                    <div class="contenedor-horarios">
                        <h2> Horarios </h2>
            
                        <div class="contenido-horarios">
                            <h3> DOB </h3>
            
                            <div class="horarios">
                                <button class="mostrarModal"> 3:00 PM </button>
                                <button class="mostrarModal"> 6:00 PM </button>
                                <button class="mostrarModal"> 9:00 PM </button>
                            </div>                
                        </div>
                        
                        <div class="contenido-horarios">
                            <h3> SUB </h3>
            
                            <div class="horarios">
                                <button class="mostrarModal"> 5:00 PM </button>
                                <button class="mostrarModal"> 7:00 PM </button>
                                <button class="mostrarModal"> 10:00 PM </button>
                            </div>                
                        </div>
                    </div>
                    
                    <div class="contenedor-trailer">
                        <h2> Trailer </h2>
                        <iframe 
                            width="600" 
                            height="350" 
                            src=<?php echo $trailer; ?>
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            <?php } ?>
    </section>

    <div id="modal-boletos" class="modal-boletos">
        <div class="contenido-modal-boletos">
            <span class="cerrar">&times;</span>
            <h2> Selecciona tus boletos </h2>

            <div class="seleccion-boletos">
                <div class="boletos">
                    <p> Adulto </p>
                    <p> $75.00 </p>

                    <div class="contador-boletos">
                        <button id="boleto-adulto-menos"> - </button>
                        <p id="cantidad-boletos-adulto">0</p>
                        <button id="boleto-adulto-mas"> + </button>
                    </div>
                </div>

                <div class="boletos">
                    <p> Niño </p>
                    <p> $60.00 </p>

                    <div class="contador-boletos">
                        <button id="boleto-niño-menos"> - </button>
                        <p id="cantidad-boletos-niño">0</p>
                        <button id="boleto-niño-mas"> + </button>
                    </div>
                </div>

                <div class="boletos">
                    <p> 3ra Edad </p>
                    <p> $60.00 </p>

                    <div class="contador-boletos">
                        <button id="boleto-tEdad-menos"> - </button>
                        <p id="cantidad-boletos-tEdad">0</p>
                        <button id="boleto-tEdad-mas"> + </button>
                    </div>
                </div>
            </div>

            <p class="texto">
                Total a pagar: $<span id="total">0</span>
            </p>

            <div class="boton-modal">
                <button id="continuar-boletos">Continuar</button>
            </div>
        </div>
    </div>

    <div id="modal-asientos" class="modal-asientos">
        <div class="contenido-modal-asientos">
            <span class="cerrar">&times;</span>
            <h2> Selecciona tus asientos </h2>

            <p class="texto">
                Cantidad de boletos: <span id="cantidad-boletos">0</span>
            </p>

            <ul class="tipos-asientos">
                <li>
                    <div class="asiento"></div>
                    <p> Disponible </p>
                </li>

                <li>
                    <div class="asiento seleccionado"></div>
                    <p> Seleccionado </p>
                </li>

                <li>
                    <div class="asiento ocupado"></div>
                    <p> Ocupado </p>
                </li>                
            </ul>

            <div class="contenedor-asientos">
                <div class="pantalla">
                    Pantalla
                </div>
                    
                <div class="fila">
                    <div class="asiento">1A</div>
                    <div class="asiento">2A</div>
                    <div class="asiento">3A</div>
                    <div class="asiento">4A</div>
                    <div class="asiento">5A</div>
                    <div class="asiento">6A</div>
                    <div class="asiento">7A</div>
                    <div class="asiento">8A</div>
                </div>

                <div class="fila">
                    <div class="asiento">1B</div>
                    <div class="asiento">2B</div>
                    <div class="asiento">3B</div>
                    <div class="asiento">4B</div>
                    <div class="asiento">5B</div>
                    <div class="asiento">6B</div>
                    <div class="asiento">7B</div>
                    <div class="asiento">8B</div>
                </div>

                <div class="fila">
                    <div class="asiento">1C</div>
                    <div class="asiento">2C</div>
                    <div class="asiento">3C</div>
                    <div class="asiento">4C</div>
                    <div class="asiento">5C</div>
                    <div class="asiento">6C</div>
                    <div class="asiento">7C</div>
                    <div class="asiento">8C</div>
                </div>

                <div class="fila">
                    <div class="asiento">1D</div>
                    <div class="asiento">2D</div>
                    <div class="asiento">3D</div>
                    <div class="asiento">4D</div>
                    <div class="asiento">5D</div>
                    <div class="asiento">6D</div>
                    <div class="asiento">7D</div>
                    <div class="asiento">8D</div>
                </div>

                <div class="fila">
                    <div class="asiento">1E</div>
                    <div class="asiento">2E</div>
                    <div class="asiento">3E</div>
                    <div class="asiento">4E</div>
                    <div class="asiento">5E</div>
                    <div class="asiento">6E</div>
                    <div class="asiento">7E</div>
                    <div class="asiento">8E</div>
                </div>

                <div class="fila">
                    <div class="asiento">1F</div>
                    <div class="asiento">2F</div>
                    <div class="asiento">3F</div>
                    <div class="asiento">4F</div>
                    <div class="asiento">5F</div>
                    <div class="asiento">6F</div>
                    <div class="asiento">7F</div>
                    <div class="asiento">8F</div>
                </div>                
            </div>
            
            <div class="contenedor-continuar-asientos">                
                <div class="boton-modal">
                    <button id="regresar-asientos">Regresar</button>
                </div>

                <p class="texto">
                    Total a pagar: $<span id="total2">0</span>
                </p>

                <div class="boton-modal">
                    <button id="continuar-asientos">Continuar</button>
                </div>
            </div>            
        </div>
    </div>

    <div id="modal-pago" class="modal-pago">
        <div class="contenido-modal-pago">
            <span class="cerrar">&times;</span>

            <div class="contenido-pago">
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
                        <b>Cantidad de boletos:</b> <span id="cantidad-boletos-pago">0</span> boleto(s)
                    </p>

                    <p class="texto">
                        <b>Boleto(s):</b> <span id="numeros-boletos">0</span>
                    </p>

                    <p class="texto">
                        <b>Total:</b> $<span id="total3">0</span>
                    </p>

                    <div class="botones-pago">
                        <form id="boton-paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                            <input type="hidden" name="cmd" value="_s-xclick" />
                            <input type="hidden" name="hosted_button_id" value="8XHX7Y36UEVWJ" />
                            <input type="hidden" name="currency_code" value="MXN" />
                            <input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynow_SM.gif" border="0" name="submit" title="PayPal es una forma segura y fácil de pagar en línea." alt="Comprar ahora" />
                        </form>

                        <button class="confirmar-pago" id="confirmar-pago">Pago Realizado</button>
                    </div>                    

                    <div class="contenedor-botones-pago">
                        <div class="boton-modal">
                            <button id="regresar-pago">Regresar</button>
                        </div>

                        <form id="boton-recibo" action="recibo.html" target="_blank">
                            <div class="boton-modal">
                                <button id="imprimir-pago">Recibo</button>
                            </div>
                        </form>                       

                        <div class="boton-modal">
                            <button id="finalizar-pago">Finalizar</button>
                        </div>
                    </div>   
                </div>
            </div>         
        </div>
    </div>     
       
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

    <script src="script.js"></script>

    <script>
        // Identifica si el usuario inició sesión
        var usuarioExistente = <?php echo $usuarioExistente ? 'true' : 'false'; ?>;

        if (usuarioExistente) {
            // Obtener los datos del usuario de las variables PHP
            var nombre = "<?php echo $nombre; ?>";
            var apellido = "<?php echo $apellido; ?>";
            var correo = "<?php echo $correo; ?>";
            var telefono = "<?php echo $telefono; ?>";

            // Completar los campos del formulario con los datos del usuario
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido').value = apellido;
            document.getElementById('correo').value = correo;
            document.getElementById('telefono').value = telefono;
        }
    </script>
</body>
</html>