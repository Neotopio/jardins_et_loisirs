<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Modification de l'actualitée</h1>
            <form action="../controllers/dbUpdateNews.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <?php foreach ($news as $new)  {
                ?>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" value="<?= $new['name'] ?>">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='description'><?= $new['description'] ?></textarea>
                        <label for="floatingTextarea2">Déscription</label>
                    </div>
                    <div class="mb-3 mt-5"><img src="<?= $new['picture'] ?>" alt=""class="img-fluid"></div>
                    <input type="hidden" value="<?= $new['picture'] ?>" name="chemin" >
                    <input type="hidden" value="<?=$_GET['id']?>"name='id'>
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