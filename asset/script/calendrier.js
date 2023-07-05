
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

        var bikeId = <?php echo $_GET['id']; ?>;
        var selectedBikeCount = $('select[name="bike"]').val();
    });

    $('select[name="bike"]').on('change', function() {
        var selectedBikeCount = $(this).val();
        var startDate = $('#daterange').data('daterangepicker').startDate;
        var endDate = $('#daterange').data('daterangepicker').endDate;

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
                console.log(unavailableDates);

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
                $('input[name="date_debut"]').val(startDate.format('YYYY-MM-DD'));
                $('input[name="date_fin"]').val(endDate.format('YYYY-MM-DD'));

                // Réappliquer la sélection de dates pour mettre à jour l'affichage
                $('#daterange').data('daterangepicker').setStartDate(startDate);
                $('#daterange').data('daterangepicker').setEndDate(endDate);
            },
            error: function() {
                // Gérer les erreurs de la requête AJAX
                alert("Une erreur s'est produite lors de la récupération des disponibilités.");
            }
        });
    });


});