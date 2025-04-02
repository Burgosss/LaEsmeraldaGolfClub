<?php
// Activar reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión
require_once '../db/db.php';

// Verificar conexión
if ($conn->connect_error) {
    $response = ["success" => false, "message" => "Conexión fallida: " . $conn->connect_error];
    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que todos los campos necesarios existan
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['member-status']) || 
        empty($_POST['category']) || empty($_POST['suggestion'])) {
        $response = ["success" => false, "message" => "Todos los campos marcados con * son obligatorios"];
        echo json_encode($response);
        exit;
    }

    // Obtener los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = isset($_POST['phone']) ? $_POST['phone'] : '';
    $estatus_membresia = $_POST['member-status'];
    $categoria = $_POST['category'];
    $sugerencia = $_POST['suggestion'];
    
    // No es necesario pasar la fecha_envio ya que MySQL utiliza CURRENT_TIMESTAMP por defecto
    
    try {
        // Preparar la consulta - utilizando el nombre correcto del campo (fecha_envio)
        $stmt = $conn->prepare("INSERT INTO sugerencias (nombre, email, telefono, estatus_membresia, categoria, sugerencia) 
                               VALUES (?, ?, ?, ?, ?, ?)");
        
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }
        
        // Vincular los parámetros
        $stmt->bind_param("ssssss", $nombre, $email, $telefono, $estatus_membresia, $categoria, $sugerencia);
    
        // Ejecutar la consulta
        if ($stmt->execute()) { 
            $response = ["success" => true, "message" => "Sugerencia enviada correctamente."];
        } else {
            throw new Exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    
        // Cerrar la sentencia
        $stmt->close();
    } catch (Exception $e) {
        $response = ["success" => false, "message" => $e->getMessage()];
    }
    
    // Enviar respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Si no es una solicitud POST
    $response = ["success" => false, "message" => "Método no permitido"];
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Cerrar la conexión
$conn->close();
?>