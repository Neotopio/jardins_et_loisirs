<?php

// Récupération des données de la requête AJAX
$date = $_GET['date'];
$bike_id = $_GET['bike_id'];

// Connexion à la base de données
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'jardins_et_loisirs';
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la disponibilité des vélos pour la date sélectionnée
$sql = "SELECT * FROM reservations WHERE bike_id = '$bike_id' AND date = '$date'";
$result = $conn->query($sql);

// Si au moins une réservation existe pour la date et le vélo sélectionnés, la date est indisponible
if ($result->num_rows > 0) {
    echo 'false';
} else {
    echo 'true';
}

// Fermeture de la connexion à la base de données
$conn->close();

?>
