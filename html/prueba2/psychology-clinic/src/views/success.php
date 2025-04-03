<?php
session_start();
if (!isset($_SESSION['appointment_success'])) {
    header('Location: index.php');
    exit();
}
$name = isset($_SESSION['appointment_data']['nombre']) ? htmlspecialchars($_SESSION['appointment_data']['nombre']) : 'No especificado';
$dni = isset($_SESSION['appointment_data']['dni']) ? htmlspecialchars($_SESSION['appointment_data']['dni']) : 'No especificado';
$phone = isset($_SESSION['appointment_data']['telefono']) ? htmlspecialchars($_SESSION['appointment_data']['telefono']) : 'No especificado';
$email = isset($_SESSION['appointment_data']['email']) ? htmlspecialchars($_SESSION['appointment_data']['email']) : 'No especificado';
$type_cita = isset($_SESSION['appointment_data']['type_cita']) ? htmlspecialchars($_SESSION['appointment_data']['type_cita']) : 'No especificado';

unset($_SESSION['appointment_success']);
unset($_SESSION['appointment_data']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Exitosa</title>
</head>
<body>
    <div class="container">
        <h1>Reserva Exitosa</h1>
        <p>Gracias por su reserva. Aquí están los detalles de su cita:</p>
        <ul>
            <li>Nombre: <?php echo $name; ?></li>
            <li>DNI: <?php echo $dni; ?></li>
            <li>Teléfono: <?php echo $phone; ?></li>
            <li>Email: <?php echo $email; ?></li>
            <li>Tipo de cita: <?php echo $type_cita; ?></li>
        </ul>
        <a href="index.php">Volver a la página principal</a>
    </div>
</body>
</html>