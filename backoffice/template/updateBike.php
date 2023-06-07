<?php ob_start(); ?>

<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>Mise a jour du vélo</h1>
            <form action="../controllers/dbUpdateBike.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <?php foreach ($bikes as $bike) {
                ?>
                <input type="hidden" name="id" value="<?=$bike['id']?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" value="<?= $bike['bike_type'] ?>">
                    </div>
                    <div class="form-floating">

                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='description'><?= $bike['bike_description'] ?></textarea>
                        <label for="floatingTextarea2">Déscription</label>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="price" value="<?= $bike['bike_price'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Quantitées</label>
                        <input type="number" class="form-control" name="quantity" value="<?= $bike['bike_quantity'] ?>">
                    </div>
                
                   
                    <div class="mb-3 mt-5"><img src="../<?= $bike['bike_image'] ?>" alt=""class="img-fluid"></div>
                    <input type="hidden" value="<?= $bike['bike_image'] ?>" name="chemin" >
                  
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Choix de la photos</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="pictures">
                    </div>

                    <div class="mb-3">
                        <label for="enable" class="form-label">Active</label>
                        <select name="enable" id="" class="form-select">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>

                    </div>
                <?php
                }
                ?>
                <div class="mb-3 col-3">
                    <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>