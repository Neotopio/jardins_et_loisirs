
<!DOCTYPE html>
<html>
<link href="../asset/adAdmin.css" rel="stylesheet">
<head>
<style>
   
</style>
</head>

<body>
    
     
        <form class="box" action="../model/ctrlAdAdmin.php" method="post">

            <h1 class="box-title">S'inscrire</h1>
            <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
           
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input type="submit" name="submit" value="S'inscrire" class="box-button" />
            <p class="box-register"> <a href="../public/index.php">retour</a></p>
        </form>
 
</body>

</html>