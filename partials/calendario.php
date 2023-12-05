<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Calendario con FullCalendar</title>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
  <link rel="stylesheet" href="../css/calendario.css">
</head>
<body>
<?php
    require_once "../partials/menu.php";
?>

  <div id='calendar'></div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid' ],
        defaultView: 'dayGridMonth',
        events: [
          {
            title: 'Evento 1',
            start: '2023-12-01'
          },
          {
            title: 'Evento 2',
            start: '2023-12-05',
            end: '2023-12-07'
          },
          {
            title: 'Evento 3',
            start: '2023-12-09T12:30:00'
          }
          // Puedes añadir más eventos aquí según sea necesario
        ]
      });

      calendar.render();
    });
  </script>
</body>
</html>



