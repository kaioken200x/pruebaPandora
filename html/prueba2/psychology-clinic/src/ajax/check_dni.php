<?php
require_once '../config/database.php';

use App\Config\Database;

header('Content-Type: application/json');

$dni = $_POST['dni'] ?? '';

$response = ['exists' => false, 'message' => ''];

if (!empty($dni)) {
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE dni = ?");
    $stmt->bindParam(1, $dni, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $response['exists'] = true;
        $response['message'] = 'El DNI existe. Puede seleccionar "Revisión".';
    } else {
        $response['message'] = 'El DNI no existe. Solo está disponible "Primera consulta".';
    }
}

echo json_encode($response);
?>