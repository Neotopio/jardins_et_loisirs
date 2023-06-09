<?php
require_once('../model/news.php');

function newvue()
{
    $title = 'Actulités';
    $news = news();
    require_once('../template/news.php');
}
