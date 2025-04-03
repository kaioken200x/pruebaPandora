<?php
namespace App\Controllers;

class ValidationController {

    /**
     * Validates the appointment data.
     *
     * @param array $data The appointment data to validate.
     * @return array An array of validation errors, if any.
     */
    public function validateAppointmentData($data) {
        $errors = [];

        if (empty($data['nombre'])) {
            $errors['nombre'] = 'El nombre es requerido.';
        }

        if (empty($data['dni'])) {
            $errors['dni'] = 'El DNI es requerido.';
        } elseif (!preg_match('/^\d{8}[A-Z]$/', $data['dni'])) {
            $errors['dni'] = 'El DNI no es válido.';
        }

        if (empty($data['telefono'])) {
            $errors['telefono'] = 'El teléfono es requerido.';
        } elseif (!preg_match('/^\d{9}$/', $data['telefono'])) {
            $errors['telefono'] = 'El teléfono debe tener 9 dígitos.';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'El email es requerido.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El email no es válido.';
        }

        if (empty($data['type_cita'])) {
            $errors['type_cita'] = 'El tipo de cita es requerido.';
        }

        return $errors;
    }
}
?>