<?php
require_once('../database.php');
require_once('../model/secure.php');



function adPhoto()
{

    if ($_FILES['pictures']['size'] <= 1000000) {

        $fileInfo = pathinfo($_FILES['pictures']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        if (in_array($extension, $allowedExtensions)) {

            move_uploaded_file($_FILES['pictures']['tmp_name'], '../uploads/' . basename($_FILES['pictures']['name']));
            $screenshot = 'uploads/' . basename($_FILES['pictures']['name']);
        } else {
            echo 'Le format du fichier n\'est pas autorisé. Merci de n\'envoyer que des fichiers .jpg, .jpeg, .png ou .gif';

            exit;
        }
    } else {
        echo 'Le fichier dépasse la taille autorisée';
        exit;
    }
    return $screenshot;
}


function adCarousel()
{
    $db = dbconnect();
   
    $chemin=adPhoto();
    $is_enable = secureInput($_POST['enable']);
    $query = 'INSERT INTO `carousel`(`chemin`, `is_enable`) VALUES (:chemin,:is_enable)';
    $req = $db->prepare($query);
  
    $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
    $req->bindValue(':is_enable', $is_enable, PDO::PARAM_INT);
    $req->execute();
}
