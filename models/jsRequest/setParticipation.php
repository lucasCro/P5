<?php
if (isset($_POST['verification']) && $_POST['verification'] == "valid" && isset($_POST['participation'])) {
require_once('../connexionManager.php');

$participation = strip_tags($_POST['participation']);
$eventId = strip_tags($_POST['eventId']);
$memberId = strip_tags($_POST['memberId']);

// Connection a la BDD
$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();

// Mise a jour de ses données
$update = $db->prepare('UPDATE jointable SET participation = :participation WHERE event_id = :eventId AND member_id = :memberId');
$update->execute(array(
    'participation' => $participation,
    'memberId' => $memberId,
    'eventId' => $eventId
));
}
else
{
    echo "failed to connect";
}