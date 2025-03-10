<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $nombre, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['usuario_id'] = $id;
        $_SESSION['nombre'] = $nombre;
        header("Location: ../index.html"); 
    } else {
        echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas.']);
    }

    $stmt->close();
}
?>
