<?php
require_once('../database.php');
function carousel()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `carousel`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $carousels = $query->fetchAll(PDO::FETCH_ASSOC);
    return $carousels;
}
