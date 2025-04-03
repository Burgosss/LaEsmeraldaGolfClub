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
$sql = "SELECT id, email, password, nombre FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Al encontrar el usuario en la base de datos
if ($row = $result->fetch_assoc()) {
    $hashed_password = $row['password']; // Contraseña almacenada
    $user_name = $row['nombre'];  // Asegúrate de que tienes una columna 'nombre' en tu base de datos.

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = $email;  
        $_SESSION['user_name'] = $user_name;  

        // Redirección con alert de éxito
        echo "<script>
                alert('Inicio de sesión exitoso. Bienvenido $user_name');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        // Alert de credenciales incorrectas
        echo "<script>
                alert('Correo o contraseña incorrectos. Inténtalo de nuevo.');
                window.location.href = 'login.php';
              </script>";
    }
} else {
    // Alert de usuario no encontrado
    echo "<script>
            alert('Correo o contraseña incorrectos. Inténtalo de nuevo.');
            window.location.href = 'login.php';
          </script>";
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
