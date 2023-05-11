<?php
require_once('../model/services.php');
require_once('../model/updateServices.php');

function vueServices()
{
    $services = services();
    require_once('../template/services.php');
}
function vueUpdateService($id)
{
    $services = vueUpdateServices($id);
    require_once('../template/updateServices.php');
}
