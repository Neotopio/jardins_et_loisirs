<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des services</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>
                    <th>descriptions</th>
                    <th>Photos</th>
                    <th>Active</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="index.php?page=adServices"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($services as $service) {
                    ?>
                        <tr>
                            <td><?= $service['name'] ?></td>
                            <td><?= wordwrap($service['description'], 50, "<br>", true) ?></td>
                            <td><img src="<?= $service['picture'] ?>" alt="" style="max-width: 400px; max-height: 200px;"></td>
                            <td><?php if ($service['is_enable'] == 1) {
                                    echo 'oui';
                                } else {
                                    echo 'non';
                                }
                                ?></td>

                            <td class="action">
                                <a href="index.php?page=updateServices&id=<?php echo $service['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>

                            <td class="action">
                                <form action="../model/deleteServices.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $service['id']; ?>">
                                    <input type="hidden" name='chemin' value="../<?php echo $service['picture']; ?>">
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