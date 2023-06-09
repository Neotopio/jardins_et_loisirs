<?php
require_once('../backoffice/database.php');
require_once('../backoffice/model/secure.php');
function services($id)
{
    $id=secureInput($id);
    $db = dbconnect();
    $sql = 'SELECT * FROM `services` WHERE id=:id  ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $services = $query->fetchAll(PDO::FETCH_ASSOC);
    return $services;
}
