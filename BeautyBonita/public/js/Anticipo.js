document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('servicio')) {
        document.getElementById('servicio-resumen').textContent = decodeURIComponent(urlParams.get('servicio'));
    }
    if (urlParams.get('estilista')) {
        document.getElementById('estilista-resumen').textContent = decodeURIComponent(urlParams.get('estilista'));
    }
    if (urlParams.get('fecha')) {
        document.getElementById('fecha-resumen').textContent = decodeURIComponent(urlParams.get('fecha'));
    }
    if (urlParams.get('hora')) {
        document.getElementById('hora-resumen').textContent = decodeURIComponent(urlParams.get('hora'));
    }

    // Botón de pago
    document.getElementById('realizar-pago').addEventListener('click', function () {
        if (document.getElementById('terminos').checked) {
            document.getElementById('pago-exitoso').style.display = 'flex';
        } else {
            alert('Por favor acepta los términos y condiciones para continuar.');
        }
    });

    // Botón cerrar modal
    document.getElementById('cerrar-modal').addEventListener('click', function () {
        document.getElementById('pago-exitoso').style.display = 'none';
    });
});
