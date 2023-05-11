<?php
require_once('../database.php');
require_once('../model/secure.php');



function adProduct()
{
    $db = dbconnect();
    $ident_time = time();
    $price=secureInput($_POST['price']);
    $name=secureInput($_POST['name']);
    $description=secureInput($_POST['description']);
    $enable=secureInput($_POST['enable']);
    $gamme=secureInput($_POST['gamme']);
    $ref=secureInput($_POST['ref']);
    $query = 'INSERT INTO product(ident_time,price,name,description,is_enable,id_gamme_products,reference) VALUES (:ident_time,:price,:name,:description,:is_enable,:id_gamme_products,:reference)';
    $req = $db->prepare($query);
    $req->bindValue(':ident_time', $ident_time, PDO::PARAM_INT);
    $req->bindValue(':price', $price,);
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':description', $description, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $enable, PDO::PARAM_INT);
    $req->bindValue(':id_gamme_products', $gamme, PDO::PARAM_INT);
    $req->bindValue(':reference', $ref, PDO::PARAM_STR);
    $req->execute();
}

function adPicturesProducts()
{
    $files = reArrayImages($_FILES['pictures']);

    $db = dbconnect();
    foreach ($files as $file) {
        if ($file['size'] <= 1000000) {
            $fileInfo = pathinfo($file['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {

                move_uploaded_file($file['tmp_name'], '../uploads/' . basename($file['name']));
                $screenshot = 'uploads/' . basename($file['name']);

                $query = 'INSERT INTO picture (path,name_picture) VALUES (:path,:nom)';
                $pic = $db->prepare($query);

                $pic->bindValue(':path', $screenshot, PDO::PARAM_STR);
                $pic->bindValue(':nom', basename($file['name']), PDO::PARAM_STR);
                $pic->execute();



                $idProducts = getLastIdProducts();
                $idPictures = getLastIdPicture();


                $insert = 'INSERT INTO illustrate (id_product,id_picture) VALUES (:id_products,:id_pictures)';
                $pro = $db->prepare($insert);
                $pro->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
                $pro->bindValue(':id_pictures', $idPictures, PDO::PARAM_INT);
                $pro->execute();
            } else {
                echo 'Le format du fichier n\'est pas autorisé. Merci de n\'envoyer que des fichiers .jpg, .jpeg, .png ou .gif';

                exit;
            }
        } else {
            echo 'Le fichier dépasse la taille autorisée';
            exit;
        }
    }
}


function adUpdatePicturesProducts()
{
    
    $files = reArrayImages($_FILES['pictures']);

    $db = dbconnect();
    foreach ($files as $file) {
        if ($file['size'] <= 1000000) {
            $fileInfo = pathinfo($file['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
            if (in_array($extension, $allowedExtensions)) {

                move_uploaded_file($file['tmp_name'], '../uploads/' . basename($file['name']));
                $screenshot = 'uploads/' . basename($file['name']);

                $query = 'INSERT INTO picture (path,name_picture) VALUES (:path,:nom)';
                $pic = $db->prepare($query);

                $pic->bindValue(':path', $screenshot, PDO::PARAM_STR);
                $pic->bindValue(':nom', basename($file['name']), PDO::PARAM_STR);
                $pic->execute();



                $idProducts = secureInput($_POST['id']);
                $idPictures = getLastIdPicture();


                $insert = 'INSERT INTO illustrate (id_product,id_picture) VALUES (:id_products,:id_pictures)';
                $pro = $db->prepare($insert);
                $pro->bindValue(':id_products', $idProducts, PDO::PARAM_INT);
                $pro->bindValue(':id_pictures', $idPictures, PDO::PARAM_INT);
                $pro->execute();
            } else {
                echo 'Le format du fichier n\'est pas autorisé. Merci de n\'envoyer que des fichiers .jpg, .jpeg, .png ou .gif';

                exit;
            }
        } else {
            echo 'Le fichier dépasse la taille autorisée';
            exit;
        }
    }
}

function getLastIdProducts()
{
    $db = dbconnect();
    $query = 'SELECT id_product FROM product ORDER BY id_product DESC LIMIT 1';
    $req = $db->prepare($query);
    $req->execute();
    $idProducts = $req->fetch();
    return $idProducts['0'];
}
function getLastIdPicture()
{
    $db = dbconnect();
    $query = 'SELECT id FROM picture ORDER BY id DESC LIMIT 1';
    $req = $db->prepare($query);
    $req->execute();
    $idPictures = $req->fetch();
    return $idPictures['0'];
}

function reArrayImages($file_post)
{
    $file_ary = [];
    $file_keys = array_keys($file_post);
    foreach ($file_post as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $file_ary[$key2][$key] = $value2;
        }
    }
    return $file_ary;
}
