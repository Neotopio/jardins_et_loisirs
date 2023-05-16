<?php
require_once('../model/nav.php');
$gammes = gammeProduct();
$services = service();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="../asset/css/contact.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>
    <header class="text-center">
        <div class="container">
            <a href="../public/index.php?action=acceuil">
                <img src="../backoffice/picture/188-JARDINS-ET-LOISIRSLOGOCMJN.jpg" class="img-fluid" alt="logo">
            </a>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Acceuil</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nos gammes produits
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($gammes as $gamme) { ?>
                                <li><a class="dropdown-item" href="#"><?php echo $gamme['name']; ?> </a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nos services
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($services as $service) { ?>
                                <li><a class="dropdown-item" href="#"><?php echo $service['name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="index.php?action=contact">Contactez-nous</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main>

        <?= $content ?>

    </main>

    <footer>
        <container class="fluid">
            <div class="row">
                <div class="col text-center">
                    <a href="https://www.facebook.com/Jardins.et.Loisirs.Volmunster57/"><img src="../backoffice/picture/f_logo_RGB-Blue_1024.png" alt="logo facebook" width="48" height="48"> </a>

                    <a href="https://www.instagram.com/jardinsetloisirs_57/"><img src="../backoffice/picture/instagram-ig-circle-logo.png" alt="logo instagram" width="48" height="48"> </a>

                    <a href="https://www.linkedin.com/company/jardins-et-loisirs57/"><img src="../backoffice/picture/pngimg.com - linkedIn_PNG38.png" alt="logo linkedin" width="48" height="48"> </a>
                </div>
            </div>
        </container>
    </footer>







</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</html>