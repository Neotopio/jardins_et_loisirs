<?php
require_once('../model/updateProducts.php');
require_once('../model/gammeProducts.php');
function vueUpdateProducts($id)
{
    $photos = photoVue($id);
    $gammes = gammeProducts();
    $products=vueProducts($id);
    require_once('../template/updateProducts.php');
}
