<?php
require_once('../model/deletePicture.php');


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
   
    deletePictures($id);
    header("location: ../public/index.php?page=products");
}
