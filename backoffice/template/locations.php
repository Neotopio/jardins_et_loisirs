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
                    <div class="ajouter">
                        <a href="index.php?page=adLocation"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
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
                            <td><?= $location['date_start'] ?></td>
                            <td><?= $location['date_end'] ?></td>

                            <td class="action">
                                      
                                       <form action="../model/validateLocations.php" method="POST">
                                        <input type="hidden" value="<? $location['id_validate']?>">
                                       <button class="btn btn-primary" type="submit"> Valider</button> </form>
                            
                                     </td>
                            <td class="action">
                                <form action="../model/deleteNews.php" method="POST">
                                
                                     <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Refusé</button> </form>
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