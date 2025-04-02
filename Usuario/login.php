<?php
session_start();

require_once '../db/db.php';

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Error de conexión"]));
}

// Obtener datos enviados desde `fetch`
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Verificar si el usuario existe en la base de datos
$sql = "SELECT id, email, password FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();



// Al encontrar el usuario en la base de datos
if ($row = $result->fetch_assoc()) {
    $hashed_password = $row['password']; // Contraseña almacenada
    $user_name = $row['name'];  // Asegúrate de que tienes una columna 'name' en tu base de datos para el nombre del usuario.

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = $email;  // Guardar el email en sesión
        $_SESSION['user_name'] = $user_name; // Guardar el nombre en sesión
        echo json_encode(["success" => true, "message" => "Login exitoso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Correo o contraseña incorrectos"]);
    }


} else {
    echo json_encode(["success" => false, "message" => "Correo o contraseña incorrectos"]);
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
