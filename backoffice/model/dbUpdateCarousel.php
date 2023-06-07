<?php
require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateCarousels($picture)
{
    $db = dbconnect();
    $id= secureInput($_POST['id']);
    $picture=secureInput($picture);
    $enable=secureInput($_POST['enable']);
    $query = 'UPDATE `carousel` SET id=:id , chemin=:chemin,is_enable=:is_enable WHERE id
    = :id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':chemin', $picture, PDO::PARAM_STR);
    $req->execute();
}