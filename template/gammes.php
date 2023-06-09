<?php ob_start(); ?>
<div class="container ">
    <?php foreach ($gammes as $gamme) { ?>
        <h1 class="title"><?php echo $gamme['name']; ?></h1>
        <div class="row">

            <div class="col">
                <div>
                    <img src="../backoffice/<?php echo $gamme['picture']; ?>" class="img-fluid  float-start">
                    <p class=" text-start"><?php echo $gamme['description']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>