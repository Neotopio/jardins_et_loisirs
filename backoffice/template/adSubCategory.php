<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Saisie de la sous-categorie</h1>
            <form action="../controllers/saveSubCategory.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="name">
                </div>
                
               <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" >
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