<?php
require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateSubCategory()
{
    $db = dbconnect();
 
    $id= secureInput($_POST['id']);
    $name=secureInput($_POST['name']);

    $enable=secureInput($_POST['enable']);
    $query = 'UPDATE `subcategory` SET id=:id ,  name=:name,is_enable=:is_enable WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->execute();
}