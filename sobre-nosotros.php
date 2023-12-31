<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MelvinPolis</title>
        
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    
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

    <section class="contenedor-principal-nosotros">
        <div class="contenedor-secundario-nosotros">
            <h2>Sobre Nosotros</h2>
            <p>
                MelvinPolis, una visión futurista del entretenimiento, se alza como un faro de diversión y 
                emoción en el mundo del cine ficticio. Inspirados en la excelencia y la innovación, nos enorgullecemos 
                de llevar más de dos décadas entregando experiencias cinematográficas inolvidables a nuestros queridos 
                espectadores. <br><br>
                MelvinPolis ha expandido su galaxia de entretenimiento a lo largo y ancho de múltiples mundos ficticios. 
                Desde las colinas de Melvinburg hasta las vastas llanuras de Polisville, hoy en día contamos con una red de 
                335 complejos y 2,898 pantallas en 98 ciudades de nuestras queridas tierras ficticias. <br><br>
                En nuestro empeño por llevar "La Magia del Cine" a niveles cósmicos, ofrecemos una gama diversa de salas para 
                satisfacer los gustos más exigentes. Desde la atmósfera efervescente de nuestras salas Pop hasta la elegancia 
                tradicional de nuestras salas Tradicionales. Además, para los amantes del lujo, nuestras salas Premium, Palco y 
                Platino garantizan una experiencia celestial. Todas estas salas están equipadas con tecnología de última generación 
                en audio y video, y proyección digital que te sumerge en una experiencia cinematográfica como ninguna otra. <br><br>
                En MelvinPolis, el futuro del cine es nuestro presente. Únete a nosotros en un viaje hacia lo desconocido, donde 
                cada película es una aventura y cada visita es un recuerdo que perdura en el tiempo. ¡Bienvenidos a MelvinPolis, 
                donde la diversión no tiene límites!
            </p>
        </div>

        <div class="contenedor-secundario-nosotros">
            <h2>Misión, filosofía y valores</h2>
            <h3>Misión</h3>
            <p>
                En MelvinPolis, nuestra misión es clara y apasionante: brindar a nuestros invitados la experiencia de entretenimiento 
                definitiva. Esta misión está arraigada en el esfuerzo, el talento y el compromiso de todos los que conformamos MelvinPolis. 
                Buscamos generar valor, impulsar la innovación y, sobre todo, proporcionar una abundancia de diversión en cada momento que 
                nuestros invitados pasen con nosotros.
            </p>
            <h3>Visión</h3>
            <p>
                Nos esforzamos por ser la elección preferida de entretenimiento en todos los rincones donde MelvinPolis extiende su influencia. 
                Aspiramos a ser reconocidos por la excelencia en ubicación, diseño y comodidad de nuestras instalaciones, por la calidad y diversidad 
                de los productos y servicios que ofrecemos, por nuestra constante innovación tecnológica y, lo más importante, por la satisfacción 
                total de nuestros invitados. En MelvinPolis, nuestra visión es ser el faro que guía a los amantes del cine hacia una experiencia 
                extraordinaria.
            </p>
            <h3>Nuestros Motores</h3>
            <p>
                <ul>
                    <li>
                        <b>Las Personas:</b> En MelvinPolis, consideramos que las personas son el corazón de nuestra empresa. Valoramos y fomentamos su 
                        desarrollo y capacitación, apoyándonos mutuamente para alcanzar los resultados que cada uno de nosotros debe lograr. Buscamos 
                        que cada miembro de nuestro equipo sienta satisfacción por su trabajo y orgullo de ser parte de la familia MelvinPolis. <br><br>
                    </li>
                    <li>
                        <b>Vocación de Servicio:</b> Nuestra razón de ser son nuestros invitados. En cada acción y decisión que tomamos, nos enfocamos en 
                        atisfacer las necesidades de nuestros clientes internos y externos. Fomentamos una actitud de servicio, esfuerzo y responsabilidad 
                        en todo momento. Trabajamos con entusiasmo para consolidar nuestra imagen de liderazgo, profesionalismo y confiabilidad. <br><br>
                    </li>
                    <li>
                        <b>Trabajo en Equipo:</b> En MelvinPolis, entendemos que somos más fuertes cuando trabajamos juntos. Colaboramos de manera coordinada y 
                        entusiasta, aportando lo mejor de nuestra experiencia, conocimiento y habilidades. Trabajamos como un equipo unido para alcanzar 
                        nuestros objetivos y apoyar el crecimiento de nuestros compañeros. Nuestros éxitos son el reflejo de la sinergia de todo el equipo.
                    </li>
                </ul>
            </p>
            <h3>Nuestros Valores</h3>
            <p>
                <ul>
                    <li>
                        <b>Integridad:</b> En MelvinPolis, actuamos con rectitud y seguimos las normas y reglas establecidas por la empresa y el país. Nos 
                        esforzamos por ser honestos y transparentes en todo lo que hacemos, haciendo un uso cuidadoso y transparente de la información y 
                        los recursos que se nos confían. <br><br>
                    </li>
                    <li>
                        <b>Compromiso:</b> En MelvinPolis, somos ejemplos en todo lo que hacemos. Nos enfocamos en alcanzar altos estándares de desempeño y 
                        demostramos una actitud de esfuerzo y responsabilidad en cada tarea. Cada uno de nosotros se esfuerza al máximo por convicción 
                        para cumplir metas y compromisos. <br><br>
                    </li>
                    <li>
                        <b>Respeto:</b> En MelvinPolis, tratamos a todas las personas con dignidad, cordialidad y tolerancia. Reconocemos y respetamos los derechos, 
                        libertades y cualidades inherentes a la condición humana y su dignidad. Comunicamos con claridad y fundamentos, siempre en un tono de 
                        respeto hacia los demás. Evitamos cualquier comentario ofensivo o despectivo, independientemente de las características individuales 
                        o el nivel jerárquico de las personas. 
                    </li>
                </ul>
            </p>
        </div>

        <div class="contenedor-secundario-nosotros">
            <h2>Juramento de Servicio</h2>
            <p>
                <ol>
                    <li>
                        Te prometemos una experiencia de entretenimiento inolvidable en nuestras instalaciones, donde la excelencia, la comodidad y la seguridad 
                        son nuestra prioridad. <br><br>
                    </li>
                    <li>
                        Siempre serás recibido con una cálida sonrisa cuando nos visites, porque tu alegría es la nuestra. <br><br>
                    </li>
                    <li>
                        Nos esforzamos por superar tus expectativas en cada visita, brindándote un servicio que te sorprenderá gratamente. <br><br>
                    </li>
                    <li>
                        Nuestro personal te tratará con amabilidad y respeto en todo momento, reconociendo tu importancia como nuestro valioso invitado. <br><br>
                    </li>
                    <li>
                        Nuestras películas son cuidadosamente seleccionadas y proyectadas exactamente como sus creadores las concibieron, sin interrupciones 
                        improvisadas. Además, utilizamos la tecnología de proyección más avanzada y un sistema de sonido sin igual para sumergirte en la magia 
                        del cine. <br><br>
                    </li>
                    <li>
                        Nuestras dulcerías te ofrecerán productos de la más alta calidad y siempre frescos. Además, nuestro servicio será rápido, eficiente y 
                        amable para que disfrutes al máximo tu elección de snacks. <br><br>
                    </li>
                    <li>
                        Mantenemos nuestras instalaciones en un estado impecable para garantizar tu comodidad y satisfacción en cada visita. <br><br>
                    </li>
                    <li>
                        Si en algún momento no cumplimos con alguna de estas promesas, por favor, háznoslo saber de inmediato. Estamos comprometidos con la 
                        mejora continua y valoramos tus comentarios para seguir ofreciendo la mejor experiencia posible. <br><br>
                    </li>
                </ol>
            </p>
        </div>

        <div class="contenedor-secundario-nosotros">
            <h2>¿Dónde nos ubicamos?</h2>
            <div id="mapa"></div>
        </div>
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
        const textos = document.querySelectorAll ( 
            '.contenedor-principal-nosotros p, li, .copyright' );

        // Aplicar el modo claro si está activado
        if ( isModoClaro ) {
            toggleModoClaro();
        }

        // Actualizar el estado en localStorage cuando se hace clic en el botón
        function toggleModoClaro() {
            body.classList.toggle('modo-claro');

            if ( body.classList.contains ( 'modo-claro' ) ) {
                textos.forEach ( texto => texto.style.color = 'black' );
            } else {
                textos.forEach ( texto => texto.style.color = 'white' );
            }
            
            // Guardar el estado actual del modo claro en localStorage
            localStorage.setItem('modo-claro', body.classList.contains('modo-claro'));
        }
    </script>

    <script>
        function inicializarMapa() {
            var ubicacionCine = { lat: 25.533058, lng: -103.435609 };
            
            var mapa = new google.maps.Map ( document.getElementById ( 'mapa' ), {
                zoom: 15,
                center: ubicacionCine
            } );
            
            var marcador = new google.maps.Marker ( {
                position: ubicacionCine,
                map: mapa,
                title: 'MelvinPolis'
            } );
        }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz_aNb0jhyZ8TOOrHbqg-zJr_VUj0VoJ4&callback=inicializarMapa"></script>
    
</body>
</html>