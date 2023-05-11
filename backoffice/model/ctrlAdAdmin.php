<?php
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion

require('../database.php');
$db= dbconnect();
// Vérifier la connexion
if($db === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
    $req="";
   
    if (isset($_POST['nom'],  $_POST['email'], $_POST['password'])) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_POST['nom']);
    
        
        $email = stripslashes($_POST['email']);
    
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_POST['password']);
     
        //requéte SQL + mot de passe crypté
        $query = "INSERT into `admin` (name, email, password)
              VALUES ('$username', '$email', '" . password_hash($password, PASSWORD_DEFAULT) . "')";
        // Exécuter la requête sur la base de données
        $req = $db->prepare($query);
 
 
 $req->execute();
}
        if ($req) {
            echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='../template/loginAdmin.php'>connecter</a></p>
       </div>";
        }