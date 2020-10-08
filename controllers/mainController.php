<?php
if (isset($_GET['page'])) {

    switch ($_GET['page']) {
        case "calendar":
            require_once('view/agenda.php');
            require_once('view/template.php');
        break;

        case "picture":
            require_once('view/photo.php');
            require_once('view/template.php');
        break;

        case "profil":
            require_once('view/administrateur.php');
            require_once('view/template.php');
        break;

        case "home":
            require_once('view/accueil.php');
            require_once('view/template.php');
        break;

        default:
            require_once('view/accueil.php');
            require_once('view/template.php');
    }
}