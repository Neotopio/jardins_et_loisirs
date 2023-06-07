<?php
session_start();
require_once('../model/mail.php');

if ((isset($_POST['first_name']) && !empty($_POST['first_name']))
    && (isset($_POST['last_name']) && !empty($_POST['last_name']))
    && (isset($_POST['tel']) && !empty($_POST['tel']))
    && (isset($_POST['mail']) && !empty($_POST['mail']))
    && (isset($_POST['text']) && !empty($_POST['text']))
) {
    $a = $_POST['first_name'];
    $b = $_POST['last_name'];
    $c = $_POST['tel'];
    $d = $_POST['mail'];
    $e = $_POST['text'];
    if (filter_var($d, FILTER_VALIDATE_EMAIL)) {
        sendMail($a, $b, $c, $d, $e);
        returnMail($d, $b);
        $_SESSION['sucess'] = "Votre message a était envoyé";
        header('location:../public/index.php?action=contact');
    }
} else {
    $_SESSION['error'] = "Veuillez remplir tous les champs";
    header('location:../public/index.php?action=contact');
}
