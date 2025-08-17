// Inicializar feather icons
feather.replace();

// Funciones para manejar el modal
function openModal() {
    document.getElementById('appointmentModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('appointmentModal').classList.add('hidden');
}

function openCalendarView() {
    // Aquí iría la lógica para cambiar a vista de calendario
    alert("Cambiando a vista de calendario");
}

// Manejar el menú móvil
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    const menu = document.getElementById('mobile-menu');
    if (menu.classList.contains('hidden')) {
        menu.classList.remove('hidden');
    } else {
        menu.classList.add('hidden');
    }
});