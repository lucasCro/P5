<?php

use \alagauda\models\ConnexionManager;

if (isset($_POST['verification']) && $_POST['verification'] == "valid" && isset($_POST['memberId']))
{
    require_once('../ConnexionManager.php');

    // Connection a la BDD
    $dbConnection = new ConnexionManager();
    $db = $dbConnection->dbConnection();
    // Recuperation de la requete
    $member = strip_tags($_POST['memberId']);
    $result = $db->prepare('SELECT *
                        FROM events 
                        INNER JOIN jointable 
                        ON jointable.event_id = events.eventId 
                        WHERE jointable.member_id = :memberid');
    $result->execute(array(
        'memberid' => $member
    ));
    // Retourne le resultat en JSON
    $events = null;
    while ($data = $result->fetchAll(PDO::FETCH_ASSOC)) {
        $events = $data;
    }
    echo json_encode($events);
}
else
{
    echo "failed to connect";
}
