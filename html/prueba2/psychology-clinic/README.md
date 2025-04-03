# Sistema de Reservas para Clínica de Psicología

Este proyecto es un sistema de reservas en línea para una clínica de psicología. Permite a los usuarios agendar citas proporcionando su información personal y seleccionando el tipo de cita que necesitan. El sistema incluye funciones para validar la entrada del usuario, verificar la disponibilidad de citas y prevenir reservas duplicadas.

## Estructura del Proyecto

El proyecto está organizado de la siguiente manera:

```
psychology-clinic
├── src
│   ├── config
│   │   └── database.php          # Configuración de conexión a la base de datos
│   ├── controllers
│   │   ├── AppointmentController.php  # Lógica para la creación de citas
│   │   └── ValidationController.php   # Validación de datos de entrada
│   ├── models
│   │   └── Appointment.php        # Modelo de datos para las citas
│   ├── views
│   │   ├── index.php             # Formulario HTML para la recolección de datos del usuario
│   │   └── success.php           # Mensaje de éxito tras la creación de la cita
│   ├── ajax
│   │   └── check_dni.php         # Procesa solicitudes AJAX para verificar el DNI
│   └── assets
│       └── js
│           └── scripts.js        # JavaScript para manejar solicitudes AJAX
├── .env                           # Variables de entorno para la aplicación
├── composer.json                  # Archivo de configuración de Composer
├── README.md                      # Documentación del proyecto
└── mysql
   └── schema.sql                # Esquema SQL para la base de datos
```

## Funcionalidades

- **Validación de Entrada del Usuario**: Asegura que todos los campos requeridos estén completos antes de enviar el formulario.
- **Verificación de DNI**: Utiliza AJAX para comprobar si el DNI proporcionado existe en la base de datos, habilitando o deshabilitando los tipos de citas según corresponda.
- **Agendamiento de Citas**: Previene reservas duplicadas y asegura que no haya huecos en el horario.
- **Integración con Base de Datos**: Almacena los detalles de las citas en una base de datos MySQL.

## Instrucciones de Configuración

1. **Clonar el Repositorio**: 
   ```
   git clone <repository-url>
   cd psychology-clinic-reservation
   ```

2. **Instalar Dependencias**: 
   Asegúrate de tener Composer instalado, luego ejecuta:
   ```
   composer install
   ```

3. **Configurar la Base de Datos**: 
   Actualiza el archivo `.env` con las credenciales de tu base de datos.

4. **Crear el Esquema de la Base de Datos**: 
   Ejecuta los comandos SQL en `sql/schema.sql` para crear las tablas necesarias.

5. **Ejecutar la Aplicación**: 
   Puedes usar un servidor local (como XAMPP o MAMP) para ejecutar la aplicación y acceder a ella desde tu navegador web.

## Uso

- Navega a la aplicación en tu navegador web.
- Completa el formulario de reserva con tus datos.
- El sistema validará tu entrada y verificará la disponibilidad del tipo de cita basado en tu DNI.
- Tras un envío exitoso, recibirás un mensaje de confirmación.
