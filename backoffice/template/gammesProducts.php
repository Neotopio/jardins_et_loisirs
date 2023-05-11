<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des gammes de produits</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>
                    <th>descriptions</th>
                    <th>Photos</th>
                    <th>Active</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="index.php?page=adGammeProducts"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($gammeProducts as $gammeProduct) {
                    ?>
                        <tr>
                            <td><?= $gammeProduct['name'] ?></td>
                            <td><?= wordwrap($gammeProduct['description'], 50, "<br>", true) ?></td>
                            <td><img src="<?= $gammeProduct['picture'] ?>" alt="" style="max-width: 400px; max-height: 200px;"></td>
                            <td><?php if ($gammeProduct['is_enable'] == 1) {
                                    echo 'oui';
                                } else {
                                    echo 'non';
                                }
                                ?></td>

                            <td class="action">
                                <a href="index.php?page=updateGammeProducts&id=<?php echo $gammeProduct['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>

                            <td class="action">
                                <a href="index.php?page=subCategory&id=<?php echo $gammeProduct['id'] ?>"> <button class="btn btn-primary" type="submit"> Voir sous-catégories</button></a>
                            </td>
                            <td class="action">
                                <form action="../model/deleteGammesProducts.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $gammeProduct['id']; ?>"> 
                                    <input type="hidden" name='chemin' value="<?php echo $gammeProduct['picture']; ?>"> 
                                    <button class="btn btn-danger" type="submit" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</button> </form>
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