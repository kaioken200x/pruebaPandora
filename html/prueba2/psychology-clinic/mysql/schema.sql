CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dni VARCHAR(20) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    type_cita VARCHAR(255) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    UNIQUE (appointment_date, appointment_time)
);

CREATE INDEX idx_dni ON appointments(dni);
CREATE INDEX idx_appointment_time ON appointments(appointment_time);