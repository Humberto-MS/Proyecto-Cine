<?php
    // $dbhost = "localhost";
    // $dbname = "u748726467_cine";
    // $dbuser = "u748726467_admin";
    // $dbpass = "pap0Pep0";

    $dbhost = "localhost";
    $dbname = "cine";
    $dbuser = "root";
    $dbpass = "";

    $conn = mysqli_connect ( $dbhost, $dbuser, $dbpass, $dbname, "3306" ) 
                or die ( "PROBLEMAS DE CONEXION" );
?>