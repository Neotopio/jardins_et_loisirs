<?php
require_once('../model/news.php');
require_once('../model/updateNews.php');

function vueNews()
{
    $news = news();
    require_once('../template/news.php');
}
function vueUpdateNew($id)
{
    $news = vueUpdateNews($id);
    require_once('../template/updateNews.php');
}
