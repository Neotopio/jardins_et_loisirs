<?php ob_start();
if (isset($_SESSION['sucess'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['sucess'] . "</div>";
    unset($_SESSION['sucess']);
} elseif (isset($_SESSION['error'])) {
    echo "<div class='alert alert-warning'>" . $_SESSION['error'] . "</div>";
    unset($_SESSION['error']);
}

?>
<script>
  $(function() {
    // Initialiser le date range picker
    $('#daterange').daterangepicker({
        minDate: new Date(),
        opens: 'center',
        drops: 'up',
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
        },
    });

    var selectedStartDate;
    var selectedEndDate;

    // Fonction pour obtenir toutes les dates comprises entre la date de début et la date de fin
    function getSelectedDates(startDate, endDate) {
        var dates = [];
        var currentDate = startDate.clone();
        while (currentDate <= endDate) {
            dates.push(currentDate.format('YYYY-MM-DD'));
            currentDate.add(1, 'day');
        }
        return dates;
    }

    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        selectedStartDate = picker.startDate;
        selectedEndDate = picker.endDate;

        // Bloquer la sélection de lundi et dimanche comme premier et dernier jour
        if (selectedStartDate.day() === 0 || selectedStartDate.day() === 1) {
            alert("Veuillez sélectionner un autre jour que lundi ou dimanche comme premier jour.");
            return false;
        }

        if (selectedEndDate.day() === 0 ) {
            alert("Veuillez sélectionner un autre jour que dimanche comme dernier jour.");
            return false;
        }
    });

    $('select[name="bike"]').on('change', function() {
        var selectedBikeCount = $(this).val();

        // Effectuer la demande Ajax pour vérifier les disponibilités
        $.ajax({
            url: 'get_availability.php',
            method: 'GET',
            data: {
                id: <?php echo $_GET['id']; ?>,
                numberOfBikes: selectedBikeCount,
            },
            success: function(response) {
                var unavailableDates = JSON.parse(response);
                unavailableDates = unavailableDates.unavailableDates;

                // Mettre à jour les options du DateRangePicker avec les nouvelles dates indisponibles
                $('#daterange').data('daterangepicker').isInvalidDate = function(date) {
                    for (var i = 0; i < unavailableDates.length; i++) {
                        var startDate = moment(unavailableDates[i].start, 'YYYY-MM-DD HH:mm:ss');
                        var endDate = moment(unavailableDates[i].end, 'YYYY-MM-DD HH:mm:ss');

                        if (date.isBetween(startDate, endDate, null, '[]')) {
                            return true;
                        }
                    }

                    return false;
                };

                // Vérifier si des dates réservées se trouvent entre le premier jour et le dernier jour sélectionnés
                if (selectedStartDate && selectedEndDate) {
                    for (var i = 0; i < unavailableDates.length; i++) {
                        var reservedStartDate = moment(unavailableDates[i].start, 'YYYY-MM-DD HH:mm:ss');
                        var reservedEndDate = moment(unavailableDates[i].end, 'YYYY-MM-DD HH:mm:ss');

                        if (
                            (reservedStartDate.isAfter(selectedStartDate, 'day') && reservedStartDate.isBefore(selectedEndDate, 'day')) ||
                            (reservedEndDate.isAfter(selectedStartDate, 'day') && reservedEndDate.isBefore(selectedEndDate, 'day')) ||
                            (reservedStartDate.isSame(selectedStartDate, 'day') && reservedEndDate.isSame(selectedEndDate, 'day'))
                        ) {
                            alert('Des dates réservées se trouvent entre le premier jour et le dernier jour sélectionnés.');
                            return false;
                        }
                    }
                }

                // Réappliquer la sélection de dates pour mettre à jour l'affichage
                $('#daterange').data('daterangepicker').setStartDate(selectedStartDate);
                $('#daterange').data('daterangepicker').setEndDate(selectedEndDate);
            },
            error: function() {
                // Gérer les erreurs de la requête AJAX
                alert("Une erreur s'est produite lors de la récupération des disponibilités.");
            }
        });
    });
});

</script>

<div class="container  mb-5">
    <h1 class="title mb-5 mt-5">Formulaire de location de vélos</h1>
    <div class="row  cadre">
        <div class="col-lg-12 p-3  ">
            <form action="../controllers/reservations.php" method="post">
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                    <input type="text" class="form-control button " placeholder="" aria-label="Last name" name="last_name" required>
                </div>
                <div>
                    <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                    <input type="text" class="form-control button" placeholder="" aria-label="First name" name="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Téléphone</label>
                    <input type="number" class="form-control button" name="tel" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Adresse Email</label>
                    <input type="email" class="form-control button" placeholder="name@example.com" name="mail" required>
                </div>
                <input type="hidden" name="id_bike" value="<?php echo $_GET['id']; ?>">
                <input type="hidden" name="date_debut">
                <input type="hidden" name="date_fin">
                <div>
                    <label for="bike_count">Nombres de vélo :</label>
                    <select id="bike_count" name="bike">
                        <option value="0">0</option>
                        <?php foreach ($bikes as $bike) { ?>
                            <?php
                            $bikeQuantity = $bike['bike_quantity'];
                            for ($i = 1; $i <= $bikeQuantity; $i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                    </select>
                </div>
            <?php } ?>
            </select>
            <div>
                <label>Date de début et de fin</label>
                <input type="text" id="daterange" name="date_debut_fin" value="" class="form-control button">
            </div>
            <div>
                <button class="btn btn-outline-dark button" type="submit">Envoyer</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>