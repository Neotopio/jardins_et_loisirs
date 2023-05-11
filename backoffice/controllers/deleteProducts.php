<?php
require_once('../model/deleteProducts.php');

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $idPicture =  getIdPicture($id);
    deleteProductsPictures($idPicture);
    deleteProducts($id);
    header("location: ../public/index.php?page=products");
}
