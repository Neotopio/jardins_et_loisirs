<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des admins</h1>
            <table class="table">
                <thead>

                    <th>Nom</th>
                    <th>email</th>
                 

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="../template/adAdmin.php"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php

                    foreach ($admins as $admin) {
                    ?>
                        <tr>
                            <td><?= $admin['name'] ?></td>                          
                            <td><?= $admin['email'] ?></td>
                            <td class="action">
                                <a href="index.php?page=updateAdmin&id=<?php echo $admin['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>

                            <td class="action">
                                <form action="../model/deleteAdmin.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $admin['id']; ?>">

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