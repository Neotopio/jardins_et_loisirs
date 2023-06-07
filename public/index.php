<?php
session_start();
if (isset($_GET['action'])) {
    $action = strval($_GET['action']);
    if ($action == 'gamme product') {
        require_once('../controllers/gamme_product');
        gamme_product();
    } elseif ($action == 'services') {
        require_once('../controllers/services.php');
        service();
    }elseif ($action == 'news') {
        require_once('../controllers/news.php');
        news();
    }  elseif ($action == 'location') {
        require_once('../controllers/location.php');
        location();
    }elseif ($action == 'contact') {
        require_once('../controllers/contact.php');
        contact();
    }else {
        require_once('../controllers/home.php');
        home();
    }
} else {
    require_once('../controllers/home.php');
    home();
}
