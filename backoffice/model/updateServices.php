<?php
require_once('../database.php');


function vueUpdateservices($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM `services` WHERE id = :id';
    $serviceStatement = $db->prepare($sqlQuery);
    $serviceStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $serviceStatement->execute(array(
        'id' => $id,
    ));
    $serviceStatement->execute();
    $services = $serviceStatement->fetchAll();
    return $services;
}
