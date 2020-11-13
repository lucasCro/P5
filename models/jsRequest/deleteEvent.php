<?php
require_once('../connexionManager.php');

$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();

$eventId = $_POST['eventId'];
// Suppression de la table events
$deleteEvent = $db->prepare('DELETE FROM events WHERE eventId = :eventId');
$deleteEvent->execute(array(
    'eventId' => $eventId
));
// Suppression de la table jointable
$deleteEvent = $db->prepare('DELETE FROM jointable WHERE event_id = :eventId');
$deleteEvent->execute(array(
    'eventId' => $eventId
));