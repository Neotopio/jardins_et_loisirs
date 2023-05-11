<?php



require_once('../model/adGammesProducts.php');

if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    adGammesProducts();
     header('location:../public/index.php?page=nosGammesProduits');
} else {
     header('location:../public/index.php?page=adGammeProducts');
}
