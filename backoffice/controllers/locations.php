<?php
require_once('../model/locations.php');


function vueLocation()
{
    $locations = locations();
    require_once('../template/locations.php');
}
