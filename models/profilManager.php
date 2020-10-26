<?php

class ProfilManager
{
    public $nom;
    public $prenom;
    public $pseudo;
    public $password;
    public $statut;
    public $mail;
    public $picture;
    private $prefixe = "impossible";
    private $suffixe = "craquer";

    public function __construct($pseudo, $nom, $prenom, $mail, $password = null, $statut="User", $picture= "public/images/imgProfil.jpg")
    {
        // Securisation pour eviter la faille XSS
        $this->nom = strtoupper(strip_tags($nom));
        $this->prenom = ucwords(strip_tags($prenom));
        $this->pseudo = strip_tags($pseudo);
        $this->mail = strip_tags($mail);
        $this->statut = ucwords(strip_tags($statut));
        if ($password != null)
        {
            $this->password = md5($this->prefixe . strip_tags($password) . $this->suffixe);
        }
        else
        {
            $this->password = $_SESSION['password'];
        }
        if ($picture != "")
        {
            $this->picture = $picture;
        }
        else
        {
            $this->picture = $_SESSION['picture'];
        }
    }
    public function checkPassword($password)
    {
        $passwordRules = '#([a-zA-Z0-9]+){8}#';
        if (preg_match($passwordRules, $password))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkMail($mail)
    {
        $mailRules = '#^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{2,4}$#';
        if (preg_match($mailRules, $mail)) {
            return true;
        } else {
            return false;
        }
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