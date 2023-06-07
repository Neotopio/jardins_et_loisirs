<?php ob_start(); ?>

<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>Saisie de la photo</h1>
            <form action="../controllers/saveCarousel.php" method="POST" class="row my-5" enctype="multipart/form-data">
              
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
                <div class="mb-3 col-3">
                    <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>