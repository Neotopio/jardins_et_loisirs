<?php

require_once('../database.php');

function photoVue($id)
{
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM picture INNER JOIN illustrate ON id = id_picture WHERE id_product =:id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    
    $productsStatement->execute();
    $photos = $productsStatement->fetchAll();


    return $photos;
}
function vueProducts($id){
    $db = dbconnect();

    $sqlQuery = 'SELECT * FROM product  WHERE id_product =:id';
    $productsStatement = $db->prepare($sqlQuery);
    $productsStatement->bindValue(':id', $id, PDO::PARAM_INT);
    
    $productsStatement->execute();
    $products = $productsStatement->fetchAll();


    return $products;
}