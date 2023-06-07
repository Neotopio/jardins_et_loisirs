<?php
require_once('../model/bike.php');
require_once('../model/updateBike.php');

function vueBike()
{
    $bikes = bikes();
    require_once('../template/bike.php');
}
function vueUpdateBike($id)
{
    $bikes = vueUpdateBikes($id);
    require_once('../template/updateBike.php');
}
