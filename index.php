<?php

// appel du controller
require_once('controllers/mainController.php');
$controller = new Controller();

// choix des differents cas possible
if (isset($_GET['page'])) 
{
    switch ($_GET['page']) 
    {
        case "calendar":
            $controller->calendarView();
            break;

        case "picture":
            $controller->pictureView();
            break;

        case "profil":
            $controller->profilView();
            break;

        case "admin":
            $controller->adminView();
            break;
            
        case "home":
            $controller->homeView();
            break;

        default:
            $controller->authentificationView();
    }
}
else 
{
    $controller->authentificationView();
}

 











