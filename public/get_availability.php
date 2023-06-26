<?php
require_once('../backoffice/database.php');
$numberOfBikes = $_POST['number_of_bikes'];
$db = dbconnect();
$sql = "SELECT DISTINCT start_date, end_date
          FROM reservations
          WHERE (
              :numberOfBikes > (
                  SELECT (SUM(quantity) + :numberOfBikes)
                  FROM reservations AS r2
                  WHERE (
                      (r2.start_date <= reservations.start_date AND r2.end_date >= reservations.start_date)
                      OR (r2.start_date <= reservations.end_date AND r2.end_date >= reservations.end_date)
                      OR (r2.start_date >= reservations.start_date AND r2.end_date <= reservations.end_date)
                  )
              )
          )";
$query = $db->prepare($sql);
$query->bindValue(':numberOfBikes', $numberOfBikes, PDO::PARAM_INT);
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
