<?php
namespace alagauda\models;

class EventManager
{
    public function getEvents()
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Recuperation de la requete
        $result = $db->query('SELECT * FROM events');
        // Retourne le resultat sous forme d'un tableau $data
        return $result;
    }

    public function getJointable()
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Recuperation de la requete
        $result = $db->query('SELECT * FROM jointable');
        // Retourne le resultat sous forme d'un tableau $data
        return $result;
    }

    public function getWholeEventInfos()
    {
        $connexion = new ConnexionManager();
        $db = $connexion->dbConnection();
        $result = $db->query(
            'SELECT *
            FROM jointable 
            INNER JOIN events ON jointable.event_id = events.eventId
            INNER JOIN member ON member.id = jointable.member_id'     
        );
        return $result;
    }

    public function getMemberInEvent($eventId)
    {
        $connexion = new ConnexionManager();
        $db = $connexion->dbConnection();

        $request = $db->prepare('SELECT * FROM member INNER JOIN jointable ON jointable.member_id = member.id WHERE jointable.event_id = :eventId');
        $request->execute(array(
            'eventId' => $eventId
        ));
        return $request;
    }

    public function deleteEvent($eventId)
    {
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Suppression de la table events
        $deleteEvent = $db->prepare('DELETE FROM events WHERE eventId = :eventId');
        $deleteEvent->execute(array(
            'eventId' => $eventId
        ));
        $deleteEvent = $db->prepare('DELETE FROM jointable WHERE event_id = :eventId');
        $deleteEvent->execute(array(
            'eventId' => $eventId
        ));
    }

    public function getEventCreator($eventId)
    {
        $connexion = new ConnexionManager();
        $db = $connexion->dbConnection();
        $result = $db->prepare(
            'SELECT * 
            FROM jointable 
            INNER JOIN events ON jointable.event_id = events.eventId
            INNER JOIN member ON jointable.member_id = member.id
            WHERE jointable.event_id = :eventId'
        );
        $result->execute(array(
                'eventId' => $eventId
        ));
        while ($data = $result->fetch())
        {
            if ($data['member_id'] == $data['eventCreator'])
            $creator = $data['nom']." ".$data['prenom'];
        }
        return $creator;
    }
}