<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    
    // Determine membership ID based on the dropdown value
    $membershipType = $_POST['membership'] ?? '';
    $membershipIdMap = [
        'bronze' => 1, // Silver membership from SQL script
        'silver' => 2, // Gold membership from SQL script
        'gold' => 3    // VIP membership from SQL script
    ];
    $membershipId = $membershipIdMap[$membershipType] ?? 1;

    // Validations
    $errors = [];
    if (empty($username)) $errors[] = 'Username is required';
    if (empty($firstName)) $errors[] = 'First name is required';
    if (empty($lastName)) $errors[] = 'Last name is required';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email format';
    if (empty($phone) || !preg_match('/^\d{10}$/', $phone)) $errors[] = 'Invalid phone number';
    if (empty($address)) $errors[] = 'Address is required';

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }

    // Create default password
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

        // Insert membership
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
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        if (isset($stmt)) $stmt->close();
        if (isset($membershipStmt)) $membershipStmt->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>