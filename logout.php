<?php
    session_start();

    // Destruir la sesión (cerrar sesión)
    session_destroy();

    // Redirigir a la página de inicio
    header('location: index.php');
    exit;
?>