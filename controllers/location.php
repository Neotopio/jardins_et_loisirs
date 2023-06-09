<?php
require_once('../model/bikes.php');

function location($id){
    $title='location';
    $bikes=bike($id);
    require_once('../template/location.php');
}