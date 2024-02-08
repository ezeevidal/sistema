// Ejemplo de función para agregar recordatorios
function agregarRecordatorios() {
    const listaRecordatorios = document.getElementById('listaRecordatorios');

    // Limpiar lista existente
    listaRecordatorios.innerHTML = '';

    // Ejemplo de recordatorios
    const recordatorios = [
        "Pagar el alquiler",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM",
        "Pagar el alquiler",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM",
        "Pagar el alquiler",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM"
    ];

    // Agregar recordatorios a la lista
    recordatorios.forEach(recordatorio => {
        const item = document.createElement('li');
        item.textContent = recordatorio;
        listaRecordatorios.appendChild(item);
    });
}

// Llamar a agregarRecordatorios() para inicializar los recordatorios
document.addEventListener('DOMContentLoaded', function() {
    // Asegúrate de llamar a esta función dentro de tu carga de DOM existente
    // y después de generar el calendario si es relevante
    agregarRecordatorios();
});
