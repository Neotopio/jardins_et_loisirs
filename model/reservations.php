<?php
require_once('../backoffice/database.php');
require_once('../backoffice/model/secure.php');






function reservations()
{
    $db = dbconnect();
    $name = secureInput($_POST['last_name']);
    $first_name = secureInput($_POST['first_name']);
    $phone = secureInput($_POST['tel']);
    $mail = secureInput($_POST['mail']);
    $id_bike = secureInput($_POST['id_bike']);
    $quantity = secureInput($_POST['bike']);
    $start_date = secureInput($_POST['date_debut']);
    $end_date = secureInput($_POST['date_fin']);
    $query = 'INSERT INTO `validate`(`id_bike`, `date_start`, `date_end`, `customer_name`, `customer_last_name`, `customer_email`, `customer_phone`, `quantity`) 
                VALUES (:id_bike,:date_start,:date_end,:customer_name,:customer_last_name,:customer_email,:customer_phone,:quantity)';
    $req = $db->prepare($query);
    $req->bindValue(':id_bike', $id_bike, PDO::PARAM_INT);
    $req->bindValue(':date_start', $start_date, PDO::PARAM_STR);
    $req->bindValue(':date_end', $end_date, PDO::PARAM_STR);
    $req->bindValue(':customer_name', $name, PDO::PARAM_STR);
    $req->bindValue(':customer_last_name', $first_name, PDO::PARAM_STR);
    $req->bindValue(':customer_email', $mail, PDO::PARAM_STR);
    $req->bindValue(':customer_phone', $phone, PDO::PARAM_STR);
    $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $req->execute();
}
