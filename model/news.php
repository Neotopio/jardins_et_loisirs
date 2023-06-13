<?php
require_once('../backoffice/database.php');

function news()
{
    
    $db = dbconnect();
    $sql = 'SELECT * FROM `news` ORDER BY id DESC ';
    $query = $db->prepare($sql);
    
    $query->execute();
    $news = $query->fetchAll(PDO::FETCH_ASSOC);
    return $news;
}
