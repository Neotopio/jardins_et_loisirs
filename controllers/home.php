<?php
    require_once('../model/carousel.php');
 function home()
 {
    $title='Acceuil';
    $photos=carousel();
    require_once('../template/home.php');

}
