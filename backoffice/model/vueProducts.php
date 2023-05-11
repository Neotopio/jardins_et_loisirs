<?php
require_once('../database.php');

if (isset($_GET['identCat'])) {
    $id = $_GET['identCat'];
   
    $db=dbconnect();
    
    
    $sqlQuery = 'SELECT * FROM gamme_products INNER JOIN subcategory ON id_gamme_products= gamme_products.id WHERE gamme_products.id = :id';
    $subCategories = $db->prepare($sqlQuery);
    $subCategories->bindValue(':id', $id, PDO::PARAM_INT);
    
    $subCategories->execute();
    $data =json_encode( $subCategories->fetchAll());




    echo $data;
} else {
    echo 'missing parameter';
}
