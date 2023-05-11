<?php
require_once('../model/dbUpdateNews.php');
require_once('../model/adNews.php');
if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        $picture = adPhoto();
        dbUpdateNews($picture);
        unlink($_POST['chemin']);
        header('location:../public/index.php?page=news');
    } else {
        $picture = $_POST['chemin'];
        dbUpdateNews($picture);
        header('location:../public/index.php?page=news');
    }
} else {
    header('location:../public/index.php?page=updateNews&id=' . $_POST['id']);
}
