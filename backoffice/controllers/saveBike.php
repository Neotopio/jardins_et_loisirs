<?php

require_once('../model/adBike.php');

if ((isset($_POST['type']) && !empty($_POST['type']))
&& (isset($_POST['enable']) && !empty($_POST['enable']))
&& (isset($_POST['description']) && !empty($_POST['description']))
&& (isset($_POST['price']) && !empty($_POST['price']))
&& (isset($_POST['quantity']) && !empty($_POST['quantity']))

) {
    adBikes();
     header('location:../public/index.php?page=bike');
} else {
     header('location:../public/index.php?page=adBike');
}
