<?php
require_once('../database.php');
require_once('../model/secure.php');
$db= dbconnect();

$id = secureInput($_POST['id']) ;
$query = 'DELETE FROM `subcategory` WHERE id=:id'; 
$req = $db->prepare($query);
$req->bindValue(':id', $id, PDO::PARAM_INT);
$req->execute();
header("location:../public/index.php?page=subCategory&id=".$_POST['id_gamme']);
