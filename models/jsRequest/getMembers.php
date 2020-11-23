<?php
if (isset($_SESSION['id']))
{
    require_once('../connexionManager.php');

    $eventId = $_GET['eventId'];

    $connexion = new ConnexionManager();
    $db = $connexion->dbConnection();

    $request = $db->prepare('SELECT * FROM member INNER JOIN jointable ON jointable.member_id = member.id WHERE jointable.event_id = :eventId');
    $request->execute(array(
        'eventId' => $eventId
    ));
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
