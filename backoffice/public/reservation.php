<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.6/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
     <script>
    // Connexion à la base de données
    var events = [];
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            for (var i = 0; i < myObj.length; i++) {
                events.push({
                    title: 'Vélo ' + myObj[i].bike_id,
                    start: myObj[i].start_date,
                    end: myObj[i].end_date,
                    backgroundColor: myObj[i].available ? '#68B3C8' : '#666666',
                    borderColor: '#000000',
                    textColor: '#ffffff'
                });
            }
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: new Date(),
                navLinks: true,
                editable: false,
                eventLimit: true,
                events: events
            });
        }
    };
    xmlhttp.open("GET", "get_calendar_data.php", true);
    xmlhttp.send();
    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>