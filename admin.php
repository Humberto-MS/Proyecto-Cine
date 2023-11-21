<?php
    session_start();

    // Importar las credenciales
    require ('database.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //? Declaración
        $titulo_espanol = $_POST["titulo_espanol"] ?? null;
        $titulo_ingles = $_POST["titulo_ingles"] ?? null;
        $imagen = $_POST["imagen"] ?? null;
        $sinopsis = $_POST["sinopsis"] ?? null;
        $clasificacion = $_POST["clasificacion"] ?? null;
        $genero = $_POST["genero"] ?? null;
        $director = $_POST["director"] ?? null;
        $reparto = $_POST["reparto"] ?? null;
        $trailer = $_POST["trailer"] ?? null;
        $asientos_disponibles = $_POST["asientos_disponibles"] ?? null;

        $user = $_POST["user"] ?? null;
        $pass = $_POST["pass"] ?? null;
        $nombre = $_POST["nombre"] ?? null;
        $apellido = $_POST["apellido"] ?? null;
        $correo = $_POST["correo"] ?? null;
        $telefono = $_POST["telefono"] ?? null;

        //* Alta Pelicula
        if (isset($_POST["alta-pelicula"])) {
            $sql = "INSERT INTO pelicula (titulo_espanol,titulo_ingles,imagen,sinopsis,clasificacion,genero,director,reparto,
                                         trailer,asientos_disponibles) 
                    VALUES ('$titulo_espanol','$titulo_ingles','$imagen','$sinopsis','$clasificacion','$genero','$director',
                            '$reparto','$trailer','$asientos_disponibles')";

            if (mysqli_query($conn, $sql)) {
                //echo "Pelicula Insertada Exitosamente";
            } else {
                echo "Error Al Insertar Pelicula: " . mysqli_error($conn);
            }

        //* Baja Pelicula
        } else if (isset($_POST["baja-pelicula"])) {
            $sql = "DELETE FROM pelicula WHERE titulo_espanol = '$titulo_espanol'";

            if (mysqli_query($conn, $sql)) {
                //echo "Pelicula Eliminada Exitosamente";
            } else {
                echo "Error Al Eliminar Pelicula: " . mysqli_error($conn);
            }

        //* Modificar Pelicula
        } else if (isset($_POST["modificar-pelicula"])) {
            $titulo_original = $_POST["titulo_original"] ?? null;
            
            $sql = "UPDATE pelicula SET titulo_espanol = '$titulo_espanol',
                                        titulo_ingles = '$titulo_ingles',
                                        imagen = '$imagen',
                                        sinopsis = '$sinopsis',
                                        clasificacion = '$clasificacion',
                                        genero = '$genero',
                                        director = '$director',
                                        reparto = '$reparto',
                                        trailer = '$trailer',
                                        asientos_disponibles = '$asientos_disponibles'
                                        WHERE titulo_espanol = '$titulo_original'";
            
            if (mysqli_query($conn, $sql)) {
                //echo "Pelicula Modificada Exitosamente";
            } else {
                echo "Error Al Modificar Pelicula: " . mysqli_error($conn);
            }

        //* Alta Cliente
        } else if (isset($_POST["alta-cliente"])) {
            $sql = "INSERT INTO cliente (user,pass,nombre,apellido,correo,telefono,rol)
                                        VALUES ('$user','$pass','$nombre','$apellido',
                                                '$correo','$telefono','usuario')";
            if (mysqli_query($conn, $sql)) {
                //echo "Cliente Insertado Exitosamente";
            } else {
                echo "Error Al Insertar Cliente: " . mysqli_error($conn);
            }

        //* Baja Cliente
        } else if (isset($_POST["baja-cliente"])) {
            $sql = "DELETE FROM cliente WHERE user = '$user'";

            if (mysqli_query($conn, $sql)) {
                //echo "Cliente Eliminado Exitosamente";
            } else {
                echo "Error Al Eliminar Cliente: " . mysqli_error($conn);
            }

        //* Modificar Cliente
        } else if (isset($_POST["modificar-cliente"])) {
            $user_original = $_POST["user_original"] ?? null;

            $sql = "UPDATE cliente SET user = '$user',
                                        pass = '$pass',
                                        nombre = '$nombre',
                                        apellido = '$apellido',
                                        correo = '$correo',
                                        telefono = '$telefono'
                                        WHERE user = '$user_original'";

            if (mysqli_query($conn, $sql)) {
                //echo "Cliente Modificado Exitosamente";
            } else {
                echo "Error Al Modificar Cliente: " . mysqli_error($conn);
            }

        //* Cerrar Sesión
        } else if (isset($_POST["cerrar-sesion"])) {
            // Cierra sesión
            session_destroy();
            // Redirigir a la página de inicio
            header('location: index.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Administrador-MelvinPolis</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;700&display=swap" rel="stylesheet">

    <link href="styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>
<body id="body-admin">
    <h1> Administrador-MelvinPolis </h1>
    <div class="contenedor-admin-peliculas">
        <h2> Base de Datos - Películas </h2>
        <form class="contenedor-database" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-pelicula" onsubmit="return(validarPelicula());">
            <div class="input">
                <h3> Título en Español </h3>
                <input type="text" name="titulo_espanol" id="titulo_espanol" placeholder="Titulo en Español">
                <input type="hidden" name="titulo_original" id="titulo_original">
            </div>
            
            <div class="input">
                <h3> Título en Inglés </h3>
                <input type="text" name="titulo_ingles" id="titulo_ingles" placeholder="Título en Inglés">
            </div>
    
            <div class="input">
                <h3> Imagen </h3>
                <input type="text" name="imagen" id="imagen" placeholder="Ruta de la Imagen" pattern="(?!^\d+$)[A-Za-z0-9:/_\\.-]+" title="http, /url, \url">
            </div>
    
            <div class="input">
                <h3> Sinopsis </h3>
                <textarea name="sinopsis" id="sinopsis" placeholder="Sinopsis" title="a-z 0-9" ></textarea>
            </div>
    
            <div class="input">
                <h3> Clasificación </h3>
                <input type="text" name="clasificacion" id="clasificacion" placeholder="Clasificación" pattern="[A-Za-z]+(?:-[A-Za-z0-9]{1,2})?" title="b, b-15">
            </div>
    
            <div class="input">
                <h3> Género </h3>
                <input type="text" name="genero" id="genero" placeholder="Género" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ, ]+" title="a-z">
            </div>
    
            <div class="input">
                <h3> Director </h3>
                <input type="text" name="director" id="director" placeholder="Director" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ, ]+" title="a-z">
            </div>
    
            <div class="input">
                <h3> Reparto </h3>
                <textarea name="reparto" id="reparto" placeholder="Reparto" title="a-z"></textarea>
            </div>
    
            <div class="input">
                <h3> Trailer </h3>
                <input type="text" name="trailer" id="trailer" placeholder="Ruta del Trailer" pattern="(?!^\d+$)[A-Za-z0-9:/_\\.-]+" title="http, /url, \url">
            </div>
    
            <div class="input">
                <h3> Asientos Disponibles </h3>
                <input type="text" name="asientos_disponibles" id="asientos_disponibles" placeholder="Asientos Disponibles" pattern="([1-9]|[1-9][0-9]|100)" title="1-100">
            </div>
    
            <div class="admin-botones"> 
                <input type="submit" name="alta-pelicula" value="Alta">
                <input type="submit" name="baja-pelicula" value="Baja">
                <input type="submit" name="modificar-pelicula" value="Modificar">
                <input type="button" name="limpiar-pelicula" id="limpiar-pelicula" value="Limpiar Campos">  
            </div>

            <div class="admin-combobox">
                ID Película
                <select name="id-pelicula" id="id-pelicula" >
                    <option value="default_titulo"> Selecciona un Título </option>
                    <?php
                        if ($conn) {
                            $sql_titulo = "SELECT titulo_espanol FROM pelicula";                                
                            $titulos = mysqli_query($conn, $sql_titulo);
                        
                            if ($titulos) {
                                while ($opciones_titulo = mysqli_fetch_assoc($titulos)) {
                                    echo '<option value="' . $opciones_titulo['titulo_espanol'] . '">' . $opciones_titulo['titulo_espanol'] . '</option>';
                                }
                            }
                        }
                    ?>
                </select>
            </div> 
        </form>
    </div>

    <div class="contenedor-admin-clientes">
        <h2> Base de Datos - Clientes </h2>
        <form class="contenedor-database" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form-cliente" onsubmit="return(validarCliente());">
            <div class="input">
                <h3> Usuario </h3>
                <input type="text" name="user" id="user" placeholder="Usuario" pattern="[^@\/\\,. ]+" title="no se acepta @ / \ , .">
                <input type="hidden" name="user_original" id="user_original">
            </div>
    
            <div class="input">
                <h3> Contraseña </h3>
                <input type="text" name="pass" id="pass" placeholder="Contraseña">
            </div>
    
            <div class="input">
                <h3> Nombre/s </h3>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre/s" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ, ]+" title="a-z">
            </div>
    
            <div class="input">
                <h3> Apellidos </h3>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" pattern="[A-Za-záéíóúÁÉÍÓÚñÑ, ]+" title="a-z">
            </div>
    
            <div class="input">
                <h3> Correo Electrónico </h3>
                <input type="email" name="correo" id="correo" placeholder="Correo Electrónico" title="correo@correo.com">
            </div>
    
            <div class="input">
                <h3> Teléfono </h3>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono" pattern="\+\d{1,3}\d{10}|^\d{10}" title="+123, 123">
            </div>

            <div class="admin-botones"> 
                <input type="submit" name="alta-cliente" value="Alta" >
                <input type="submit" name="baja-cliente" value="Baja">
                <input type="submit" name="modificar-cliente" value="Modificar">
                <input type="button" name="limpiar-cliente" id="limpiar-cliente" value="Limpiar Campos">   
            </div>

            <div class="admin-combobox">
                ID Cliente
                <select name="id-cliente" id="id-cliente" >
                    <option value="default_usuario"> Selecciona un Usuario </option>
                    <?php
                        if ($conn) {
                           $sql_usuario = "SELECT user FROM cliente";
                            $usuarios = mysqli_query($conn, $sql_usuario);
                        
                            if ($usuarios) {
                                while ($opciones_usuario = mysqli_fetch_assoc($usuarios)) {
                                    echo '<option value="' . $opciones_usuario['user'] . '">' . $opciones_usuario['user'] . '</option>';
                                }
                            }
                        }
                    ?>
                </select>
            </div>
        </form>
    </div>
    
    <div class="cerrar-sesion">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" name="cerrar-sesion" value="Cerrar Sesión">
        </form>
    </div>
    
    <script>
        // Evento de cambio para el combobox de películas
        const idPelicula = document.getElementById('id-pelicula');
        idPelicula.addEventListener('change', function() {
            const tituloSeleccionado = this.value;

            if (tituloSeleccionado !== 'default_titulo') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'obtener_datos_pelicula.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);

                        document.getElementById('titulo_espanol').value = data.titulo_espanol;
                        // Guarda el título original de la película
                        document.getElementById('titulo_original').value = data.titulo_espanol;
                        document.getElementById('titulo_ingles').value = data.titulo_ingles;
                        document.getElementById('imagen').value = data.imagen;
                        document.getElementById('sinopsis').value = data.sinopsis;
                        document.getElementById('clasificacion').value = data.clasificacion;
                        document.getElementById('genero').value = data.genero;
                        document.getElementById('director').value = data.director;
                        document.getElementById('reparto').value = data.reparto;
                        document.getElementById('trailer').value = data.trailer;
                        document.getElementById('asientos_disponibles').value = data.asientos_disponibles;
                    }
                };
                xhr.send(`titulo_espanol=${tituloSeleccionado}`);
            }
        });

        // Evento de cambio para el combobox de usuarios
        const idCliente = document.getElementById('id-cliente');
        idCliente.addEventListener('change', function() {
            const usuarioSeleccionado = this.value;

            if (usuarioSeleccionado !== 'default_usuario') {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'obtener_datos_cliente.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);

                        document.getElementById('user').value = data.user;
                        // Guarda el usuario original del cliente
                        document.getElementById('user_original').value = data.user;
                        document.getElementById('pass').value = data.pass;
                        document.getElementById('nombre').value = data.nombre;
                        document.getElementById('apellido').value = data.apellido;
                        document.getElementById('correo').value = data.correo;
                        document.getElementById('telefono').value = data.telefono;
                    }
                };
                xhr.send(`user=${usuarioSeleccionado}`);
            }
        });

        $(document).ready(function() {
            // Evento para el botón "Limpiar Campos" de Pelicula
            $('#limpiar-pelicula').on('click', function() {
                // Restablece el contenido de los campos de entrada
                $('#titulo_espanol').val('');
                $('#titulo_original').val('');
                $('#titulo_ingles').val('');
                $('#imagen').val('');
                $('#sinopsis').val('');
                $('#clasificacion').val('');
                $('#genero').val('');
                $('#director').val('');
                $('#reparto').val('');
                $('#trailer').val('');
                $('#asientos_disponibles').val('');
            });

            // Evento para el botón "Limpiar Campos" de Clientes
            $('#limpiar-cliente').on('click', function() {
                // Restablece el contenido de los campos de entrada
                $('#user').val('');
                $('#user_original').val('');
                $('#pass').val('');
                $('#nombre').val('');
                $('#apellido').val('');
                $('#correo').val('');
                $('#telefono').val('');
            });
        });
    </script>

    <script src="validacion.js"></script>
</body>
</html>