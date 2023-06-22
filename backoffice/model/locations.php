<?php
require_once('../database.php');
function locations()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `validate`
    INNER JOIN bikes
    ON validate.id_bike = bikes.id  ';
    $query = $db->prepare($sql);

    $query->execute();
    $locations = $query->fetchAll(PDO::FETCH_ASSOC);
    return $locations;
}
