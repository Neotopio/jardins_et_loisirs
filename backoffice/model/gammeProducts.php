<?php
require_once('../database.php');
function gammeProducts()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `gamme_products`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $gammeProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $gammeProducts;
}
