<?php
session_start();
require_once('../database.php');
require_once('../model/secure.php');

$db = dbconnect();


$username = secureInput($_POST["nom"]);
$password = secureInput($_POST["password"]);
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
