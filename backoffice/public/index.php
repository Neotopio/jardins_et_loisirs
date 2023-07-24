<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location:../template/loginAdmin.php");
    exit();
}

if (isset($_GET['page'])) {
    $page = strval($_GET['page']);
    switch ($page) {
        case 'nosGammesProduits':
            require_once('../controllers/gammeProducts.php');
            vueGammeProducts();
            break;
        case 'adGammeProducts':
            require_once('../controllers/adGammesProducts.php');
            vueAdGammesProducts();
            break;
        case 'updateGammeProducts':
            require_once('../controllers/gammeProducts.php');
            vueUpdateGammeProduct($_GET['id']);
            break;
        case 'subCategory':
            require_once('../controllers/subCategory.php');
            vueSubCategory($_GET['id']);
            break;
        case 'adSubCategory':
            require_once('../controllers/adSubCategory.php');
            vueAdSubCategory();
            break;
        case 'updateSubCategory':
            require_once('../controllers/subCategory.php');
            vueUpdateSubCategory($_GET['id']);
            break;
        case 'nosServices':
            require_once('../controllers/services.php');
            vueServices();
            break;
        case 'adServices':
            require_once('../controllers/adServices.php');
            vueAdServices();
            break;
        case 'updateServices':
            require_once('../controllers/services.php');
            vueUpdateService($_GET['id']);
            break;
        case 'news':
            require_once('../controllers/news.php');
            vueNews();
            break;
        case 'adNews':
            require_once('../controllers/adNews.php');
            vueAdNews();
            break;
        case 'updateNews':
            require_once('../controllers/news.php');
            vueUpdateNew($_GET['id']);
            break;
        case 'products':
            require_once('../controllers/products.php');
            vueProducts();
            break;
        case 'adProducts':
            require_once('../controllers/products.php');
            vueAdProducts();
            break;
        case 'updateProducts':
            require_once('../controllers/updateProducts.php');
            vueUpdateProducts($_GET['id']);
            break;
        case 'carousel':
            require_once('../controllers/carousel.php');
            vueCarousel();
            break;
        case 'adCarousel':
            require_once('../controllers/adCarousel.php');
            vueAdCarousel();
            break;
        case 'updateCarousel':
            require_once('../controllers/carousel.php');
            vueUpdateCarousel($_GET['id']);
            break;
        case 'bike':
            require_once('../controllers/bike.php');
            vueBike();
            break;
        case 'adBike':
            require_once('../controllers/adBike.php');
            vueAdBike();
            break;
        case 'updateBike':
            require_once('../controllers/bike.php');
            vueUpdateBike($_GET['id']);
            break;
        case 'admin':
            require_once('../controllers/admin.php');
            vueAdmin();
            break;
        case 'updateAdmin':
            require_once('../controllers/admin.php');
            vueUpdateAdmin($_GET['id']);
            break;
        case 'location':
            require_once('../controllers/locations.php');
            vueLocation();
            break;
        case 'deleteLocations':
            require_once('../controllers/deleteLocations.php');
            vueDeleteLocations();
            break;
        case 'reservations':
            require_once('../controllers/reservations.php');
            vueReservations();
            break;
        default:
            require_once('../controllers/homePage.php');
            homePage();
            break;
    }
} else {
    require_once('../controllers/homePage.php');
    homePage();
}
