<?php
require_once('../database.php');
require_once('../model/secure.php');


function vueUpdateSubCategorys($id){
    $db = dbconnect();
    $id=secureInput($id);
    $sqlQuery = 'SELECT * FROM `subcategory` WHERE id = :id';
    $subCategorytatement = $db->prepare($sqlQuery);
    $subCategorytatement->bindValue(':id', $id, PDO::PARAM_INT);
    $subCategorytatement->execute(array(
        'id' => $id,
    ));
    $subCategorytatement->execute();
    $subCategory = $subCategorytatement->fetchAll();
    return $subCategory;
}