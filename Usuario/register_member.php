<?php
require_once '../db/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    
    if (empty($username) || empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($address)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }
    

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        exit;
    }
    
    $default_password = password_hash($username . '123', PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, password, telefono, direccion) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $default_password, $phone, $address);
    
    if ($stmt->execute()) {
        $userId = $conn->insert_id;
        
        $membershipId = 1;
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d', strtotime('+6 months')); 
        
        $membershipStmt = $conn->prepare("INSERT INTO usuario_membresia (usuario_id, membresia_id, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, 'activa')");
        $membershipStmt->bind_param("iiss", $userId, $membershipId, $startDate, $endDate);
        
        if ($membershipStmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Registration successful!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error assigning membership: ' . $membershipStmt->error]);
        }
        
        $membershipStmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error creating user: ' . $stmt->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>