<?php ob_start(); ?>
<div class="container ">
    <?php foreach ($services as $service) { ?>
        <h1 class="title"><?php echo $service['name']; ?></h1>
        <div class="row">

            <div class="col">
                <div>
                    <img src="../backoffice/<?php echo $service['picture']; ?>" class="img-fluid vignette float-start">
                    <p class=" text-start"><?php echo $service['description']; ?></p>
                </div>
            </div>
        <?php } ?>
        </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>