<?php
// Demarrage de session_start pour utiliser les variable de sessions
session_start();

require_once('models/connexionManager.php');
require_once('models/MembersManager.php');

class Controller 
{
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
            $password = strip_tags($_POST['password']);

            // Verification des logs
            if ($this->checkLog($$mail, $password))
            {
                // Si utilisateur valide :
                // Recuperation de ses infos en base de données
                $member = new MembersManager();
                $member->infosMember($mail);
                $this->homeView();
            }
            // Sinon:
            else
            {
                $alert = "mot de passe et/ou pseudo invalide !";
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
            $password = strip_tags($_POST['newPassword']);
            $pwdConfirmation = strip_tags($_POST['passwordConfirmation']);
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
                $this->homeView();
            }
            else
            {
                $alert = "Le mot de passe de confirmation est différent du mot de passe initial";
                require_once('view/authentification.php');
                require_once('view/template.php');
            }
        }
        // Action si la page est demandé sans envoie de formulaire
        else 
        {      
            require_once('view/authentification.php');
            require_once('view/template.php');
        }

    }

}