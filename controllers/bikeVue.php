<?php
require_once('../model/bikeVue.php');

function bikeVue(){
    $title='location';
    $bikes=bikeVues();
    require_once('../template/bike.php');
}