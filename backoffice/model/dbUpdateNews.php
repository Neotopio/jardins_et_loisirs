<?php
require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateNews($picture)
{
    $db = dbconnect();
    $picture=secureInput($picture);
    $id= secureInput($_POST['id']);
    $name=secureInput($_POST['name']);
    $description=secureInput($_POST['description']);
    $enable=secureInput($_POST['enable']);
    $query = 'UPDATE `news` SET id=:id ,  name=:name,description=:description,picture=:picture,is_enable=:is_enable WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':picture', $picture, PDO::PARAM_STR);
    $req->execute();
}