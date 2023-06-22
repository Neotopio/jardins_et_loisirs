<?php
require_once('../database.php');
require_once('../model/secure.php');


function vueUpdateAdmins($id)
{
    $db = dbconnect();
    $id = secureInput($id);
    $sqlQuery = 'SELECT * FROM `admin` WHERE id = :id';
    $stm = $db->prepare($sqlQuery);
    $stm->bindValue(':id', $id, PDO::PARAM_INT);
    $stm->execute(array(
        'id' => $id,
    ));
    $stm->execute();
    $admins = $stm->fetchAll();
    return $admins;
}
