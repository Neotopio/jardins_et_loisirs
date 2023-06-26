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
    var bookingDates = {
        1: [{
                start: '2023-07-10',
                end: '2023-07-15'
            },
            {
                start: '2023-06-20',
                end: '2023-06-25'
            }
        ],
        2: [{
                start: '2023-06-12',
                end: '2023-06-18'
            },
            {
                start: '2023-06-25',
                end: '2023-06-30'
            }
        ],
    };
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
            isInvalidDate: function(date) {
                var bikeId = 1;
                var selectedDates = bookingDates[bikeId];
                if (!selectedDates) {
                    return false;
                }
                for (var i = 0; i < selectedDates.length; i++) {
                    var startDate = moment(selectedDates[i].start);
                    var endDate = moment(selectedDates[i].end);
                    if (date.isSameOrAfter(startDate) && date.isSameOrBefore(endDate)) {
                        return true; // Date déjà prise, invalide
                    }
                }
                return false;
            },
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate;
            var endDate = picker.endDate;
            // Bloquer la sélection de lundi et dimanche comme premier et dernier jour
            if (startDate.day() === 0 || startDate.day() === 1) {
                alert("Veuillez sélectionner un autre jour que lundi ou dimanche comme premier jour.");
                return false;
            }
            if (endDate.day() === 0 || endDate.day() === 1) {
                alert("Veuillez sélectionner un autre jour que lundi ou dimanche comme dernier jour.");
                return false;
            }
            var bikeId = 1;
            var selectedDates = bookingDates[bikeId];
            if (!selectedDates) {
                return;
            }
            // bloquer la selection si elle est couper par des date reserver
            if (selectedDates) {
                for (var i = 0; i < selectedDates.length; i++) {
                    var reservedStartDate = moment(selectedDates[i].start);
                    var reservedEndDate = moment(selectedDates[i].end);
                    if (
                        (reservedStartDate.isAfter(startDate, 'day') && reservedStartDate.isBefore(endDate, 'day')) ||
                        (reservedEndDate.isAfter(startDate, 'day') && reservedEndDate.isBefore(endDate, 'day')) ||
                        (reservedStartDate.isSame(startDate, 'day') && reservedEndDate.isSame(endDate, 'day'))
                    ) {
                        alert('Des dates réservées se trouvent entre le premier jour et le dernier jour sélectionnés.');
                        return;
                    }
                }
            }
            $('input[name="date_debut"]').val(startDate.format('YYYY-MM-DD'));
            $('input[name="date_fin"]').val(endDate.format('YYYY-MM-DD'));
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