<?php
    // Importar las credenciales
    require __DIR__ . '\database.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo_seleccionado = $_POST["titulo_espanol"];

        // Prepara la consulta SQL para obtener los datos de la película seleccionada
        $sql = "SELECT * FROM pelicula WHERE titulo_espanol = '$titulo_seleccionado'";

        // Ejecuta la consulta SQL
        $resultado = mysqli_query($conn, $sql);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            header('Content-Type: application/json');
            echo json_encode($fila);
        } else {
            echo "Error al obtener los datos de la película: " . mysqli_error($conn);
        }
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conn);
?>