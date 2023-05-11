<?php
require_once('../model/subCategory.php');
require_once('../model/updateSubCategory.php');


function vueSubCategory($id)
{
    $subCategorys = subCategory($id);
    require_once('../template/subCategory.php');
}
function vueUpdateSubCategory($id)
{
    $subCategorys=vueUpdateSubCategorys($id);
    require_once('../template/updateSubCategory.php');
}