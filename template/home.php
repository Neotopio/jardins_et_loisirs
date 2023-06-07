<?php ob_start(); ?>
<div class="container">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mt-5 mb-5">
        <div class="carousel-item active">
                            <img src="../backoffice/<?= $photos[0]['chemin'] ?>" class="d-block w-100 img-fluid" alt="...">
                        </div>
                        <?php foreach ($photos as $index => $photo) {
                            if ($index == 0) continue;
                        ?>
                            <div class="carousel-item">
                                <img src="../backoffice/<?= $photo['chemin'] ?>" class="d-block w-100 img-fluid" alt="...">
                            </div>
                        <?php } ?>
                    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1>Nous vous accueillons dans nos magasins de Volmunster et Rohrbach-les-bitche</h1>

    <div class="row mt-5 border p-2">
        <div class="col-lg-6 col-xd-12  p-5 d-flex align-items-center">Nos coordonnées<br><br>
            Jardins et Loisirs<br>
            42 rue de Sarreguemines<br>
            57720 Volmunster<br><br>

            Tél. : 03 87 96 71 92<br><br>

            Nos horaires<br><br>

            Du mardi au vendredi : 8h30 – 12h00 et 14h00 – 18h00<br>
            Samedi : 8h30 – 14h00<br>
            Dimanche : fermé<br>
        </div>


        <div class="col-lg-6 col-xd-12 p-3">
            <div class="ratio ratio-1x1"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.1808169737387!2d7.352148499999999!3d49.121201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47942df22be3c50b%3A0x787c812b8597e015!2sJardins%20%26%20Loisirs!5e0!3m2!1sfr!2sfr!4v1684329717499!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
    </div>
    <div class="row mt-5 mb-5 border p-2">
        <div class="col-lg-6 col-xd-12 p-3">
            <div class="ratio ratio-1x1"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2615.225066080613!2d7.265711315680937!3d49.04434407930611!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47942e6e3a23085b%3A0x8d83cb8cb93a3761!2s9%20Rue%20Pasteur%2C%2057410%20Rohrbach-l%C3%A8s-Bitche!5e0!3m2!1sfr!2sfr!4v1684330176187!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
        <div class="col-lg-6 col-xd-12  p-5 d-flex align-items-center ">Nos coordonnées<br><br>
            Jardins et Loisirs<br>
            9 rue Pasteur<br>
            57410 Rohrbach-lès-Bitche<br><br>

            Tél. : 03 72 29 97 62<br><br>

            Nos horaires<br><br>

            Mardi : 8h30 – 12h00 et 14h00 – 18h00<br>
            Mercredi : 8h30 - 12h <br>
            Jeudi et vendredi : 8h30 – 12h00 et 14h00 – 18h00<br>
            Samedi : 8h30 – 12h00<br>
            Dimanche : fermé<br></div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>