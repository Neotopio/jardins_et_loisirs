<?php
require_once('../database.php');
require_once('../model/secure.php');


function deleteReservations($id)
{
    $id = secureInput($id);
    $text=secureInput($_POST['text']);
    $db = dbconnect();
    $sql = 'SELECT * FROM `validate` WHERE id_validate=:id ';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $validates = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($validates as $validate) {
       
        $customer_name = $validate['customer_name'];
        $customer_last_name = $validate['customer_last_name'];
        $customer_email = $validate['customer_email'];
       
    }

    $query = 'DELETE FROM `validate` WHERE id_validate=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $sujet = 'Votre réservation ';
    $corp = "
   
    Bonjour " . $customer_name . " " . $customer_last_name . "
     
      Votre demande de réservation à était refuser pour le motif suivant ".$text
   
    ;

    mail($customer_email, $sujet, $corp);
}
