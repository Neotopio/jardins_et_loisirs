<?php


require_once('../model/adProducts.php');

if ((isset($_POST['price']) && !empty($_POST['price']))
    && (isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))
    && (isset($_POST['gamme']) && !empty($_POST['gamme']))
    && (isset($_POST['ref']) && !empty($_POST['ref']))
) {
   
    adProduct();
    adPicturesProducts();
  

    header('location:../public/index.php?page=products');
} else {
    header('location:../public/index.php?page=adProducts');
}