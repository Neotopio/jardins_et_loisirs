<?php

if (isset($_GET['action'])) {
    $action = strval($_GET['action']);
    if ($action == 'gamme product') {
        require_once('../controllers/gamme_product');
       // gamme_product();
    } elseif ($action == 'services') {
        siervice();
    }elseif ($action == 'news') {
        news();
    }  elseif ($action == 'contact') {
        require_once('../contollers/contact.php');
        contact();
    }else {
        require_once('../contollers/home.php');
        home();
    }
} else {
    require_once('../contollers/home.php');
    home();
}
