<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u748726467_cine";

    //? Conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión Fallida: ". $conn->connect_error);
    }    
    echo "Conexión Exitosa";

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
            $sql = "INSERT INTO pelicula (titulo_espanol,titulo_ingles,imagen,
                                            sinopsis,clasificacion,genero,director,
                                            reparto,trailer,asientos_disponibles) 
                                            VALUES ('$titulo_espanol', '$titulo_ingles',
                                            '$imagen','$sinopsis','$clasificacion','$genero',
                                            '$director','$reparto','$trailer','$asientos_disponibles')";
            if (mysqli_query($conn, $sql)) {
                echo "Pelicula Insertada Exitosamente";
            } else {
                echo "Error Al Insertar Pelicula: " . mysqli_error($conn);
            }

        //* Baja Pelicula
        } else if (isset($_POST["baja-pelicula"])) {
            $sql = "DELETE FROM pelicula WHERE titulo_espanol = '$titulo_espanol'";

            if (mysqli_query($conn, $sql)) {
                echo "Pelicula Eliminada Exitosamente";
            } else {
                echo "Error Al Eliminar Pelicula: " . mysqli_error($conn);
            }

        //* Modificar Pelicula
        } else if (isset($_POST["modificar-pelicula"])) {
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
                                            WHERE titulo_espanol = '$titulo_espanol'";
            
            if (mysqli_query($conn, $sql)) {
                echo "Pelicula Modificada Exitosamente";
            } else {
                echo "Error Al Modificar Pelicula: " . mysqli_error($conn);
            }

        //* Alta Cliente
        } else if (isset($_POST["alta-cliente"])) {
            $sql = "INSERT INTO cliente (user,pass,nombre,apellido,correo,telefono)
                                        VALUES ('$user','$pass','$nombre','$apellido',
                                                '$correo','$telefono')";
            if (mysqli_query($conn, $sql)) {
                echo "Cliente Insertado Exitosamente";
            } else {
                echo "Error Al Insertar Cliente: " . mysqli_error($conn);
            }

        //* Baja Cliente
        } else if (isset($_POST["baja-cliente"])) {
            $sql = "DELETE FROM cliente WHERE user = '$user'";

            if (mysqli_query($conn, $sql)) {
                echo "Cliente Eliminado Exitosamente";
            } else {
                echo "Error Al Eliminar Cliente: " . mysqli_error($conn);
            }

        //* Modificar Cliente
        } else if (isset($_POST["modificar-cliente"])) {
            $sql = "UPDATE cliente SET user = '$user',
                                        pass = '$pass',
                                        nombre = '$nombre',
                                        apellido = '$apellido',
                                        correo = '$correo',
                                        telefono = '$telefono'
                                        WHERE user = '$user'";

            if (mysqli_query($conn, $sql)) {
                echo "Cliente Modificado Exitosamente";
            } else {
                echo "Error Al Modificar Cliente: " . mysqli_error($conn);
            }
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
    <div class="contenedor-admin-peliculas">
        <h2> Base de Datos - Películas </h2>
        <form class="contenedor-database" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="input">
                <h3> Título en Español </h3>
                <input type="text" name="titulo_espanol" id="titulo_espanol" placeholder="Titulo en Español">
            </div>
            
            <div class="input">
                <h3> Título en Inglés </h3>
                <input type="text" name="titulo_ingles" id="titulo_ingles" placeholder="Título en Inglés">
            </div>
    
            <div class="input">
                <h3> Imagen </h3>
                <input type="text" name="imagen" id="imagen" placeholder="Ruta de la Imagen">
            </div>
    
            <div class="input">
                <h3> Sinopsis </h3>
                <textarea name="sinopsis" id="sinopsis" placeholder="Sinopsis"></textarea>
            </div>
    
            <div class="input">
                <h3> Clasificación </h3>
                <input type="text" name="clasificacion" id="clasificacion" placeholder="Clasificación">
            </div>
    
            <div class="input">
                <h3> Género </h3>
                <input type="text" name="genero" id="genero" placeholder="Género">
            </div>
    
            <div class="input">
                <h3> Director </h3>
                <input type="text" name="director" id="director" placeholder="Director">
            </div>
    
            <div class="input">
                <h3> Reparto </h3>
                <textarea name="reparto" id="reparto" placeholder="Reparto"></textarea>
            </div>
    
            <div class="input">
                <h3> Trailer </h3>
                <input type="text" name="trailer" id="trailer" placeholder="Ruta del Trailer">
            </div>
    
            <div class="input">
                <h3> Asientos Disponibles </h3>
                <input type="text" name="asientos_disponibles" id="asientos_disponibles" placeholder="Asientos Disponibles">
            </div>
    
            <div class="admin-botones"> 
                <input type="submit" name="alta-pelicula" value="Alta">
                <input type="submit" name="baja-pelicula" value="Baja">
                <input type="submit" name="modificar-pelicula" value="Modificar" >
                
                <p>
                    ID Película
                    <select name="id-pelicula">
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
                </p>   
            </div>
        </form>
    </div>

    <div class="contenedor-admin-clientes">
        <h2> Base de Datos - Clientes </h2>
        <form class="contenedor-database" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="input">
                <h3> Usuario </h3>
                <input type="text" name="user" id="user" placeholder="Usuario">
            </div>
    
            <div class="input">
                <h3> Contraseña </h3>
                <input type="text" name="pass" id="pass" placeholder="Contraseña">
            </div>
    
            <div class="input">
                <h3> Nombre/s </h3>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre/s">
            </div>
    
            <div class="input">
                <h3> Apellidos </h3>
                <input type="text" name="apellido" id="apellido" placeholder="apellido">
            </div>
    
            <div class="input">
                <h3> Correo Electrónico </h3>
                <input type="text" name="correo" id="correo" placeholder="Correo Electrónico">
            </div>
    
            <div class="input">
                <h3> Teléfono </h3>
                <input type="text" name="telefono" id="telefono" placeholder="Teléfono">
            </div>

            <div class="admin-botones"> 
                <input type="submit" name="alta-cliente" value="Alta" >
                <input type="submit" name="baja-cliente" value="Baja">
                <input type="submit" name="modificar-cliente" value="Modificar">
                
                <p>
                    ID Cliente
                    <select name="id-cliente">
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
                </p>   
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Evento de cambio para el combobox de películas
            $('#id-pelicula').on('change', function() {
                var tituloSeleccionado = $(this).val();
                $.ajax({
                    url: 'obtener_datos_pelicula.php',
                    method: 'POST',
                    data: { titulo_espanol: tituloSeleccionado },
                    success: function(data) {
                        var datos = JSON.parse(data);
                        $('#titulo_espanol').val(datos.titulo_espanol);
                        $('#titulo_ingles').val(datos.titulo_ingles);
                        $('#imagen').val(datos.imagen);
                        $('#sinopsis').val(datos.sinopsis);
                        $('#clasificacion').val(datos.clasificacion);
                        $('#genero').val(datos.genero);
                        $('#director').val(datos.director);
                        $('#reparto').val(datos.reparto);
                        $('#trailer').val(datos.trailer);
                        $('#asientos_disponibles').val(datos.asientos_disponibles);
                    }
                });
            });

            // Evento de cambio para el combobox de usuarios
            $('#combo_usuarios').on('change', function() {
                var usuarioSeleccionado = $(this).val();
                $.ajax({
                    url: 'obtener_datos_cliente.php',
                    method: 'POST',
                    data: { user: usuarioSeleccionado },
                    success: function(data) {
                        var datos = JSON.parse(data);
                        $('#user').val(datos.user);
                        $('#pass').val(datos.pass);
                        $('#nombre').val(datos.nombre);
                        $('#apellido').val(datos.apellido);
                        $('#correo').val(datos.correo);
                        $('#telefono').val(datos.telefono);
                    }
                });
            });
        });
    </script>
</body>
</html>