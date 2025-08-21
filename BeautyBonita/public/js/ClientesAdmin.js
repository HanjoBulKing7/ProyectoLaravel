// Inicializar feather icons
feather.replace();

// Funciones para manejar el modal
function openModal() {
    document.getElementById('clientModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('clientModal').classList.add('hidden');
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