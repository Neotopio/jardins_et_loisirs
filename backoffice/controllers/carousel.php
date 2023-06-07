<?php
require_once('../model/carousel.php');
require_once('../model/updateCarousel.php');

function vueCarousel()
{
    $carousels = carousel();
    require_once('../template/carousel.php');
}
function vueUpdateCarousel($id)
{
    $carousels = vueUpdateCarousels($id);
    require_once('../template/updateCarousel.php');
}
