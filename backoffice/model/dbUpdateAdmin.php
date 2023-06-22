<?php
require_once('../database.php');
require_once('../model/secure.php');



function dbUpdateAdmin($id)
{
    $db = dbconnect();
    $id=secureInput($_POST['id']);
    $name = secureInput($_POST['name']);
    $email=secureInput($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  
    $query = 'UPDATE `admin` SET id=:id ,  name=:name,email=:email,password=:password 
                 WHERE id=:id';  
 
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);
  
    
    $req->execute();
}