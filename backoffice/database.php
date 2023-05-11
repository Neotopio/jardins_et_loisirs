<?php


function dbconnect()
{
    try {
        $db = new PDO(
            'mysql:host=localhost;dbname=jardins_et_loisirs;charset=utf8',
            'root',
            ''
        );
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
    return $db;
}
