// Ejemplo de función para agregar recordatorios
function agregarRecordatorios() {
    const listaRecordatorios = document.getElementById('listaRecordatorios');

    // Limpiar lista existente
    listaRecordatorios.innerHTML = '';

    // Ejemplo de recordatorios
    const recordatorios = [
        "Pagar el alquiler el dia 10/3",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM",
        "Pagar el alquiler",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM",
        "Pagar el alquiler",
        "Cita con el dentista",
        "Reunión de trabajo a las 3 PM"
    ];
    function generarLista() {
        const lista = document.getElementById('lista-recordatorios');
        recordatorios.forEach((recordatorio, indice) => {
            const idCheckbox = `checkbox-${indice}`; // Generar un ID único para cada checkbox
            const elemento = document.createElement('div'); // Crear un div para cada recordatorio
            elemento.innerHTML = `
                <input type="checkbox" name="recordatorio-${indice}" id="${idCheckbox}">
                <label for="${idCheckbox}">${recordatorio}</label>
            `;
            lista.appendChild(elemento); // Agregar el div al contenedor de la lista
        });
    }

    // Ejecutar la función al cargar la página
    window.onload = function() {
        generarLista();
    };
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






//POPUP RECORDATORIOS

// Asegurándose de que el DOM esté completamente cargado antes de asignar eventos
document.addEventListener('DOMContentLoaded', function () {
    // Abre el popup
    document.getElementById('abrirPopup').addEventListener('click', function() {
        document.getElementById('popupAgregarRecordatorio').style.display = 'block';
    });

    // Cierra el popup
    document.querySelector('#popupAgregarRecordatorio .close').addEventListener('click', function() {
        document.getElementById('popupAgregarRecordatorio').style.display = 'none';
    });

    // Agregar recordatorio
    document.getElementById('agregarRecordatorio').addEventListener('click', function() {
        const nuevoRecordatorio = document.getElementById('nuevoRecordatorio').value;
        const fechaRecordatorio = document.getElementById('fechaRecordatorio').value;
        if (nuevoRecordatorio && fechaRecordatorio) {
            recordatorios.push(`${nuevoRecordatorio} - ${fechaRecordatorio}`);
            document.getElementById('nuevoRecordatorio').value = '';
            document.getElementById('fechaRecordatorio').value = '';
            document.getElementById('popupAgregarRecordatorio').style.display = 'none';
            generarLista(); // Regenera la lista para incluir el nuevo recordatorio
        } else {
            alert('Por favor, completa todos los campos');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Referencia a la imagen y a la lista desplegable
    var imagen = document.getElementById('imagenDesplegable');
    var lista = document.getElementById('listaDesplegable');

    // Manejar el clic en la imagen
    imagen.addEventListener('click', function() {
        // Alternar la visibilidad de la lista desplegable
        if (lista.classList.contains('lista-oculta')) {
            lista.classList.remove('lista-oculta');
            lista.classList.add('lista-visible');
        } else {
            lista.classList.remove('lista-visible');
            lista.classList.add('lista-oculta');
        }
    });
});
