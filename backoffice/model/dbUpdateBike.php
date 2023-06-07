<?php
require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateBike($picture)
{
    $db = dbconnect();
    $id=secureInput($_POST['id']);
    $type = secureInput($_POST['type']);
    $description = secureInput($_POST['description']);
    $picture=secureInput($picture);
    $price = secureInput($_POST['price']);  
    $quantity=secureInput($_POST['quantity']);
    $is_enable = secureInput($_POST['enable']);
  
    $query = 'UPDATE `bikes` SET id=:id ,  bike_type=:type,bike_description=:description,bike_image=:picture,is_enable=:is_enable
                ,bike_price=:price,bike_quantity=:quantity,is_enable=:is_enable 
                 WHERE id=:id';  
 
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':type', $type, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_INT);
    $req->bindValue(':picture', $picture, PDO::PARAM_STR);
    $req->bindValue(':price', $price, PDO::PARAM_STR);
    $req->bindValue(':quantity', $quantity, PDO::PARAM_STR);
    
    $req->execute();
}