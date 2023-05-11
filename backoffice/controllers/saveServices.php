<?php



require_once('../model/adServices.php');

if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    adServices();
     header('location:../public/index.php?page=nosServices');
} else {
     header('location:../public/index.php?page=adServices');
}
