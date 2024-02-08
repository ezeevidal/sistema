document.addEventListener('DOMContentLoaded', function() {
  const calendarioEl = document.getElementById('calendario');
  let fechaActual = new Date();

  function generarCalendario(fecha) {
      calendarioEl.innerHTML = ''; // Limpiar el calendario

      const primerDiaMes = new Date(fecha.getFullYear(), fecha.getMonth(), 1);
      const ultimoDiaMes = new Date(fecha.getFullYear(), fecha.getMonth() + 1, 0);

      // Encabezado
      const headerEl = document.createElement('div');
      headerEl.className = 'header';

      const prevEl = document.createElement('div');
      prevEl.innerText = '<';
      prevEl.onclick = () => {
          fechaActual = new Date(fecha.getFullYear(), fecha.getMonth() - 1, 1);
          generarCalendario(fechaActual);
      };

      const nextEl = document.createElement('div');
      nextEl.innerText = '>';
      nextEl.onclick = () => {
          fechaActual = new Date(fecha.getFullYear(), fecha.getMonth() + 1, 1);
          generarCalendario(fechaActual);
      };

      const titleEl = document.createElement('div');
      titleEl.innerText = fecha.toLocaleDateString('es', { month: 'long', year: 'numeric' });

      headerEl.appendChild(prevEl);
      headerEl.appendChild(titleEl);
      headerEl.appendChild(nextEl);

      calendarioEl.appendChild(headerEl);

      // Días de la semana
      const daysEl = document.createElement('div');
      daysEl.className = 'days';

      ['D', 'L', 'M', 'X', 'J', 'V', 'S'].forEach(dayName => {
          const dayEl = document.createElement('div');
          dayEl.className = 'day-name';
          dayEl.innerText = dayName;
          daysEl.appendChild(dayEl);
      });

      // Rellenar días previos al primero del mes
      for (let i = 0; i < primerDiaMes.getDay(); i++) {
          const emptyEl = document.createElement('div');
          daysEl.appendChild(emptyEl);
      }

      // Días del mes
      for (let day = 1; day <= ultimoDiaMes.getDate(); day++) {
          const dayEl = document.createElement('div');
          dayEl.className = 'day';
          dayEl.innerText = day;

          // Resaltar el día actual
          if (fecha.getFullYear() === new Date().getFullYear() && fecha.getMonth() === new Date().getMonth() && day === new Date().getDate()) {
              dayEl.classList.add('today');
          }

          daysEl.appendChild(dayEl);
      }

      calendarioEl.appendChild(daysEl);
  }

  generarCalendario(fechaActual);
});
