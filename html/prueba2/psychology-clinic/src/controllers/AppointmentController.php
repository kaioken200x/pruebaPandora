<?php
namespace App\Controllers;

use App\Models\Appointment;
use PDO;
use DateTime;
use DateInterval;

class AppointmentController {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function createAppointment($data) {
        $name = $data['nombre'];
        $dni = $data['dni'];
        $phone = $data['telefono'];
        $email = $data['email'];
        $type_cita = $data['type_cita'];
        $appointment = $this->getAvailableAppointmentTime();
        $appointment_date = $appointment['date'] ;
        $appointment_time = $appointment['time'];

        if ($appointment_time) {
            $appointment = new Appointment($this->db);
            $appointment->setDetails($name, $dni, $phone, $email, $type_cita, $appointment_date, $appointment_time);
            $appointment->save();

            return "The appointment has been generated.";
        } else {
            return "No available appointment times.";
        }
    }

    private function getAvailableAppointmentTime() {
        $startTime = new DateTime('10:00');
        $endTime = new DateTime('22:00');
        $interval = new DateInterval('PT1H');

        $currentDate = new DateTime();
        $currentDate->setTime(10, 0);

        while (true) {
            $query = "SELECT COUNT(*) FROM appointments WHERE appointment_date = :date AND appointment_time = :time";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':date', $currentDate->format('Y-m-d'));
            $stmt->bindValue(':time', $startTime->format('H:i:s'));
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                return [
                    'date' => $currentDate->format('Y-m-d'),
                    'time' => $startTime->format('H:i:s')
                ];
            }

            $startTime->add($interval);

            if ($startTime >= $endTime) {
                $currentDate->modify('+1 day');
                $startTime = new DateTime('10:00');
            }
        }
    }
}
?>