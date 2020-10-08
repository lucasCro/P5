<?php

require_once('controllers/mainController.php');

function checkPassword() {
    $password = true;
    if ($password == false) {
        return true;
    } else {
        return false;
    }
}

if (checkPassword() == true) {
    require('view/accueil.php');
    require('view/template.php');
} else {
    require('view/authentification.php');
    require('view/template.php');
}

 











