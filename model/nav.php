<?php
require_once('../backoffice/database.php');

function serviceNav()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `services`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}
function gammeProduct()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `gamme_products`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $gammeProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $gammeProducts;
}
