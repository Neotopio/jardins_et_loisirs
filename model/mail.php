<?php

function sendMail($a, $b, $c, $d, $e)
{
    $dest = "s.leininger@live.fr";
    $sujet = 'contact';
    $corp = "
   
     Nom et prenom :
     " . $a . " " . $b . "
     Telephone :
     " . $c . " 
     Email :
     " . $d . "
     Message :
     " . $e . " 
   
    ";
 
    mail($dest, $sujet, $corp);
       
    
}

function returnMail($mail,$nom){
    $dest = $mail;
    $sujet = 'Demande de contact';
    $corp = "
   Bonjour Mr ".$nom.",
   Votre demande de contact a bien etait recue, nous allons prendre contact avec vous rapidement.

   cdt,
     
   
    ";
 
    mail($dest, $sujet, $corp);
}
