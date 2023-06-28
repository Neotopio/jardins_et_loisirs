<?php
ob_start();

?>
<div class="container">
    <div class="row">
        <section class="col-12">
            Merci d'indiqué le motif du refus
            <form action="../controllers/deleteReservations.php" method="post">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" ></textarea>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
       
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </section> </form>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>