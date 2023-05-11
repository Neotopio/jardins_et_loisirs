<?php
require_once('../database.php');

function deleteProducts($id)
{

    $db = dbconnect();
    $query = 'DELETE FROM product WHERE id_product=:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}
function getIdPicture($id)
{
    $db = dbconnect();
    $query = 'SELECT id_picture FROM illustrate WHERE id_product =:id';
    $req = $db->prepare($query);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $dels = $req->fetchAll(PDO::FETCH_ASSOC);
    return $dels;
}

function deleteProductsPictures($idPicture)
{
    $dels = $idPicture;
    $db = dbconnect();

    foreach ($dels as $val) {
        foreach ($val as $del) {
          
            $pict = 'SELECT * FROM picture WHERE id=:id';
            $picture = $db->prepare($pict);
            $picture->bindValue(':id', $del, PDO::PARAM_INT);
            $picture->execute();
            while ($value = $picture->fetch(PDO::FETCH_ASSOC)) {
               
                unlink('../' . $value['path']);
                $delPicture = 'DELETE FROM picture WHERE id=:id';
                $pic = $db->prepare($delPicture);
                $pic->bindValue(':id', $value['id'], PDO::PARAM_INT);
                $pic->execute();
            }
        }
    }
}