<?php
require_once('../model/reservations.php');


function vueReservations()
{
    $locations = reservations();
    require_once('../template/reservations.php');
}
