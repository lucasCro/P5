<?php
require_once('connexionManager.php');

// Verification que toutes les données requises sont presentes
if ( isset($_POST['eventName']) && isset($_POST['eventLocalisation']) && isset($_POST['eventStart']) 
    && isset($_POST['eventEnd']) && isset($_POST['eventDescription']) && isset($_POST['eventMember']) )
{
    // Insertion dans la table Event du nouvel evenement
    // Connection a la BDD
    $dbConnection = new ConnexionManager();
    $db = $dbConnection->dbConnection();
    // Requete d'insertion 
    $insertRequest = $db->prepare('INSERT INTO events(eventName, eventLocalisation, eventStart, eventEnd, eventDescription, eventCreator) 
                                          VALUES(:eventName, :eventLocalisation, :eventStart, :eventEnd, :eventDescription, :eventCreator)');
    $insertRequest->execute(array(
        'eventName' => $_POST['eventName'],
        'eventLocalisation' => $_POST['eventLocalisation'],
        'eventStart' => $_POST['eventStart'],
        'eventEnd' => $_POST['eventEnd'],
        'eventDescription' => $_POST['eventDescription'],
        'eventCreator' => $_POST['eventCreator']
    ));

    // Recuperation de l ID de l evenement que l'on vient de créé
    $eventId = null ;
    $dbConnection = new ConnexionManager();
    $request = $db->query('SELECT eventId FROM events ORDER BY eventId DESC LIMIT 0, 1');
    while ($data = $request->fetch())
    {
        $eventId = $data['eventId'];
    }
    // Insertion dans la jointable 
    foreach ($_POST['eventMember'] as $member )
    {

        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Requete d'insertion
        $insertRequest = $db->prepare('INSERT INTO jointable(event_id, member_id) VALUES(:event_id, :member_id)');
        $insertRequest->execute(array(
            'event_id' => $eventId,
            'member_id' => $member 
        ));
    }
}
else
{
    echo 'fail';
}

