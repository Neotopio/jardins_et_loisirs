<?php
    require_once('../model/carousel.php');
 function home()
 {
    $title='Accueil';
    $photos=carousel();
    require_once('../template/home.php');

}
