<?php

class Controller 
{
    private $prefixe = "impossible";
    private $suffixe = "craquer";

    function __construct()
    {
        require_once('models/connexionManager.php');
        require_once('models/membersManager.php');
    }
    
    // Fonction privé pour verifié les logs d'un utilisateur
    private function checkLog($mail, $password)
    {
        // Recuperation de tout les mots de passe des membres du site
        $members = new MembersManager();
        $result = $members->getMembers();
        while ($data = $result->fetch()) {
            if ($data['password'] == $password && $data['mail'] == $mail) {
                return true;
            }
        }
        return false;
    }

    public function homeView() 
    {
        require_once('view/accueil.php');
        require_once('view/template.php');
    }

    public function calendarView()
    {
        require_once('view/agenda.php');
        require_once('view/template.php');
    }

    public function pictureView()
    {
        require_once('view/photo.php');
        require_once('view/template.php');
    }

    public function profilView()
    {
        require_once('view/profil.php');
        require_once('view/template.php');
    }

    public function adminView()
    {
        require_once('view/administrateur.php');
        require_once('view/template.php');
    }

    public function authentificationView()
    {
        // Actions si le formulaire AUTHENTIFICATION est rempli
        if (isset($_POST['authentification']) && isset($_POST['mail']) && isset($_POST['password']))
        {
            // Securisation pour eviter la faille XSS
            $mail = strip_tags($_POST['mail']);
            $password = md5($this->prefixe . strip_tags($_POST['password']) . $this->suffixe);

            // Verification des logs
            if ($this->checkLog($mail, $password))
            {
                // Si utilisateur valide :
                // Recuperation de ses infos en base de données
                $member = new MembersManager();
                $infosMember = $member->infosMember($mail);
                while ($data = $infosMember->fetch())
                {
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['prenom'] = $data['prenom'];
                    $_SESSION['nom'] = $data['nom'];
                    $_SESSION['mail'] = $data['mail'];
                    // Convertion du booléan "admin" en texte (utilisé dans la partie profil utilisateur)
                    if ($data['admin'] == 1) 
                    {
                        $_SESSION['statut'] = "Administrateur";
                    }
                    else
                    {
                        $_SESSION['statut'] = "Utilisateur";
                    }
                }
                $this->homeView();
            }
            // Sinon:
            else
            {
                $alert = "mot de passe et/ou adresse mail invalide !";
                require_once('view/authentification.php');
                require_once('view/template.php');
            }
        }
        // Actions si le formulaire d'INSCRIPTION est rempli
        elseif (isset($_POST['inscription']) &&
                // Verification de la presence non null des variables
                (isset($_POST['newPseudo']) && $_POST['newPseudo'] !=null) &&
                (isset($_POST['newPassword']) && $_POST['newPassword'] !=null) &&
                (isset($_POST['passwordConfirmation'])&& $_POST['passwordConfirmation'] != null) &&
                (isset($_POST['nom']) && $_POST['nom'] != null) &&
                (isset($_POST['prenom']) && $_POST['prenom'] != null) &&
                (isset($_POST['mail']) && $_POST['mail'] != null)
                )
        {
            // Securisation pour eviter la faille XSS
            $pseudo = strip_tags($_POST['newPseudo']);
            $password = md5($this->prefixe . strip_tags($_POST['newPassword']) . $this->suffixe); // encryptage en md5 et ajout d'un prefixe et suffixe pour securiser le mdp
            $pwdConfirmation = md5($this->prefixe . strip_tags($_POST['passwordConfirmation']) . $this->suffixe);
            $nom = strip_tags($_POST['nom']);
            $prenom = strip_tags($_POST['prenom']);
            $mail = strip_tags($_POST['mail']);

            // Verification du mot de passe identique a celui confirmé
            if ($password == $pwdConfirmation)
            {
                $member = new MembersManager();
                $member->addMember($pseudo, $password, $prenom, $nom, $mail);
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['mail'] = $mail;
                $alert = 'Bienvenue '.$pseudo.', ton profil a bien été créé !';
                require_once('view/accueil.php');
                require_once('view/template.php');
            }
            else
            {
                $alert = "Le mot de passe de confirmation est différent du mot de passe initial";
                require_once('view/authentification.php');
                require_once('view/template.php');
            }
        }
        // Actions si le formulaire d'INSCRIPTION est n'est pas ENTIEREMENT rempli
        elseif (
            isset($_POST['inscription']) &&
            // Verification de la presence non null des variables
            (isset($_POST['newPseudo']) && $_POST['newPseudo'] != null) ||
            (isset($_POST['newPassword']) && $_POST['newPassword'] != null) ||
            (isset($_POST['passwordConfirmation']) && $_POST['passwordConfirmation'] != null) ||
            (isset($_POST['nom']) && $_POST['nom'] != null) ||
            (isset($_POST['prenom']) && $_POST['prenom'] != null) ||
            (isset($_POST['mail']) && $_POST['mail'] != null)
        ) 
        {
            $alert = "Vous n'avez pas remplis tout les champs !";
            require_once('view/authentification.php');
            require_once('view/template.php');
        }
        // Action si la page est demandé sans envoie de formulaire
        else 
        {      
            require_once('view/authentification.php');
            require_once('view/template.php');
        }

    }

}