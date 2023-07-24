<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des vélos</h1>
            <table class="table">
                <thead>
                    <th>Type</th>
                    <th>descriptions</th>
                    <th>Prix</th>
                    <th>Quantitées</th>
                    <th>Photos</th>
                    <th>Active</th>
                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="index.php?page=adBike"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($bikes as $bike) {
                    ?>
                        <tr>
                            <td><?= $bike['bike_type'] ?></td>
                            <td><?= wordwrap($bike['bike_description'], 70, "<br>", true) ?></td>
                            <td><?= $bike['bike_price'] ?></td>
                            <td><?= $bike['bike_quantity'] ?></td>
                            <td><img src="../<?= $bike['bike_image'] ?>" alt="" style="max-width: 400px; max-height: 200px;"></td>
                            <td><?php if ($bike['is_enable'] == 1) {
                                    echo 'oui';
                                } else {
                                    echo 'non';
                                }
                                ?></td>
                            <td class="action">
                                <a href="index.php?page=updateBike&id=<?php echo $bike['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>

                            <td class="action">
                                <form action="../model/deleteBike.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $bike['id']; ?>">

                                    <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button>
                                </form>
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