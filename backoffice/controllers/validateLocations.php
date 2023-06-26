<?php
require_once('../model/validateLocations.php');

if ((isset($_POST['id_validate']) && !empty($_POST['id_validate']))) {
    $id = $_POST['id_validate'];
    reservations($id);
} else {
    header('location:../public/index.php?page=updateGammesProduits&id=' . $_POST['id']);
}
