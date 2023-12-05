document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: [
        {
          title: 'Evento 1',
          start: '2023-12-05'
        },
        {
          title: 'Evento 2',
          start: '2023-12-08',
          end: '2023-12-10'
        },
        // Puedes agregar más eventos según sea necesario
      ]
    });
  
    calendar.render();
  });
  