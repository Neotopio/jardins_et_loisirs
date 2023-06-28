<?php
require_once('../model/deleteReservations.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
   
    deleteReservations($id);
    header("location: ../public/index.php?page=location");
}
else {
    header("location: ../public/index.php?page=deleteLocation&id=".$id);
}
