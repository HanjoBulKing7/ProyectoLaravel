// Fotos de la sucursal
const fotos = [];
for (let i = 1; i <= 21; i++) {
  fotos.push(`{{ asset('images/sucursal/${i}.jpg') }}`); // En JS puro no se puede usar Blade directamente
}

// Solución en Laravel: pasar fotos desde Blade o usar rutas relativas desde public
const fotosPath = [];
for (let i = 1; i <= 21; i++) {
  fotosPath.push(`/images/sucursal/${i}.jpg`);
}

let currentIndex = 0;
const carouselImg = document.getElementById('carouselImage');
const overlay = document.getElementById('fullscreen-overlay');
const fullscreenImg = document.getElementById('fullscreen-img');

function mostrarImagen(index) {
  carouselImg.src = fotosPath[index];
}

function showNextImage() {
  currentIndex = (currentIndex + 1) % fotosPath.length;
  mostrarImagen(currentIndex);
}

// Mostrar la primera imagen al cargar
mostrarImagen(currentIndex);

// Cambiar cada 5 segundos
setInterval(showNextImage, 5000);

// Pantalla completa
function abrirFullscreen(src) {
  fullscreenImg.src = src;
  overlay.classList.add('visible');
}

function cerrarFullscreen(e) {
  if (e.target === fullscreenImg) return;
  overlay.classList.remove('visible');
  fullscreenImg.src = '';
}

// Eventos
overlay.addEventListener('click', cerrarFullscreen);
document.querySelector('.close-btn').addEventListener('click', cerrarFullscreen);
