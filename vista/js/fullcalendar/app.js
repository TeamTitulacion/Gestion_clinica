//var myModal = new bootstrap.Modal(document.getElementById('myModal'));
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  //calendar.setOption('locale', 'es');
  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      //locale: "es",
      headerToolbar: {
          left: "prev next today",
          center: "title",
          right: "dayGridMonth timeGridWeek listWeek",
      },
      dateClick: function(info) {
          //alert('a day has been clicked!');
          //console.log(info);
          $('#myModal').modal('show');

      }
  });
  calendar.render();
});