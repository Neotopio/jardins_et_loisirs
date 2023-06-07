<?php

require_once('../model/adCarousel.php');
require_once('../model/dbUpdateCarousel.php');
if ((isset($_POST['enable']) && !empty($_POST['enable']))
  

) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        $picture = adPhoto();
        dbUpdateCarousels($picture);
        unlink($_POST['chemin']);
        header('location:../public/index.php?page=carousel');
    } else {
        $picture = $_POST['chemin'];
        dbUpdateCarousels($picture);
        header('location:../public/index.php?page=carousel');
    }
} else {
    header('location:../public/index.php?page=updateCarousel&id=' . $_POST['id']);
}
