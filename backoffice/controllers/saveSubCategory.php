<?php

require_once('../model/adSubCategory.php');

if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['enable']) && !empty($_POST['enable']))
    && (isset($_POST['id']) && !empty($_POST['id']))
  

) {
    adSubCategory();
     header('location:../public/index.php?page=subCategory&id='.$_POST['id']);
} else {
     header('location:../public/index.php?page=adSubCategory');
}
