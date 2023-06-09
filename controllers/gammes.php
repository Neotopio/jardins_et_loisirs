<?php
require_once('../model/gammes.php');
function gamme($id){

    $title='Gammes produits';
    $gammes=gammeProducts($id);
    require_once('../template/gammes.php');
}