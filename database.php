<?php
    $dbhost = "localhost";
    $dbname = "cine";
    $dbuser = "admin";
    $dbpass = "pap0Pep0";

    // $dbhost = "localhost";
    // $dbname = "cine";
    // $dbuser = "root";
    // $dbpass = "";

    $conn = mysqli_connect ( $dbhost, $dbuser, $dbpass, $dbname, "3306" ) 
                or die ( "PROBLEMAS DE CONEXION" );
?>