<?php
require_once('../backoffice/database.php');
require_once('../backoffice/model/secure.php');
function gammeProducts($id)
{
    $id=secureInput($id);
    $db = dbconnect();
    $sql = 'SELECT * FROM `gamme_products` WHERE id=:id  ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $gammeProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $gammeProducts;
}
