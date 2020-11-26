<?php
if (isset($_POST['verification']) && $_POST['verification'] == "valid" && isset($_POST['eventId']) && isset($_POST['memberId'])) {
require_once('../connexionManager.php');

$eventId = strip_tags($_POST['eventId']);
$memberId = strip_tags($_POST['memberId']);

// Connection a la BDD
$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();

// Mise a jour de ses données
$participation = $db->prepare('SELECT participation FROM jointable WHERE event_id = :eventId AND member_id = :memberId');
$participation->execute(array(
    'memberId' => $memberId,
    'eventId' => $eventId
));
echo json_encode($participation->fetchAll(PDO::FETCH_ASSOC));
}
else
{
    echo "failed to connect";
}