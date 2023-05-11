<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../asset/login.css">
    <title>Login Page</title>
</head>


<body>

    <form class="box" action="../model/validate.php" method="post" name="login">

        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur">
        <label>
            <input type="password" name="password" placeholder="Mot de passe">
            <i data-feather="eye"></i>
            <i data-feather="eye-off"></i>
            <div class="password-icon">

            </div>
        </label>
        <input type="submit" value="Connexion " name="submit" class="box-button">
        

        <script src="https://unpkg.com/feather-icons"></script>
        <script>
            feather.replace();
        </script>
        <script>
            const eye = document.querySelector(".feather-eye");
            const eyeoff = document.querySelector(".feather-eye-off");
            const passwordField = document.querySelector("input[type=password]");
            eye.addEventListener("click", () => {
                eye.style.display = "none";
                eyeoff.style.display = "block";
                passwordField.type = "text";
            });

            eyeoff.addEventListener("click", () => {
                eyeoff.style.display = "none";
                eye.style.display = "block";
                passwordField.type = "password";
            });
        </script>
</body>

</html>