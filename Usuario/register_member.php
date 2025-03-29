<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $membership = $_POST['membership'] ?? '';

    // Validaciones básicas
    if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address) || empty($membership)) {
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

    // Validar membresía seleccionada
    $membershipMap = [
        'gold' => 2,    // ID de membresía para Oro
        'silver' => 3,  // ID de membresía para Plata
        'bronze' => 1   // ID de membresía para VIP
    ];

    if (!array_key_exists($membership, $membershipMap)) {
        echo json_encode(['success' => false, 'message' => 'Invalid membership selected']);
        exit;
    }

    $membershipId = $membershipMap[$membership];

    // Crear contraseña predeterminada
    $default_password = password_hash($username . '123', PASSWORD_DEFAULT);

    // Transaction
    $conn->begin_transaction();
    try {
        // Check if email already exists
        $checkEmail = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $checkEmail->store_result();
        
        if ($checkEmail->num_rows > 0) {
            throw new Exception("Email already registered");
        }
        $checkEmail->close();

        // Insert user
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $email, $default_password, $phone, $address);
        $stmt->execute();
        $userId = $conn->insert_id;

        // Calcular fechas de la membresía
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+6 months'));

        // Insertar membresía
        $membershipStmt = $conn->prepare("INSERT INTO usuario_membresia (usuario_id, membresia_id, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, 'activa')");
        $membershipStmt->bind_param("iiss", $userId, $membershipId, $startDate, $endDate);
        $membershipStmt->execute();

        $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Registration successful!']);
    } catch (Exception $e) {
        $conn->rollback();
        error_log($e->getMessage());
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        if (isset($stmt)) $stmt->close();
        if (isset($membershipStmt)) $membershipStmt->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>