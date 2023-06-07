<?php
require_once('../database.php');
function bikes()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `bikes`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $news = $query->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
