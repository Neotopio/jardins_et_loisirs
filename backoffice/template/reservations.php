<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des réservations</h1>
            <table class="table">
                <thead>

                    <th>Type de vélos</th>
                    <th>Noms</th>
                    <th>Prénoms</th>
                    <th>Email</th>
                    <th>Numéros de téléphones</th>
                    <th>Quantitée</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>

                </thead>
                <tbody>
                  
                    <?php
                    foreach ($locations as $location) {
                    ?>
                        <tr>
                            <td><?= $location['bike_type'] ?></td>
                            <td><?= $location['customer_name'] ?></td>
                            <td><?= $location['customer_lastname'] ?></td>
                            <td><?= $location['customer_email'] ?></td>
                            <td><?= $location['customer_phone'] ?></td>
                            <td><?= $location['quantity'] ?></td>
                            <td><?= date('d/m/Y', strtotime($location['start_date'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($location['end_date'])) ?></td>
                         
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>