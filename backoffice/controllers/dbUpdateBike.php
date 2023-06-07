<?php
require_once('../model/dbUpdateBike.php');
require_once('../model/adBike.php');
if ((isset($_POST['type']) && !empty($_POST['type']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))
    && (isset($_POST['price']) && !empty($_POST['price']))
    && (isset($_POST['quantity']) && !empty($_POST['quantity']))
    && (isset($_POST['id']) && !empty($_POST['id']))


) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        $picture = adPhoto();
        dbUpdateBike($picture);
        unlink('../'.$_POST['chemin']);
       // header('location:../public/index.php?page=bike');
    } else {
        $picture = $_POST['chemin'];
        dbUpdateBike($picture);
       // header('location:../public/index.php?page=bike');
    }
} else {
    header('location:../public/index.php?page=updateBike&id=' . $_POST['id']);
}
