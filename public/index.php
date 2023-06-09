<?php
session_start();
if (isset($_GET['action'])) {
    $action = strval($_GET['action']);
    if ($action == 'gamme') {
        require_once('../controllers/gammes.php');
        gamme($_GET['id']);
    } elseif ($action == 'services') {
        require_once('../controllers/services.php');
        service($_GET['id']);
    }elseif ($action == 'news') {
        require_once('../controllers/news.php');
        newvue();
    }  elseif ($action == 'location') {
        require_once('../controllers/location.php');
        location($_GET['id']);
    }elseif ($action == 'bike') {
        require_once('../controllers/bikeVue.php');
        bikeVue();
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
