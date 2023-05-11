<?php

require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateProducts()
{
    $db = dbconnect();

    $id = secureInput($_POST['id']);
    $name = secureInput($_POST['name']);
    $description = secureInput($_POST['description']);
    $ref = secureInput($_POST['ref']);
    $price = secureInput($_POST['price']);
    $gamme = secureInput($_POST['gamme']);
    $enable = secureInput($_POST['enable']);

    if ($gamme !== 'Sélectionnez la catégorie') {
        $query = 'UPDATE `product` 
        SET `id_product`=:id ,  name=:name,description=:description,reference=:reference,price=:price,is_enable=:is_enable,id_gamme_products=:id_gamme 
        WHERE id_product= :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':reference', $ref, PDO::PARAM_STR);
        $req->bindValue(':price', $price);
        $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
        $req->bindValue(':id_gamme', $gamme, PDO::PARAM_STR);
        $req->execute();
    }
    else {
        $query = 'UPDATE `product` 
        SET id_product=:id ,  name=:name,description=:description,reference=:reference,price=:price,is_enable=:is_enable 
        WHERE id_product= :id';
        $req = $db->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':reference', $ref, PDO::PARAM_STR);
        $req->bindValue(':price', $price);
        $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
        
        $req->execute();
    }
}