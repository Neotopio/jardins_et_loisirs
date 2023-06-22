<?php
require_once('../database.php');
require_once('../model/secure.php');


function vueUpdateGammesProducts($id)
{
    $db = dbconnect();
    $id = secureInput($id);
    $sqlQuery = 'SELECT * FROM `gamme_products` WHERE id = :id';
    $gammeStatement = $db->prepare($sqlQuery);
    $gammeStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $gammeStatement->execute(array(
        'id' => $id,
    ));
    $gammeStatement->execute();
    $gammes = $gammeStatement->fetchAll();
    return $gammes;
}
