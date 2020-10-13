<?php

class Profil
{
    public $nom;
    public $prenom;
    public $pseudo;
    public $password;
    public $statut;
    public $mail;
    public $picture;
    // Variable privé pour complexifié les mots de passe
    private $prefixe = "impossible";
    private $suffixe = "craquer";

    public function __construct($pseudo, $nom, $prenom, $mail, $password, $statut, $picture)
    {
        // Securisation pour eviter la faille XSS
        $this->nom = strtoupper(strip_tags($nom));
        $this->prenom = ucwords(strip_tags($prenom));
        $this->pseudo = strip_tags($pseudo);
        $this->mail = strip_tags($mail);
        $this->statut = ucwords(strip_tags($statut));
         // encryptage en md5 et ajout d'un prefixe et suffixe pour securiser le mdp:
        $this->password = md5($this->prefixe . strip_tags($password) . $this->suffixe);
        $this->picture = strip_tags($picture);
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    public function getPicture()
    {
        return $this->picture;
    }
} 