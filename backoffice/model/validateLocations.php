<?php
require_once('../database.php');
require_once('../model/secure.php');


function reservations($id)
{
    $id = secureInput($id);
    $db = dbconnect();
    $sql = 'SELECT * FROM `validate` WHERE id_validate=:id ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $validates = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($validates as $validate) {
        $bike_id = $validate['id_bike'];
        $start_date = $validate['date_start'];
        $end_date = $validate['date_end'];
        $customer_name = $validate['customer_name'];
        $customer_last_name = $validate['customer_last_name'];
        $customer_phone = $validate['customer_phone'];
        $customer_email = $validate['customer_email'];
        $quantity = $validate['quantity'];
    }

    $query = 'INSERT INTO `reservations`( `bike_id`, `start_date`, `end_date`, `customer_name`, `customer_lastname`, `customer_phone`, `customer_email`, `quantity`) 
            VALUES (:bike_id,:start_date,:end_date,:customer_name,:customer_laste_name,:customer_phone,:customer_email,:quantity)';
    $req = $db->prepare($query);
    $req->bindValue(':bike_id', $bike_id, PDO::PARAM_INT);
    $req->bindValue(':start_date', $start_date, PDO::PARAM_STR);
    $req->bindValue(':end_date', $end_date, PDO::PARAM_STR);
    $req->bindValue(':customer_name', $customer_name, PDO::PARAM_STR);
    $req->bindValue(':customer_laste_name', $customer_last_name, PDO::PARAM_STR);
    $req->bindValue(':customer_phone', $customer_phone, PDO::PARAM_STR);
    $req->bindValue(':customer_email', $customer_email, PDO::PARAM_STR);
    $req->bindValue(':quantity', $quantity, PDO::PARAM_INT);
    $req->execute();

    $query = 'DELETE FROM `validate` WHERE id_validate=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();


    $sujet = 'Confirmation de réservation ';
    $corp = "
   
  
     
  
    Bonjour " . $customer_name . " " . $customer_last_name . "
     
      Votre demande a était validée 
   
    ";

    mail($customer_email, $sujet, $corp);
}
