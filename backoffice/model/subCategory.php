<?php
require_once('../database.php');
require_once('../model/secure.php');
function subCategory($id)
{
    $id=secureInput($id);
    $db = dbconnect();
    $sql = 'SELECT * FROM `subcategory` WHERE id_gamme_products=:id  ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $subcategorys = $query->fetchAll(PDO::FETCH_ASSOC);
    return $subcategorys;
}
