<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "mysql.webcindario.com"; 
$user = "golfclubesm";      
$password = "zF9TkjGwcu";    
$dbname = "golfclubesm"; 

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
    $conn->set_charset("utf8mb4");

}

$conn->close();
?>


