<?php
if (isset($_POST['verification']) && $_POST['verification'] == "valid" && isset($_POST['eventId']))
{
    require_once('../connexionManager.php');

    $eventId = $_POST['eventId'];

    $connexion = new ConnexionManager();
    $db = $connexion->dbConnection();

    $request = $db->prepare('SELECT * FROM member INNER JOIN jointable ON jointable.member_id = member.id WHERE jointable.event_id = :eventId');
    $request->execute(array(
        'eventId' => $eventId
    ));
    $result = $request->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
else
{
    echo "failed to connect";
}