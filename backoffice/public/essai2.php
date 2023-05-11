<?php
// Connexion à la base de données
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'jardins_et_loisirs';
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Requête pour récupérer les réservations de vélos
$reservations_query = "SELECT * FROM reservations";
$reservations_result = mysqli_query($conn, $reservations_query);
$reservations = array();
while ($row = mysqli_fetch_assoc($reservations_result)) {
  $reservations[] = $row;
}

// Requête pour récupérer les informations sur les vélos
$bikes_query = "SELECT * FROM bikes";
$bikes_result = mysqli_query($conn, $bikes_query);
$bikes = array();
while ($row = mysqli_fetch_assoc($bikes_result)) {
  $bikes[] = $row;
}

// Génération des événements pour le calendrier
$events = array();
foreach ($reservations as $reservation) {
  $bike = array_filter($bikes, function ($b) use ($reservation) {
    return $b['id'] == $reservation['bike_id'];
  })[0];
  $event = array(
    'title' => $bike['bike_name'],
    'start' => $reservation['start_date'],
    'end' => $reservation['end_date'],
    'color' => '#007bff'
  );
  $events[] = $event;
}

// Génération du code HTML pour le calendrier
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
  <!-- Inclure les fichiers CSS et JS du plugin -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <!-- Inclure les fichiers CSS et JS du plugin -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


  <!-- Ajouter un champ d'entrée pour la plage de dates -->
  <input type="text" id="daterange" name="daterange" value="" />

  <script>
    $(function() {
      // Initialiser le date range picker
      $('#daterange').daterangepicker({
        minDate: new Date(),
        opens: 'left',
        locale: {
          format: 'DD/MM/YYYY',
          separator: ' - ',
          applyLabel: 'Valider',
          cancelLabel: 'Annuler',
          fromLabel: 'De',
          toLabel: 'À',
          customRangeLabel: 'Personnalisé',
          daysOfWeek: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
          monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
          firstDay: 1
        }
      });

      // Mettre à jour les champs de date cachés lorsque l'utilisateur change la plage de dates
      $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        $('input[name="date_debut"]').val(picker.startDate.format('YYYY-MM-DD'));
        $('input[name="date_fin"]').val(picker.endDate.format('YYYY-MM-DD'));
      });
    });

    // Fonction qui vérifie si la date donnée est un dimanche ou un lundi
    function isWeekend(date) {
      return date.getDay() === 0 || date.getDay() === 1;
    }

    // Fonction qui empêche la sélection du premier jour ou du dernier jour en tant que dimanche ou lundi
    function disableWeekends(date) {
      // Vérifie si la date est le premier jour ou le dernier jour
      if (date === startDate || date === endDate) {
        // Vérifie si la date est un dimanche ou un lundi
        if (isWeekend(date)) {
          return [false];
        }
      }
      // Vérifie si la date est un dimanche ou un lundi
      if (isWeekend(date)) {
        return [false];
      }
      return [true];
    }

    var startDate, endDate;

    // Utilisation de la fonction disableWeekends avec le plugin du calendrier
    $('#calendar').datepicker({
      beforeShowDay: disableWeekends,
      minDate: 0,
      maxDate: '+2m',
      onSelect: function(dateText, inst) {
        // Mettre à jour la date de début ou la date de fin selon laquelle le champ a le focus
        if (inst.id === 'startDate') {
          startDate = $(this).datepicker('getDate');
        } else {
          endDate = $(this).datepicker('getDate');
        }
      }
    });
  </script>


  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        events: <?php echo json_encode($events); ?>,
        dayRender: function(date, cell) {
          var bike_id = $('#bike').val();
          var start_date = moment(date).format('YYYY-MM-DD HH:mm:ss');
          var end_date = moment(date).add(1, 'day').format('YYYY-MM-DD HH:mm:ss');
          $.ajax({
            url: 'check_availability.php',
            type: 'post',
            data: {
              bike_id: bike_id,
              start_date: start_date,
              end_date: end_date
            },
            success: function(result) {
              if (result == 'not_available') {
                cell.addClass('fc-disabled');
                cell.off('click');
              }
            }
          });
        }
      });
      $('#bike').change(function() {
        $('#calendar').fullCalendar('rerenderEvents');
      });
    });
  </script>
</head>

<body>
  <h1>Réservation de vélos</h1>
  <div>
    <label for="bike">Sélectionnez un vélo :</label>
    <select id="bike" name="bike">
      <option value="">Tous les vélos</option>
      <?php foreach ($bikes as $bike) { ?>
        <option value="<?php echo $bike['id']; ?>"><?php echo $bike['bike_name']; ?></option>
      <?php } ?>
    </select>
  </div>
  <div id='calendar'></div> 
</body>

</html>