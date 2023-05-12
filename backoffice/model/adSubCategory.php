<?php
require_once('../database.php');
require_once('../model/secure.php');


function adSubCategory()
{

    $db = dbconnect();
    $name = secureInput($_POST['name']);
    $id = secureInput($_POST['id']);
    $is_enable = secureInput($_POST['enable']);
    $query = 'INSERT INTO `subcategory`( `name`, `is_enable`, `id_gamme_products`) VALUES (:name,:is_enable,:id_gamme_products)';
    $req = $db->prepare($query);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_INT);
    $req->bindValue(':id_gamme_products', $id, PDO::PARAM_INT);
    $req->execute();
}
