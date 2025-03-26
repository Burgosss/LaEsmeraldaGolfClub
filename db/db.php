<?php
    $host = "mysql.webcindario.com"; 
    $user = "golfclubesm";      
    $password = "zF9TkjGwcu";    
    $dbname = "golfclubesm"; 

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
?>
