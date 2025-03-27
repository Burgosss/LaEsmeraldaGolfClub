<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $membershipId = $_POST['membershipId'] ?? 1;

    // Validaciones
    if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }

    if (!preg_match('/^\d{10}$/', $phone)) {
        echo json_encode(['success' => false, 'message' => 'Invalid phone number format']);
        exit;
    }

    // Crear contraseña predeterminada
    $default_password = password_hash($username . '123', PASSWORD_DEFAULT);

    // Transacción
    $conn->begin_transaction();
    try {
        // Insertar usuario
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $default_password, $phone, $address);
        $stmt->execute();
        $userId = $conn->insert_id;

        // Insertar membresía
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+6 months'));
        $membershipStmt = $conn->prepare("INSERT INTO usuario_membresia (usuario_id, membresia_id, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, 'activa')");
        $membershipStmt->bind_param("iiss", $userId, $membershipId, $startDate, $endDate);
        $membershipStmt->execute();

        $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Registration successful!']);
    } catch (Exception $e) {
        $conn->rollback();
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'message' => 'An error occurred during registration']);
    } finally {
        $stmt->close();
        if (isset($membershipStmt)) {
            $membershipStmt->close();
        }
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
