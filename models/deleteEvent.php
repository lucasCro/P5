<?php
require_once('connexionManager.php');

$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();

$eventId = $_POST['eventId'];

$deleteEvent = $db->prepare('DELETE FROM events WHERE eventId = :eventId');
$deleteEvent->execute(array(
    'eventId' => $eventId
));