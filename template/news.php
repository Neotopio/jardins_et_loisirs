<?php ob_start(); ?>
<div class="container ">
    <?php foreach ($news as $new) { ?>
        <h1 class="title"><?php echo $new['name']; ?></h1>
        <div class="row">

            <div class="col">
                <div>
                    <img src="../backoffice/<?php echo $new['picture']; ?>" class="img-fluid vignette float-start">
                    <p class=" text-start"><?php echo $new['description']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>