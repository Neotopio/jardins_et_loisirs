<?php
require_once('../backoffice/database.php');
require_once('../backoffice/model/secure.php');
function bike($id)
{
    $id=secureInput($id);
    $db = dbconnect();
    $sql = 'SELECT * FROM `bikes` WHERE id=:id  ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $bikes = $query->fetchAll(PDO::FETCH_ASSOC);
    return $bikes;
}
