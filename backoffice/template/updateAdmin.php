<?php ob_start(); ?>

<div class="container">
    <div class="row">
        <section class="col-12">
            <h1>Modification de l'admin</h1>
            <form action="../controllers/dbUpdateAdmin.php" method="POST" class="row my-5" enctype="multipart/form-data">
                <?php foreach ($admins as $admin) {
                ?>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="name" value="<?= $admin['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $admin['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Confirmer le mots de passe</label>
                        <input type="password" class="form-control" name="password2">
                    </div>
                    <input type="hidden" value="<?=$admin['id']?>" name="id">
    
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