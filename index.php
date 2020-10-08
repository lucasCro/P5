<?php
function checkPassword() {
    $password = true;
    if ($password == true) {
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

 











