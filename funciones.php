<?php
    function obtener_pelicula_con_variable() {
        try {
            // Importar las credenciales
            include ('database.php');

            $titulo = $_GET [ 'pelicula' ];

            // Consulta SQL
            $sql = "SELECT * FROM pelicula WHERE titulo_espanol = '$titulo';";         

            // Realizar la consulta
            $consulta = mysqli_query ( $conn, $sql );

            return $consulta;

            // Cerrar la conexión (opcional)
            // $resultado = mysqli_close ( $db );

        } catch ( \Throwable $th ) {
            var_dump ( $th );
        }
    }

    function obtener_peliculas() {
        try {
            // Importar las credenciales
            require ('database.php');

            // Consulta SQL
            $sql = "SELECT * FROM pelicula;";         

            // Realizar la consulta
            $consulta = mysqli_query ( $conn, $sql );

            return $consulta;

            // Cerrar la conexión (opcional)
            // $resultado = mysqli_close ( $db );

        } catch ( \Throwable $th ) {
            var_dump ( $th );
        }
    }

    function obtener_datos_recibo() {
        try {
            // Importar las credenciales
            require ('database.php');

            $titulo = $_GET [ 'pelicula' ];
            $asientos = $_GET [ 'asientos' ];

            // Consulta SQL
            $sql = "SELECT * FROM compra WHERE titulo_espanol = '$titulo' AND asientos = '$asientos';";         

            // Realizar la consulta
            $consulta = mysqli_query ( $conn, $sql );

            return $consulta;

            // Cerrar la conexión (opcional)
            // $resultado = mysqli_close ( $db );

        } catch ( \Throwable $th ) {
            var_dump ( $th );
        }
    }
?>