document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    initialDate: today,
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      selectable: true,
      allDaySlot: false,
      eventSources: [events],
    });

  calendar.render();

});