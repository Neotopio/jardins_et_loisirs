<?php
require_once('../database.php');
function news()
{
    $db = dbconnect();
    $sql = 'SELECT * FROM `news`  ';
    $query = $db->prepare($sql);

    $query->execute();
    $news = $query->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
