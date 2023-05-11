<?php
require_once('../database.php');
function services()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `services`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}
