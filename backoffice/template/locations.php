<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Demande de locations a validées</h1>
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
                    

                    <div >
                        <a href="index.php?page=reservations"> <button class="btn btn-secondary" type="submit"> Voir toute les reservations</button></a>
                    </div>
                    <?php
                    foreach ($locations as $location) {
                    ?>
                        <tr>
                            <td><?= $location['bike_type'] ?></td>
                            <td><?= $location['customer_name'] ?></td>
                            <td><?= $location['customer_last_name'] ?></td>
                            <td><?= $location['customer_email'] ?></td>
                            <td><?= $location['customer_phone'] ?></td>
                            <td><?= $location['quantity'] ?></td>
                            <td><?= date('d/m/Y', strtotime($location['date_start'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($location['date_end'])) ?></td>
                            <td class="action">

                                <form action="../controllers/validateLocations.php" method="POST">
                                    <input type="hidden" value="<?= $location['id_validate'] ?> " name="id_validate">
                                    <button class="btn btn-primary" type="submit"> Valider</button>
                                </form>

                            </td>
                            <td class="action">
                            <a href="index.php?page=deleteLocations&id=<?= $location['id_validate']?>"> <button class="btn btn-danger" type="submit"> Refuser</button></a>
                            </td>
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