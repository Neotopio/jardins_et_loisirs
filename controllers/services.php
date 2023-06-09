<?php
require_once('../model/services.php');

function service($id)
{
    $title = 'Nos services';
    $services = services($id);
    require_once('../template/services.php');
}
