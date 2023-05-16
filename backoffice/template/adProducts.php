<?php ob_start(); ?>

<div class="container ">
    <div class="row">
        <section class="col-12">
            <h1>Saisie du produit</h1>
            <form action="../controllers/saveProducts.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-floating">

                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name='description'></textarea>
                    <label for="floatingTextarea2">Déscription</label>
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Caracteristique 1</label>
                    <input type="text" class="form-control" name="characteristic_1">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Caracteristique 2</label>
                    <input type="text" class="form-control" name="characteristic_2">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Caracteristique 3</label>
                    <input type="text" class="form-control" name="characteristic_3">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Réference</label>
                    <input type="text" class="form-control" name="ref">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Prix</label>
                    <input type="text" class="form-control" name="price">
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
                    <label for="definition" class="form-label">Choisir la sous-catégorie</label>
                    <select class="form-select" aria-label="Default select example" id="sc" name="subcategory">

                    </select>
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

                <div class="mb-3 col-3">
                    <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    window.addEventListener('load', () => {
        const cat = document.getElementById('cat');
        const sc = document.getElementById('sc');
        sc.disabled = true;
        cat.addEventListener('change', () => {
            sc.disabled = false;
            $.get('../model/vueProducts.php', {
                identCat: cat.value
            }).done((data) => {
                sc.innerHTML = '';
                JSON.parse(data).forEach((e) => {
                    let subcat = document.createElement('OPTION');
                    subcat.value = e.id;
                    let txt = document.createTextNode(e.name);
                    subcat.appendChild(txt);
                    sc.appendChild(subcat);
                });
                if (cat.value == 'Sélectionnez la catégorie') {
                    sc.disabled = true;
                    let opt = document.createElement('OPTION');
                    opt.innerHTML = 'Sélectionnez la sous-catégorie';
                    sc.appendChild(opt);
                } else {
                    sc.disabled = false;
                }

            });
        });
    });
</script>