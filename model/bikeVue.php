<?php
require_once('../backoffice/database.php');
require_once('../backoffice/model/secure.php');
function bikeVues()
{

    $db = dbconnect();
    $sql = 'SELECT * FROM `bikes`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $bikes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $bikes;
}
