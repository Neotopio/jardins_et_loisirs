<?php
require_once('../database.php');

function products()
{
    $db = dbconnect();
    $sql = 'SELECT *
            FROM product
            INNER JOIN illustrate ON product.id_product =illustrate.id_product
            INNER JOIN picture ON illustrate.id_picture=picture.id 
            WHERE  product.is_enable=1
            GROUP BY product.id_product
            ORDER BY product.id_product DESC
            ';
    $query = $db->prepare($sql);
    
    $query->execute();
    $products = $query->fetchAll(PDO::FETCH_ASSOC);
    return  $products;
}