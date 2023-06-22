<?php
session_start();
require_once('../model/reservations.php');
var_dump($_POST);
if ((isset($_POST['first_name']) && !empty($_POST['first_name']))
    && (isset($_POST['last_name']) && !empty($_POST['last_name']))
    && (isset($_POST['tel']) && !empty($_POST['tel']))
    && (isset($_POST['mail']) && !empty($_POST['mail']))
    && (isset($_POST['id_bike']) && !empty($_POST['id_bike']))
    && (isset($_POST['bike']) && !empty($_POST['bike']))
    && (isset($_POST['date_debut']) && !empty($_POST['date_debut']))
    && (isset($_POST['date_fin']) && !empty($_POST['date_fin']))
) {

    reservations();
    $_SESSION['sucess'] = "Votre demande a était envoyé un mail de confirmation vous sera envoyer des validations";
    header('location:../public/index.php?action=location&id=' . $_POST['id_bike']);
} else {
    $_SESSION['error'] = "Veuillez remplir tous les champs";
    header('location:../public/index.php?action=location&id=' . $_POST['id_bike']);
}
