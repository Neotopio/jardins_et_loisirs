<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location:../template/loginAdmin.php");
    exit();
}


if (isset($_GET['page'])) {
    $page = strval($_GET['page']);
    if ($page == 'nosGammesProduits') {
        require_once('../controllers/gammeProducts.php');
        vueGammeProducts();
    } elseif ($page == 'adGammeProducts') {
        require_once('../controllers/adGammesProducts.php');
        vueAdGammesProducts();
    } elseif ($page == 'updateGammeProducts') {
        require_once('../controllers/gammeProducts.php');
        vueUpdateGammeProduct($_GET['id']);
    } elseif ($page == 'subCategory') {
        require_once('../controllers/subCategory.php');
        vueSubCategory($_GET['id']);
    } elseif ($page == 'adSubCategory') {
        require_once('../controllers/adSubCategory.php');
        vueAdSubCategory();
    } elseif ($page == 'updateSubCategory') {
        require_once('../controllers/subCategory.php');
        vueUpdateSubCategory($_GET['id']);
    } elseif ($page == 'nosServices') {
        require_once('../controllers/services.php');
        vueServices();
    } elseif ($page == 'adServices') {
        require_once('../controllers/adServices.php');
        vueAdServices();
    } elseif ($page == 'updateServices') {
        require_once('../controllers/services.php');
        vueUpdateService($_GET['id']);
    } elseif ($page == 'news') {
        require_once('../controllers/news.php');
        vueNews();
    } elseif ($page == 'adNews') {
        require_once('../controllers/adNews.php');
        vueAdNews();
    } elseif ($page == 'updateNews') {
        require_once('../controllers/news.php');
        vueUpdateNew($_GET['id']);
    } elseif ($page == 'products') {
        require_once('../controllers/products.php');
        vueProducts();
    } elseif ($page == 'adProducts') {
        require_once('../controllers/products.php');
        vueAdProducts();
    } elseif ($page == 'updateProducts') {
        require_once('../controllers/updateProducts.php');
        vueUpdateProducts($_GET['id']);
    } elseif ($page == 'carousel') {
        require_once('../controllers/carousel.php');
        vueCarousel();
    } elseif ($page == 'adCarousel') {
        require_once('../controllers/adCarousel.php');
        vueAdCarousel();
    } elseif ($page == 'updateCarousel') {
        require_once('../controllers/carousel.php');
        vueUpdateCarousel($_GET['id']);
    } elseif ($page == 'bike') {
        require_once('../controllers/bike.php');
        vueBike();
    } elseif ($page == 'adBike') {
        require_once('../controllers/adBike.php');
        vueAdBike();
    } elseif ($page == 'updateBike') {
        require_once('../controllers/bike.php');
        vueUpdateBike($_GET['id']);
    } elseif ($page == 'admin') {
        require_once('../controllers/admin.php');
        vueAdmin();
    } elseif ($page == 'updateAdmin') {
        require_once('../controllers/admin.php');
        vueUpdateAdmin($_GET['id']);
    } elseif ($page == 'location') {
        require_once('../controllers/locations.php');
        vueLocation();
    } elseif ($page == 'deleteLocations') {
        require_once('../controllers/deleteLocations.php');
        vueDeleteLocations();
    } elseif ($page == 'reservations') {
        require_once('../controllers/reservations.php');
        vueReservations();
    } else {
        require_once('../controllers/homePage.php');
        homePage();
    }
} else {
    require_once('../controllers/homePage.php');
    homePage();
}
