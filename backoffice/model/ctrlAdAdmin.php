<?php
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
require('../model/secure.php');
require('../database.php');
$db = dbconnect();
// Vérifier la connexion
if ($db === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
$req = "";

if (isset($_POST['nom'],  $_POST['email'], $_POST['password'])) {

    $username = secureInput($_POST['nom']);


    $email = secureInput($_POST['email']);


    $password = secureInput($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT into `admin` (name, email, password)
              VALUES (:name,:email,:password)";


    $req = $db->prepare($query);
    $req->bindValue(':name', $username, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':password', $password, PDO::PARAM_STR);

    $req->execute();
}
if ($req) {
    echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='../template/loginAdmin.php'>connecter</a></p>
       </div>";
}
