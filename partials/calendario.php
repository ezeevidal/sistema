<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='utf-8' />
  <link rel="stylesheet" href="../css/calendario.css">
</head>
<body>

 <!-- Botón para mostrar el modal -->
 <div class="boton1">
    <div class="boton-agregar-evento">
      <button onclick="openModal()">Calendario</button>
    </div>
  </div>
  
  <!-- Modal -->
  <div id="calendarModal" class="modal">
    <div class="modal-content">
      <div id='calendar'></div>
      <span onclick="closeModal()">&times;</span>
      <div class="boton-agregar-evento">
        <button onclick="openEventModal()">+</button>
      </div>
    </div>
  </div>

  <!-- Modal para agregar un evento -->
  <div id="eventModal" class="modal-agregar-evento">
    <div class="modal-content">
      <h2>Agregar</h2>
      <span onclick="closeEventModal()">&times;</span>
      <form id="eventForm">
        <label for="eventName">Nombre del Evento:</label><br>
        <input type="text" id="eventName" name="eventName"><br><br>

        <label for="eventDate">Fecha:</label><br>
        <input type="date" id="eventDate" name="eventDate"><br><br>

        <label for="eventTime">Hora:</label><br>
        <input type="time" id="eventTime" name="eventTime"><br><br>

        <label for="reminder1">Recordatorio 1:</label><br>
          <select id="reminder1" name="reminder1">
            <option value="1h">1 hora antes</option>
            <option value="2h">2 horas antes</option>
            <option value="6h">6 horas antes</option>
            <option value="1d">1 día antes</option>
            <option value="1w">1 semana antes</option>
            <!-- Puedes agregar más opciones según sea necesario -->
          </select><br><br>

          <label for="reminder2">Recordatorio 2:</label><br>
          <select id="reminder2" name="reminder2">
            <option value="1h">1 hora antes</option>
            <option value="2h">2 horas antes</option>
            <option value="6h">6 horas antes</option>
            <option value="1d">1 día antes</option>
            <option value="1w">1 semana antes</option>
            <!-- Puedes agregar más opciones según sea necesario -->
            </select><br><br>
        <button type="submit">Guardar</button>
      </form>
    </div>
  </div>

  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@6.1.10/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/list@6.1.10/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.10/index.global.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@6.1.10/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment-timezone@6.1.10/main.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment@6.1.10/locales/es.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/moment-timezone@6.1.10/locales/es.js'></script>
  
  <script>
    let selectedDate = null;

    // Función para abrir el modal principal
    function openModal() {
      var modal = document.getElementById('calendarModal');
      modal.style.display = 'block';
      renderCalendar();
    }

    // Función para cerrar el modal principal
    function closeModal() {
      var modal = document.getElementById('calendarModal');
      modal.style.display = 'none';
    }

    // Función para abrir el modal de agregar evento
    function openEventModal() {
      var modal = document.getElementById('eventModal');
      modal.style.display = 'block';
    }

    // Función para cerrar el modal de agregar evento
    function closeEventModal() {
      var modal = document.getElementById('eventModal');
      modal.style.display = 'none';
    }

// Renderizar el calendario dentro del modal
function renderCalendar() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'es',
    buttonText: {
      today: 'Hoy' 
    },
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    views: {
      dayGridMonth: {
        buttonText: 'Mes'
      },
      timeGridWeek: {
        buttonText: 'Semana',
        allDaySlot: false 
      },
      timeGridDay: {
        buttonText: 'Día',
        allDaySlot: false 
      },
      listWeek: {
        buttonText: 'Eventos',
        noEventsContent: 'No hay eventos para mostrar.' 
    },
    selectable: true,
    dateClick: function(info) {
      selectedDate = info.dateStr;
      openEventModal();
    }
  }});
  calendar.render();
}





     // Agregar evento a la base de datos
     document.getElementById('eventForm').addEventListener('submit', function(e) {
      e.preventDefault();
      var eventName = document.getElementById('eventName').value;
      var eventDate = document.getElementById('eventDate').value;
      var eventTime = document.getElementById('eventTime').value;
      var reminder1 = document.getElementById('reminder1').value;
      var reminder2 = document.getElementById('reminder2').value;
      
      var dateTime = eventDate + ' ' + eventTime;
      console.log('Enviando solicitud a guardar_evento.php...');

      // Hacer la solicitud para guardar el evento
      fetch('./guardar_evento.php', {
        method: 'POST',
        body: JSON.stringify({ eventName: eventName, dateTime: dateTime, reminder1: reminder1, reminder2: reminder2 }),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(response => {
        console.log('Respuesta recibida:', response);
        console.log('Evento agregado a la base de datos');
        closeEventModal();
        // Aquí puedes actualizar el calendario si es necesario
      })
      .catch(error => {
        console.error('Error al agregar el evento: ', error);
      });
    });
  </script>
</body>
</html>

<?php
// Código PHP para conexión y guardar evento en la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";

// Manejo de errores en la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

// Sentencia SQL preparada para evitar la inyección de SQL
$stmt = $conn->prepare("INSERT INTO eventos (nombre_evento, fecha_evento, hora_evento, recordatorio1, recordatorio2) VALUES (?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("sssss", $data['eventName'], $data['dateTime'], $data['eventTime'], $data['reminder1'], $data['reminder2']);

    if ($stmt->execute()) {
        echo "Evento guardado exitosamente";
    } else {
        echo "Error al guardar el evento: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error en la preparación de la declaración SQL";
}

$conn->close();
?>