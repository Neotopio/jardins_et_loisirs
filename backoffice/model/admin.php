<?php
require_once('../database.php');
function admin()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `admin`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $admin = $query->fetchAll(PDO::FETCH_ASSOC);
    return $admin;
}
