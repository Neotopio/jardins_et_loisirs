<?php
require_once('../model/dbUpdateProducts.php');
require_once('../model/adProducts.php');
var_dump($_POST);
if ((isset($_POST['id']) && !empty($_POST['id']))
    && (isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['description']) && !empty($_POST['description']))
    && (isset($_POST['ref']) && !empty($_POST['ref']))
    && (isset($_POST['price']) && !empty($_POST['price']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['gamme']) && !empty($_POST['gamme']))

) {
    if (isset($_FILES['pictures']) && $_FILES['pictures']['error'] === 0) {
        adUpdatePicturesProducts();
        dbUpdateProducts();
        header('location:../public/index.php?page=products');
    } else {
        dbUpdateProducts();
        header('location:../public/index.php?page=products');
    }
} else {
     header('location:../public/index.php?page=updateProducts&id=' . $_POST['id']);
}
