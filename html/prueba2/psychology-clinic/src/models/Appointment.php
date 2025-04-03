<?php
namespace App\Models;

use PDO;

class Appointment {

    private $db;
    private $name;
    private $dni;
    private $phone;
    private $email;
    private $type_cita;
    private $appointment_date;
    private $appointment_time;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function setDetails($name, $dni, $phone, $email, $type_cita, $appointment_date, $appointment_time) {
        $this->name = $name;
        $this->dni = $dni;
        $this->phone = $phone;
        $this->email = $email;
        $this->type_cita = $type_cita;
        $this->appointment_date = $appointment_date;
        $this->appointment_time = $appointment_time;
    }

    public function save() {
        $query = "INSERT INTO appointments (name, dni, phone, email, type_cita, appointment_date, appointment_time)
                  VALUES (:name, :dni, :phone, :email, :type_cita, :appointment_date, :appointment_time)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':dni', $this->dni);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':type_cita', $this->type_cita);
        $stmt->bindParam(':appointment_date', $this->appointment_date);
        $stmt->bindParam(':appointment_time', $this->appointment_time);
        $stmt->execute();
    }
}
?>