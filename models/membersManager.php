<?php

class MembersManager
{
    
    public function getMembers()
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Recuperation de la requete
        $result = $db->query('SELECT * FROM member');
        // Retourne le resultat sous forme d'un tableau $data
        return $result;
    }

    public function addMember($pseudo, $password, $prenom, $nom, $mail)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Requete d'insertion 
        $insertRequest = $db->prepare('INSERT INTO member(pseudo, password, picture, admin, prenom, nom, mail) VALUES(:pseudo, :password, :picture, :admin, :prenom, :nom, :mail)');
        $insertRequest->execute(array(
            'pseudo' => $pseudo,
            'password' => $password,
            'picture' => "",
            'admin' => null,
            'prenom' => $prenom,
            'nom' => $nom,
            'mail' => $mail
        ));
    }

    public function infosMember($memberMail)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Recuperation de la requete
        $result = $db->prepare('SELECT * FROM member WHERE :memberMail');
        $result->execute(array(
            "memberMail" => $memberMail
        ));
        // Retourne le resultat sous forme d'un tableau $data
        return $result;
    }
}