<?php
session_start();
require_once('../model/dbUpdateAdmin.php');


if ((isset($_POST['name']) && !empty($_POST['name']))
    && (isset($_POST['email']) && !empty($_POST['email']))
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    && (isset($_POST['password']) && !empty($_POST['password']))
) {
    if ($_POST['password'] == $_POST['password2']) {
        dbUpdateAdmin($id);
        header('location:../public/index.php?page=admin');
    } else {
        header('location:../public/index.php?page=updateAdmin&id=' . $_POST['id']);
    }
} else {
    header('location:../public/index.php?page=updateAdmin&id=' . $_POST['id']);
}
