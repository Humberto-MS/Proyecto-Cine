<?php
    // Importar las credenciales
    require ('database.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cliente_seleccionado = $_POST["user"];

        // Prepara la consulta SQL para obtener los datos del usuario seleccionado
        $sql = "SELECT * FROM CLIENTE WHERE user = '$cliente_seleccionado'";

        // Ejecuta la consulta SQL
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            header('Content-Type: application/json');
            echo json_encode($fila);
        } else {
            echo "Error al obtener los datos del cliente: " . mysqli_error($conn);
        }
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
?>