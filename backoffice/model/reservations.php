<?php
require_once('../database.php');
function reservations()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `reservations`
    INNER JOIN bikes
    ON reservations.bike_id = bikes.id 
    ORDER BY reservations.id DESC ';
    $query = $db->prepare($sql);
    $query->execute();
    $locations = $query->fetchAll(PDO::FETCH_ASSOC);
    return $locations;
}
