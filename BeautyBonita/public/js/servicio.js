// Script para menú móvil
document.getElementById('menu-btn').addEventListener('click', function() {
  const menu = document.getElementById('mobile-menu');
  if (menu.style.display === 'block') {
    menu.style.display = 'none';
  } else {
    menu.style.display = 'block';
  }
});

// Script para el menú desplegable de usuario
document.addEventListener('DOMContentLoaded', function() {
  const userMenuButton = document.getElementById('user-menu-button');
  const userMenu = document.getElementById('user-menu');
  
  if (userMenuButton && userMenu) {
    userMenuButton.addEventListener('click', function(e) {
      e.stopPropagation();
      userMenu.classList.toggle('hidden');
    });
    
    // Cerrar el menú al hacer clic fuera de él
    document.addEventListener('click', function(e) {
      if (!userMenu.contains(e.target) && e.target !== userMenuButton) {
        userMenu.classList.add('hidden');
      }
    });
  }
});