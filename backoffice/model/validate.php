<?php
session_start();
require_once('../database.php');

$db = dbconnect();


$username = ($_POST["nom"]);
$password = ($_POST["password"]);
$stmt = $db->prepare('SELECT * FROM admin WHERE name = :nom');
$stmt->bindValue(":nom", $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();

if (($user['name'] == $username) && (password_verify($password, $user['password']))) {
  $_SESSION['nom'] = $username;
  header("location:../public/index.php");
 
} else {
  
  header("location:../template/loginAdmin.php");
  die();
}
