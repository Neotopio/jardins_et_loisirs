<?php
require_once('../model/dbUpdateSubCategory.php');

if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['id']) && !empty($_POST['id']))
    && (isset($_POST['id_gamme']) && !empty($_POST['id_gamme']))


) {
    dbUpdateSubCategory();
    header('location:../public/index.php?page=subCategory&id=' . $_POST['id_gamme']);

} else {
    header('location:../public/index.php?page=updateSubCategory&id=' . $_POST['id'].'&id_gamme='.$_POST['id_gamme']);
}
