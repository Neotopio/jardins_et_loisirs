<?php
require('../database.php');
require_once('../model/secure.php');
$db= dbconnect();

$id =secureInput($_POST['id']) ;
$query = 'DELETE FROM `admin` WHERE id=:id'; 
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();
header("location:../public/index.php?page=admin");