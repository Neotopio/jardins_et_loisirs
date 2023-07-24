<?php
session_start();
if (isset($_GET['action'])) {
    $action = strval($_GET['action']);
    switch ($action) {
        case 'gamme':
            require_once('../controllers/gammes.php');
            gamme($_GET['id']);
            break;
        case 'services':
            require_once('../controllers/services.php');
            service($_GET['id']);
            break;
        case 'news':
            require_once('../controllers/news.php');
            newvue();
            break;
        case 'location':
            require_once('../controllers/location.php');
            location($_GET['id']);
            break;
        case 'bike':
            require_once('../controllers/bikeVue.php');
            bikeVue();
            break;
        case 'contact':
            require_once('../controllers/contact.php');
            contact();
            break;
        default:
            require_once('../controllers/home.php');
            home();
            break;
    }
} else {
    require_once('../controllers/home.php');
    home();
}
