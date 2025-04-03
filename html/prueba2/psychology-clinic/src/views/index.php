<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
use App\Controllers\AppointmentController;
use App\Controllers\ValidationController;
use App\Config\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['nombre'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $phone = $_POST['telefono'] ?? '';
    $email = $_POST['email'] ?? '';
    $type_cita = $_POST['type_cita'] ?? '';

    $database = new Database();
    $pdo = $database->getConnection();
    $validationController = new ValidationController();
    $appointmentController = new AppointmentController($pdo);
    $errorMessage = '';
    $data = [
        'nombre' => $name,
        'dni' => $dni,
        'telefono' => $phone,
        'email' => $email,
        'type_cita' => $type_cita
    ];

    $validationErrors = $validationController->validateAppointmentData($data);

    if (empty($validationErrors)) {
        $appointmentCreated = $appointmentController->createAppointment($data);

        if ($appointmentCreated) {

            session_start();
            $_SESSION['appointment_success'] = true;
            $_SESSION['appointment_data'] = $data;
            header('Location: success.php');
            exit;

        } else {
            $errorMessage = "Error al crear la cita. Por favor, inténtelo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Citas - Clínica de Psicología</title>
    <script src="../assets/js/scripts.js"></script>
</head>
<body>
    <h1>Reserva de Citas</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required onblur="checkDNI(this.value)"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="type_cita">Tipo de cita:</label><br>
        <select id="type_cita" name="type_cita" required>
            <option value="Primera consulta">Primera consulta</option>
            <option value="Revisión" disabled>Revisión</option>
        </select><br><br>

        <button type="submit">Reservar</button>
    </form>

    <?php if (!empty($validationErrors)): ?>
        <div class="error-messages">
            <?php foreach ($validationErrors as $error): ?>
                <p><?php echo htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($errorMessage)): ?>
        <div class="error-message">
            <p><?php echo htmlspecialchars($errorMessage); ?></p>
        </div>
    <?php endif; ?>
</body>
</html>