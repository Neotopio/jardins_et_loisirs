<?php

require_once('../backoffice/database.php');


$numberOfBikes = intval($_GET['numberOfBikes']);
$id = intval($_GET['id']);

$db = dbconnect();
$sql = "SELECT r.start_date, r.end_date
FROM reservations as r
JOIN bikes as b ON b.id = r.bike_id
WHERE r.bike_id = :id
AND (b.bike_quantity - r.quantity) < :numberOfBikes";


$query = $db->prepare($sql);
$query->bindValue(':numberOfBikes', $numberOfBikes, PDO::PARAM_INT);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$unavailableDates = $query->fetchAll(PDO::FETCH_ASSOC);



$unavailableDatesFormatted = array_map(function ($row) {
    return array(
        'start' => $row['start_date'],
        'end' => $row['end_date']
    );
}, $unavailableDates);

$response = array(
    'unavailableDates' => $unavailableDatesFormatted
);
echo json_encode($response);