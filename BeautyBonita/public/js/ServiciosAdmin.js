document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
    
    // Menú móvil
    document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
    
    // Filtros - PREVENIR ENVÍO DE FORMULARIO
    const searchForm = document.querySelector('form[method="GET"]');
    const searchInput = document.querySelector('input[type="text"]');
    const estadoSelect = document.querySelectorAll('select')[0];
    const ordenSelect = document.querySelectorAll('select')[1];
    const rows = document.querySelectorAll('tbody tr');
    
    // Prevenir envío del formulario de búsqueda
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            aplicarFiltros();
        });
    }
    
    function aplicarFiltros() {
    const searchValue = searchInput.value.toLowerCase();
    const estadoValue = estadoSelect.value;
    console.log('Filtrando por estado:', estadoValue);
    
    rows.forEach(row => {
        const nombre = row.cells[1].querySelector('.font-medium')?.textContent.toLowerCase() || '';
        const descripcion = row.cells[1].querySelector('.text-sm')?.textContent.toLowerCase() || '';
        const estadoElement = row.cells[5].querySelector('span');
        
        // LIMPIAR el texto del estado - ¡IMPORTANTE!
        const estadoRaw = estadoElement?.textContent || '';
        const estado = estadoRaw.toLowerCase().trim(); // Elimina espacios al inicio y final
        
        console.log('Fila - Nombre:', nombre, 'Estado:', '"' + estado + '"', 'Elemento:', estadoElement);
        
        const coincideBusqueda = searchValue === '' || 
                               nombre.includes(searchValue) || 
                               descripcion.includes(searchValue);
        
        // Comparar con el estado limpio
        const coincideEstado = estadoValue === 'Todos los estados' || 
                             (estadoValue === 'Activos' && estado === 'activo') ||
                             (estadoValue === 'Inactivos' && estado === 'inactivo');
        
        row.style.display = (coincideBusqueda && coincideEstado) ? '' : 'none';
    });
}
    
    function ordenarTabla() {
        const orden = ordenSelect.value;
        const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
        
        visibleRows.sort((a, b) => {
            const nombreA = a.cells[1].querySelector('.font-medium')?.textContent || '';
            const nombreB = b.cells[1].querySelector('.font-medium')?.textContent || '';
            
            const precioTextA = a.cells[3].textContent.replace('$', '').replace(',', '');
            const precioTextB = b.cells[3].textContent.replace('$', '').replace(',', '');
            const precioA = parseFloat(precioTextA) || 0;
            const precioB = parseFloat(precioTextB) || 0;
            
            switch (orden) {
                case 'Nombre A-Z': return nombreA.localeCompare(nombreB);
                case 'Nombre Z-A': return nombreB.localeCompare(nombreA);
                case 'Precio ↑': return precioA - precioB;
                case 'Precio ↓': return precioB - precioA;
                default: return 0;
            }
        });
        
        const tbody = document.querySelector('tbody');
        // Primero remover todas las filas
        visibleRows.forEach(row => row.remove());
        // Luego agregarlas en el orden correcto
        visibleRows.forEach(row => tbody.appendChild(row));
    }
    
    // Event listeners
    if (searchInput) searchInput.addEventListener('input', aplicarFiltros);
    if (estadoSelect) estadoSelect.addEventListener('change', aplicarFiltros);
    if (ordenSelect) ordenSelect.addEventListener('change', function() {
        aplicarFiltros();
        setTimeout(ordenarTabla, 10); // Pequeño delay para asegurar
    });
    
    // Aplicar filtros iniciales si hay valores en los campos
    setTimeout(aplicarFiltros, 100);
    
    // Confirmación de eliminación
    document.querySelectorAll('form[action*="destroy"]').forEach(form => {
        form.addEventListener('submit', e => {
            if (!confirm('¿Estás seguro de eliminar este servicio?')) {
                e.preventDefault();
            }
        });
    });
});
