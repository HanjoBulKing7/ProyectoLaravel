document.addEventListener('DOMContentLoaded', function() {
    // Fechas no disponibles (ejemplo)
    const unavailableDates = [
        '2024-06-05', '2024-06-06', '2024-06-12',
        '2024-06-13', '2024-06-19', '2024-06-20',
        '2024-06-26', '2024-06-27'
    ];
    
    let currentDate = new Date();
    let selectedDate = null;
    
    renderCalendar(currentDate);
    
    document.getElementById('prev-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });
    
    document.getElementById('next-month').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
    
    function renderCalendar(date) {
        const year = date.getFullYear();
        const month = date.getMonth();
        document.getElementById('current-month').textContent = 
            new Date(year, month).toLocaleDateString('es-ES', { month: 'long', year: 'numeric' });
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysFromPrevMonth = firstDay.getDay() === 0 ? 6 : firstDay.getDay() - 1;
        const daysFromNextMonth = 6 - lastDay.getDay();
        const calendarDays = document.getElementById('calendar-days');
        calendarDays.innerHTML = '';
        
        // Mes anterior
        const prevMonthLastDay = new Date(year, month, 0).getDate();
        for (let i = daysFromPrevMonth; i > 0; i--) {
            const day = document.createElement('div');
            day.className = 'calendar-day empty-day';
            day.textContent = prevMonthLastDay - i + 1;
            calendarDays.appendChild(day);
        }
        
        // Mes actual
        for (let i = 1; i <= lastDay.getDate(); i++) {
            const day = document.createElement('div');
            const currentDateStr = `${year}-${String(month + 1).padStart(2,'0')}-${String(i).padStart(2,'0')}`;
            day.className = 'calendar-day';
            day.textContent = i;
            
            if (unavailableDates.includes(currentDateStr)) {
                day.classList.add('disabled-day');
            } else {
                day.classList.add('available-day');
                day.addEventListener('click', function() {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected-day'));
                    this.classList.add('selected-day');
                    selectedDate = currentDateStr;
                    document.getElementById('selected-date').value = selectedDate;
                });
            }
            
            const today = new Date();
            if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                day.classList.add('font-bold', 'underline');
            }
            calendarDays.appendChild(day);
        }
        
        // Mes siguiente
        for (let i = 1; i <= daysFromNextMonth; i++) {
            const day = document.createElement('div');
            day.className = 'calendar-day empty-day';
            day.textContent = i;
            calendarDays.appendChild(day);
        }
    }
    
    // Estilistas
    document.querySelectorAll('.estilista-card').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.estilista-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            card.querySelector('input[type="radio"]').checked = true;
        });
    });

    // Servicios
    document.querySelectorAll('.card-option').forEach(card => {
        card.addEventListener('click', function() {
            document.querySelectorAll('.card-option').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            card.querySelector('input[type="radio"]').checked = true;
        });
    });

    // Horas
    document.querySelectorAll('.time-option').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.time-option').forEach(b => b.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Botón reservar
    document.getElementById('reservar-btn').addEventListener('click', function () {
        window.location.href = 'Anticipo.html';
    });
});
