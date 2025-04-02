<?php
session_start();

// Credenciales de prueba (puedes cambiarlas por una base de datos)
$valid_email = "admin@example.com";
$valid_password = "1234";

// Obtener datos enviados desde `fetch`
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Validar credenciales
if ($email === $valid_email && $password === $valid_password) {
    $_SESSION['user'] = $email; // Guardar usuario en la sesión
    echo json_encode(["success" => true, "message" => "Login exitoso"]);
} else {
    echo json_encode(["success" => false, "message" => "Correo o contraseña incorrectos"]);
}
?>
