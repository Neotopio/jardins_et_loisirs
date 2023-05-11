<?php



require_once('../model/adNews.php');

if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['description']) && !empty($_POST['description']))

) {
    adNews();
     header('location:../public/index.php?page=news');
} else {
     header('location:../public/index.php?page=adNews');
}
