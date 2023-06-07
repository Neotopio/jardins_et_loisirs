<?php
require_once('../database.php');


function vueUpdateCarousels($id){
    $db = dbconnect();
  
    $sqlQuery = 'SELECT * FROM `carousel` WHERE id = :id';
    $carouselsStatement = $db->prepare($sqlQuery);
    $carouselsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $carouselsStatement->execute(array(
        'id' => $id,
    ));
    $carouselsStatement->execute();
    $carousels = $carouselsStatement->fetchAll();
    return $carousels;
}