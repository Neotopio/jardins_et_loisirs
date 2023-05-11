<?php
require_once('../model/gammeProducts.php');
require_once('../model/updateGammesProducts.php');

function vueGammeProducts()
{
    $gammeProducts = gammeProducts();
    require_once('../template/gammesProducts.php');
}

function vueUpdateGammeProduct($id)
{
    $gammes=vueUpdateGammesProducts($id);
    require_once('../template/updateGammesProducts.php');
}
