<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "mysql.webcindario.com"; 
$user = "golfclubesm";      
$password = "golfclubesm";     
$dbname = "golfclubesm"; 



$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    $conn->set_charset("utf8mb4");
}
?>
