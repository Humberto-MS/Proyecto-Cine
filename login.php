<?php
    // Importar las credenciales
    require __DIR__ . '\database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //? Declaración
        $user = $_POST["user"] ?? null;
        $pass = $_POST["pass"] ?? null;

        // Verifica las credenciales en la base de datos
        $sql = "SELECT user,rol FROM CLIENTE WHERE user = '$user' AND pass = '$pass'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            // Credenciales válidas, verifica si es usuario o admin
            $row = $result->fetch_assoc();
            $rol = $row['rol'];

            if ($rol === 'usuario') {
                // Usuario regular, redirige a index.php
                session_start();
                $_SESSION['user'] = $user;
                header('location: index.php');
                exit;
            } else if ($rol === 'admin') {
                // Administrador, redirige a admin.php
                session_start();
                $_SESSION['user'] = $user;
                header('location: admin.php');
                exit;
            }

            // Redirige al cliente a otra página
            header('location: index.php');
            exit;
        } else {
            // Credenciales no válidas, muestra un mensaje de error
            $error_message = "Usuario o contraseña incorrectos.";
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
            <h2> Iniciar Sesión </h2>

            <?php
                if (isset($error_message)) {
                    echo "<p style='color: red;'>$error_message</p>";
                }
            ?>

            <div class="contenedor-campos-login">
                <div class="campo">
                    <h3> Usuario: </h3>
                    <input type="text" name="user" placeholder="Username">
                </div>

                <div class="campo">
                    <h3> Contraseña: </h3>
                    <input type="password" name="pass" placeholder="Password">
                </div>
            </div>

            <div class="mensaje-cuenta-nueva">
                <p> ¿No tienes una cuenta? Registrate </p>
                <a href="register.php"> aquí </a>
            </div>        

            <div class="alinear-boton">
                <button type="submit" name="iniciar-sesion" > Ingresar </button>
            </div>
        </form>
    </section>
</body>
</html>