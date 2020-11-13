<?php
require_once('../connexionManager.php');

// Connection a la BDD
$dbConnection = new ConnexionManager();
$db = $dbConnection->dbConnection();
// Recuperation de la requete
$result = $db->query('SELECT * FROM member');
// Retourne le resultat sous forme d'un tableau $data
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));