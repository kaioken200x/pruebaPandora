document.addEventListener('DOMContentLoaded', function() {
    const dniInput = document.getElementById('dni');
    const tipoCitaSelect = document.getElementById('type_cita');

    if (!dniInput || !tipoCitaSelect) {
        alert('Elementos do formulário não encontrados DNI o Tipo Cita.');
        return;
    }

    dniInput.addEventListener('blur', function() {
        if(dniInput.value.length < 9) {
            alert('El DNI debe tener 9 caracteres.');
            dniInput.focus();
            return;
        }else{

            checkDNI(dniInput.value);
        }
    });

    function checkDNI(dni) {
        if (dni) {
            fetch('/prueba2/psychology-clinic/src/ajax/check_dni.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `dni=${encodeURIComponent(dni)}`,
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    tipoCitaSelect.options[1].disabled = false; 
                } else {
                    tipoCitaSelect.options[1].disabled = true;
                    tipoCitaSelect.value = "Primera consulta";
                }
                alert(data.message);
            })
            .catch(error => console.error('Error:', error));
        }
    }
});