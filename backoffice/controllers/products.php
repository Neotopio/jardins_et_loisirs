<?php
require_once('../model/products.php');
require_once('../model/gammeProducts.php');

function vueProducts()
{
    $products = products();
    require_once('../template/product.php');
}
function vueAdProducts()
{
    $gammes = gammeProducts();
    require_once('../template/adProducts.php');
}

function vueUpdateProducts(){
    
}