<?php
require_once('../database.php');
require_once('../model/secure.php');


function deletePictures($idPicture)
{
    $dels = secureInput($idPicture) ;
    $db = dbconnect();

 
          
            $pict = 'SELECT * FROM picture WHERE id=:id';
            $picture = $db->prepare($pict);
            $picture->bindValue(':id', $dels, PDO::PARAM_INT);
            $picture->execute();


            while ($value = $picture->fetch(PDO::FETCH_ASSOC)) {
               
                unlink('../' . $value['path']);
                $delPicture = 'DELETE FROM picture WHERE id=:id';
                $pic = $db->prepare($delPicture);
                $pic->bindValue(':id', $dels, PDO::PARAM_INT);
                $pic->execute();
            }
            $delPicture = 'DELETE FROM illustrate WHERE id_picture=:id';
            $pic = $db->prepare($delPicture);
            $pic->bindValue(':id', $dels, PDO::PARAM_INT);
            $pic->execute();
        }
   