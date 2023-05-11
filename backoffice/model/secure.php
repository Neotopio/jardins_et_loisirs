<?php


function secureInput($input) 
{
    if (is_array($input)) {
        return array_map('secureInput', $input);
    }

    $input = htmlspecialchars(stripslashes(trim($input)));
    return $input;
}