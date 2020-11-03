<?php
require_once('connexionManager.php');

// Connection a la BDD
$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();
// Recuperation de la requete
$result = $db->query('SELECT * FROM events');
// Retourne le resultat en JSON
$events = array();
while ( $data = $result->fetchAll(PDO::FETCH_ASSOC))
{
    $events[] = $data;
}
echo json_encode($events);