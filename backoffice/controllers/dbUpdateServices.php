<?php
require_once('../model/dbUpdateServices.php');
require_once('../model/adServices.php');
if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        $picture = adPhoto();
        dbUpdateServices($picture);
        unlink($_POST['chemin']);
        header('location:../public/index.php?page=nosServices');
    } else {
        $picture = $_POST['chemin'];
        dbUpdateServices($picture);
        header('location:../public/index.php?page=nosServices');
    }
} else {
    header('location:../public/index.php?page=updateServices&id=' . $_POST['id']);
}
