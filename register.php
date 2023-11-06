<?php
    // Importar las credenciales
    require ('database.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //? Declaración
        $user = $_POST["user"] ?? null;
        $pass = $_POST["pass"] ?? null;
        $nombre = $_POST["nombre"] ?? null;
        $apellido = $_POST["apellido"] ?? null;
        $correo = $_POST["correo"] ?? null;
        $telefono = $_POST["telefono"] ?? null;

        //* Registrar Cliente
        $sql = "INSERT INTO cliente (user,pass,nombre,apellido,correo,telefono,rol)
                                    VALUES ('$user','$pass','$nombre','$apellido',
                                            '$correo','$telefono','usuario')";
        if (mysqli_query($conn, $sql)) {
            //echo "Registro Realizado con Éxito";
            // Redirige al cliente a iniciar sesión
            header('location: login.php');
            exit;
        } else {
            echo "Error Al Registrar: " . mysqli_error($conn);
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
    <section class="contenedor-login">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <h2> Crea tu cuenta </h2>

            <div class="contenedor-campos-login">
                <div class="campo">
                    <h3> Nombre(s): </h3>
                    <input type="text" name="nombre" placeholder="Nombre(s)">
                </div>

                <div class="campo">
                    <h3> Apellidos: </h3>
                    <input type="text" name="apellido" placeholder="Apellidos">
                </div>

                <div class="campo">
                    <h3> Correo: </h3>
                    <input type="email" name="correo" placeholder="e-mail">
                </div>

                <div class="campo">
                    <h3> Teléfono: </h3>
                    <input type="tel" name="telefono" placeholder="Teléfono">
                </div>

                <div class="campo">
                    <h3> Nombre de Usuario: </h3>
                    <input type="text" name="user" placeholder="Username">
                </div>

                <div class="campo">
                    <h3> Contraseña: </h3>
                    <input type="password" name="pass" placeholder="Password">
                </div>
            </div>

            <div class="mensaje-cuenta-nueva">
                <p> ¿Ya tienes una cuenta? Inicia sesión </p>
                <a href="login.php"> aquí </a>
            </div>        

            <div class="alinear-boton">
                <button type="submit" name="crear-cuenta" > Crear cuenta </button>
            </div>
        </form>
    </section>
</body>
</html>