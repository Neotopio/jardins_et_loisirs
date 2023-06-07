<?php ob_start(); ?>

<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>Mise a jour du produit</h1>
            <form action="../controllers/dbUpdateProducts.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <?php foreach ($products as $product) {
                ?>
                <input type="hidden" name="id" value="<?=$product['id_product']?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" value="<?= $product['name'] ?>">
                    </div>
                    <div class="form-floating">

                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='description'><?= $product['description'] ?></textarea>
                        <label for="floatingTextarea2">Déscription</label>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Réference</label>
                        <input type="text" class="form-control" name="ref" value="<?= $product['reference'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Prix</label>
                        <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>">
                    </div>
                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example" id="cat" name="gamme">
                            <option value="Sélectionnez la catégorie">Sélectionnez la catégorie</option>
                            <?php
                            foreach ($gammes as $gamme) {
                            ?>
                                <option value="<?= $gamme['id'] ?>"><?= $gamme['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">

                           <label> Modification photos</label>
                                      
                                            <div class="row">
                                                <?php
                                                foreach ($photos as $photo) {
                                                ?>
                                                    <div class="col-4">
                                                        <div class="card ">
                                                            <img src="../<?= $photo['path'] ?>" class="img-fluid">
                                                            <div class="card-body">

                                                                <a href="../controllers/deletePictures.php?id=<?php echo $photo['id']; ?>" onclick="return(confirm('Voulez-vous supprimer cette entrée ?'));"> Supprimer</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Choix des photos</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="pictures[]" multiple>
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