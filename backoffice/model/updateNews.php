<?php
require_once('../database.php');


function vueUpdateNews($id){
    $db = dbconnect();
  
    $sqlQuery = 'SELECT * FROM `news` WHERE id = :id';
    $newsStatement = $db->prepare($sqlQuery);
    $newsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    $newsStatement->execute(array(
        'id' => $id,
    ));
    $newsStatement->execute();
    $news = $newsStatement->fetchAll();
    return $news;
}