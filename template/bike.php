<?php ob_start(); ?>
<div class="container mt-5 ">
    <h1>Nos modéle</h1>
    <?php foreach ($bikes as $bike) { ?>
        <h2 class="mt-3"><?php echo $bike['bike_type']; ?></h2>
        <div class="row">

            <div class="col ">
                <div>
                    <img src="../backoffice/<?php echo $bike['bike_image']; ?>" class="img-fluid  float-start">
                    <p class=" text-start"><?php echo $bike['bike_description']; ?></p>
                    <p class=" text-start"><?php echo $bike['bike_price']; ?>€/jour</p>
                </div>
                <div class="ajouter">
                        <a href="index.php?action=location&id=<?php echo $bike['id']?>"> <button class="btn btn-primary" type="submit"> Location</button></a>
                    </div>
            </div>
        <?php } ?>
        </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>