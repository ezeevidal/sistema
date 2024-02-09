document.addEventListener('DOMContentLoaded', function() {
    function agregarRecordatorios() {
        const listaRecordatorios = document.getElementById('listaRecordatorios');
        listaRecordatorios.innerHTML = ''; // Limpiar lista existente

        const recordatorios = [
            "Pagar el alquiler el día 10/3",
            "Cita con el dentista",
            "Reunión de trabajo a las 3 PM",
            "Pagar luz",
            "Pagar agua",
            "Pagar gas",
            // Agrega más recordatorios aquí
        ];

        recordatorios.forEach((recordatorio, index) => {
            const item = document.createElement('li');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.id = `checkbox-${index}`;
            checkbox.className = 'checkbox-custom';

            const label = document.createElement('label');
            label.htmlFor = `checkbox-${index}`;
            label.textContent = recordatorio;
            label.className = 'checkbox-custom-label';

            // Importante: primero añadir el checkbox y luego el label
            item.appendChild(checkbox);
            item.appendChild(label);
            listaRecordatorios.appendChild(item);
        });
    }

    agregarRecordatorios();

    // Código para manejar popup de agregar recordatorios
    document.getElementById('abrirPopup').addEventListener('click', function() {
        document.getElementById('popupAgregarRecordatorio').style.display = 'block';
    });

    document.querySelector('#popupAgregarRecordatorio .close').addEventListener('click', function() {
        document.getElementById('popupAgregarRecordatorio').style.display = 'none';
    });

    // Código para agregar un nuevo recordatorio desde el popup (asumiendo que tienes un input y botón configurados correctamente)
    document.getElementById('agregarRecordatorio').addEventListener('click', function() {
        const nuevoRecordatorio = document.getElementById('nuevoRecordatorio').value;
        // Asume que existe un input para la fecha del recordatorio en tu HTML
        const fechaRecordatorio = document.getElementById('fechaRecordatorio').value;
        if (nuevoRecordatorio && fechaRecordatorio) {
            // Agrega el nuevo recordatorio a la lista y limpia los inputs
            const recordatorios = [`${nuevoRecordatorio} - ${fechaRecordatorio}`];
            agregarRecordatorios(recordatorios); // Actualiza la lista de recordatorios con la nueva entrada
            document.getElementById('nuevoRecordatorio').value = '';
            document.getElementById('fechaRecordatorio').value = '';
            document.getElementById('popupAgregarRecordatorio').style.display = 'none';
        } else {
            alert('Por favor, completa todos los campos.');
        }
    });

    // Código para manejar la imagen desplegable y la lista asociada
    var imagen = document.getElementById('imagenDesplegable');
    var lista = document.getElementById('listaDesplegable');
    imagen.addEventListener('click', function() {
        if (lista.classList.contains('lista-oculta')) {
            lista.classList.remove('lista-oculta');
            lista.classList.add('lista-visible');
        } else {
            lista.classList.remove('lista-visible');
            lista.classList.add('lista-oculta');
        }
    });
});
