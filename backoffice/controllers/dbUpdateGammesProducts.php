<?php
require_once('../model/dbUpdateGammesProducts.php');
require_once('../model/adGammesProducts.php');
if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        $picture = adPhoto();
        dbUpdateGammeProducts($picture);
        unlink($_POST['chemin']);
        header('location:../public/index.php?page=nosGammesProduits');
    } else {
        $picture = $_POST['chemin'];
        dbUpdateGammeProducts($picture);
        header('location:../public/index.php?page=nosGammesProduits');
    }
} else {
    header('location:../public/index.php?page=updateGammesProduits&id=' . $_POST['id']);
}
