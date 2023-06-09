<?php
require_once('../backoffice/database.php');

function news()
{
    
    $db = dbconnect();
    $sql = 'SELECT * FROM `services` ORDER BY DESC ';
    $query = $db->prepare($sql);
    
    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}
