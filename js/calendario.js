document.addEventListener('DOMContentLoaded', function() {
    const calendarioEl = document.getElementById('calendario');
    let fechaActual = new Date();

    function cerrarModal() {
        document.getElementById('modalRecordatorio').style.display = 'none';
    }

    function mostrarPopup(mensaje) {
        const popup = document.getElementById('popupMensaje');
        popup.innerText = mensaje;
        popup.style.display = 'block';

        setTimeout(function() {
            popup.style.display = 'none';
            cerrarModal();
        }, 2000);
    }

    window.guardarRecordatorio = function() {
        // Asumiendo que cada uno de estos IDs existe en tu formulario
        const usuario = document.getElementById('usuarioSelect').value;
        const recordatorio = document.getElementById('recordatorioInput').value;
        const horaInicio = document.getElementById('horaInicioInput').value;
        const horaFin = document.getElementById('horaFinInput').value;
        const alerta = document.getElementById('alertaSelect').value;
        const fecha = document.getElementById('fechaActual').value;

        const recordatorioObj = {
            usuario,
            fecha,
            recordatorio,
            horaInicio,
            horaFin,
            alerta
        };

        // Aquí se simula el almacenamiento, en un caso real podrías querer guardar en localStorage o enviar a un servidor
        console.log("Guardando recordatorio: ", recordatorioObj);
        localStorage.setItem(`recordatorio-${usuario}-${fecha}`, JSON.stringify(recordatorioObj));

        mostrarPopup("Recordatorio guardado correctamente");
    };


    window.guardarRecordatorio = function() {
        const usuario = document.getElementById('usuarioSelect').value;
        const recordatorio = document.getElementById('recordatorioInput').value;
        const horaInicio = document.getElementById('horaInicioInput').value;
        const horaFin = document.getElementById('horaFinInput').value;
        const alerta = document.getElementById('alertaSelect').value;
        const fecha = document.getElementById('fechaActual').value;

        const recordatorioObj = {
            usuario,
            fecha,
            recordatorio,
            horaInicio,
            horaFin,
            alerta
        };

        localStorage.setItem(`recordatorio-${usuario}-${fecha}`, JSON.stringify(recordatorioObj));
        mostrarPopup("Recordatorio guardado correctamente");
    };

    function abrirModal(fecha) {
        document.getElementById('modalRecordatorio').style.display = 'flex';
        document.getElementById('fechaActual').value = fecha;
    }

    function generarCalendario(fecha) {
        calendarioEl.innerHTML = ''; 

        const primerDiaMes = new Date(fecha.getFullYear(), fecha.getMonth(), 1);
        const ultimoDiaMes = new Date(fecha.getFullYear(), fecha.getMonth() + 1, 0);

        const headerEl = document.createElement('div');
        headerEl.className = 'header';

        const prevEl = document.createElement('div');
        prevEl.innerText = '<';
        prevEl.onclick = () => {
            fechaActual = new Date(fecha.getFullYear(), fecha.getMonth() - 1);
            generarCalendario(fechaActual);
        };

        const nextEl = document.createElement('div');
        nextEl.innerText = '>';
        nextEl.onclick = () => {
            fechaActual = new Date(fecha.getFullYear(), fecha.getMonth() + 1);
            generarCalendario(fechaActual);
        };

        const titleEl = document.createElement('div');
        titleEl.innerText = fecha.toLocaleDateString('es', { month: 'long', year: 'numeric' });

        headerEl.appendChild(prevEl);
        headerEl.appendChild(titleEl);
        headerEl.appendChild(nextEl);
        calendarioEl.appendChild(headerEl);

        const daysEl = document.createElement('div');
        daysEl.className = 'days';
        ['D', 'L', 'M', 'X', 'J', 'V', 'S'].forEach(dayName => {
            const dayEl = document.createElement('div');
            dayEl.className = 'day-name';
            dayEl.innerText = dayName;
            daysEl.appendChild(dayEl);
        });

        let fillStartDays = primerDiaMes.getDay();
        fillStartDays = fillStartDays === 0 ? 6 : fillStartDays - 1; // Ajuste para que el calendario comience en Lunes
        for (let i = 0; i < fillStartDays; i++) {
            const emptyEl = document.createElement('div');
            emptyEl.className = 'day empty';
            daysEl.appendChild(emptyEl);
        }

        for (let day = 1; day <= ultimoDiaMes.getDate(); day++) {
            const dayEl = document.createElement('div');
            dayEl.className = 'day';
            dayEl.innerText = day;
            if (fecha.getFullYear() === fechaActual.getFullYear() && fecha.getMonth() === fechaActual.getMonth() && day === fechaActual.getDate()) {
                dayEl.classList.add('today');
            }
            dayEl.onclick = () => abrirModal(`${fecha.getFullYear()}-${fecha.getMonth()+1}-${day}`);
            daysEl.appendChild(dayEl);
        }

        calendarioEl.appendChild(daysEl);
    }

    // Event listeners para botones, asegúrate de tener estos IDs en tus botones
    document.getElementById('btnGuardar')?.addEventListener('click', guardarRecordatorio);
    document.getElementById('btnCancelar')?.addEventListener('click', cerrarModal);

    generarCalendario(fechaActual);
});
