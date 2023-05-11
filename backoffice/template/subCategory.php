<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des sous-categories</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>
                    <th>Active</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="index.php?page=adSubCategory&id=<?php echo $_GET['id'];?>"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($subCategorys as $subCategory) {
                    ?>
                        <tr>
                            <td><?= $subCategory['name'] ?></td>
                            <td><?php if ($subCategory['is_enable'] == 1) {
                                    echo 'oui';
                                } else {
                                    echo 'non';
                                }
                                ?></td>

                            <td class="action">
                                <a href="index.php?page=updateSubCategory&id=<?php echo $subCategory['id'] ?>&id_gamme=<?php echo $_GET['id'];?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>
                            <td class="action">
                                <form action="../model/deleteSubCategory.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $subCategory['id']; ?>"> 
                                    <input type="hidden" name='id_gamme' value="<?php echo $_GET['id']; ?>"> 
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