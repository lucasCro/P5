<?php
require_once('connexionManager.php');

if ( isset($_POST['eventName']) && isset($_POST['eventLocalisation']) && isset($_POST['eventStart']) 
    && isset($_POST['eventEnd']) && isset($_POST['eventDescription']) && isset($_POST['eventMember']) )
{

    foreach ($_POST['eventMember'] as $member )
    {

        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Requete d'insertion 
        $insertRequest = $db->prepare('INSERT INTO events(eventName, eventLocalisation, eventStart, eventEnd, eventDescription, eventMember) 
                                            VALUES(:eventName, :eventLocalisation, :eventStart, :eventEnd, :eventDescription, :eventMember)');
        $insertRequest->execute(array(
            'eventName' => $_POST['eventName'],
            'eventLocalisation' => $_POST['eventLocalisation'],
            'eventStart' => $_POST['eventStart'],
            'eventEnd' => $_POST['eventEnd'],
            'eventDescription' => $_POST['eventDescription'],
            'eventMember' => $member
        ));
    }

}

