<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Liste des photos du carroussel</h1>
            <table class="table">
                <thead>

                    
                    <th>Photos</th>
                    <th>Active</th>

                </thead>
                <tbody>
                    <div class="ajouter">
                        <a href="index.php?page=adCarousel"> <button class="btn btn-primary" type="submit"> Ajouter</button></a>
                    </div>
                    <?php
                    foreach ($carousels as $carousel) {
                    ?>
                        <tr>
                           
                            <td><img src="../<?= $carousel['chemin'] ?>" alt=""style="max-width: 400px; max-height: 200px;" ></td>
                            <td><?php if ($carousel['is_enable']==1){
                                echo 'oui'; }
                                else {
                                    echo 'non';
                                }
                             ?></td>

                            <td class="action">
                                <a href="index.php?page=updateCarousel&id=<?php echo $carousel['id'] ?>"> <button class="btn btn-primary" type="submit"> Modifier</button></a>
                            </td>
                          
                            <td class="action">
                                <form action="../model/deleteCarousel.php" method="POST">
                                    <input type="hidden" name='id' value="<?php echo $carousel['id']; ?>">
                                    <input type="hidden" name='chemin' value="<?php echo $carousel['chemin']; ?>"> 
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