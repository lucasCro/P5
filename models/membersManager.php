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

    public function addMember($profil)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Requete d'insertion 
        $insertRequest = $db->prepare('INSERT INTO member(pseudo, password, picture, statut, prenom, nom, mail) VALUES(:pseudo, :password, :picture, :statut, :prenom, :nom, :mail)');
        $insertRequest->execute(array(
            'pseudo' => $profil->getPseudo(),
            'password' => $profil->getPassword(),
            'picture' => $profil->getPicture(),
            'statut' => $profil->getStatut(),
            'prenom' => $profil->getPrenom(),
            'nom' => $profil->getNom(),
            'mail' => $profil->getMail()
        ));
    }

    public function infosMember($memberMail)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();
        // Recuperation des infos
        $result = $db->prepare('SELECT * FROM member WHERE mail = :memberMail');
        $result->execute(array(
            "memberMail" => $memberMail
        ));
        return $result;
    }

    public function updateMember($profil, $id)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();

        // Mise a jour de ses données
        $update = $db->prepare('UPDATE member SET pseudo = :pseudo, password = :password, picture = :picture, statut = :statut, prenom = :prenom, nom = :nom, mail = :mail WHERE id = :id');
        $update->execute(array(
            'pseudo' => $profil->getPseudo(),
            'password' => $profil->getPassword(),
            'picture' => $profil->getPicture(),
            'statut' => $profil->getStatut(),
            'prenom' => $profil->getPrenom(),
            'nom' => $profil->getNom(),
            'mail' => $profil->getMail(),
            'id' => $id
        ));
    }

    public function deleteMember($id)
    {
        // Connection a la BDD
        $dbConnection = new ConnexionManager();
        $db = $dbConnection->dbConnection();

        // Mise a jour de ses données
        $delete = $db->prepare('DELETE FROM member WHERE id = :id');
        $delete->execute(array( 'id' => $id));
    }
}