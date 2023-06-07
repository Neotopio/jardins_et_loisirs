<?php



require_once('../model/adCarousel.php');

if ((isset($_POST['enable']) && !empty($_POST['enable']))
  

) {
    adCarousel();
     header('location:../public/index.php?page=carousel');
} else {
     header('location:../public/index.php?page=adCarousel');
}
