<?php

namespace alagauda\models;

class Controller 
{
    private $prefixe = "impossible";
    private $suffixe = "craquer";

    function __construct()
    {
        spl_autoload_register(function ($classe) {
            $path = str_replace('\\', '/', $classe);
            $res = explode('models/', $path);
            require_once 'models/' . $res[1] . '.php';
        });
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
        if(isset($_SESSION['id']))
        {
            require_once('view/accueil.php');
            require_once('view/template.php');
        }
        else
        {
            require_once('view/notuser.php');
            require_once('view/template.php');
        }    
    }

    public function calendarView()
    {
        if (isset($_SESSION['id'])) 
        {
            require_once('view/agenda.php');
            require_once('view/template.php');
        }
        else
        {
            require_once('view/notuser.php');
            require_once('view/template.php');
        }    
    }

    public function pictureView()
    {
        if (isset($_SESSION['id'])) 
        {
        require_once('view/photo.php');
        require_once('view/template.php');
        }
        else {
            require_once('view/notuser.php');
            require_once('view/template.php');
        } 
    }

    public function profilView()
    {
        if (isset($_SESSION['id'])) 
        {
            // Modification des données d'un membre (SAUF Mot de passe)
            if (isset($_POST['btnModifyMember']) &&
                (isset($_POST['pseudo']) && $_POST['pseudo'] != null) &&
                (isset($_POST['statut']) && $_POST['statut'] != null) &&
                (isset($_POST['prenom']) && $_POST['prenom'] != null) &&
                (isset($_POST['nom']) && $_POST['nom'] != null) &&
                (isset($_POST['mail']) && $_POST['mail'] != null)        
            )
            {
                // rappel profil($pseudo, $nom, $prenom, $mail, $password, $statut, $picture)
                $newProfil = new ProfilManager($_POST['pseudo'], $_POST['nom'],
                                        $_POST['prenom'], $_POST['mail'],
                                        null, $_POST['statut'], $_SESSION['picture']);

                $memberUpdate = new MembersManager();
                $memberUpdate->updateMember($newProfil, $_POST['id']);
                // mise a jour de ses infos
                $infosMember = $memberUpdate->infosMember($newProfil->getMail());
                
                while ($data = $infosMember->fetch()) {
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['prenom'] = $data['prenom'];
                    $_SESSION['nom'] = $data['nom'];
                    $_SESSION['mail'] = $data['mail'];
                    $_SESSION['statut'] = $data['statut'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['picture'] = $data['picture'];
                }
                $alert ="Votre profil est mis a jour!";
                require_once('view/profil.php');
                require_once('view/template.php');
            }
            // Modification du MOT DE PASSE
            elseif (isset($_POST['btnChangePassword']))
            {
                // rappel profil($pseudo, $nom, $prenom, $mail, $password, $statut, $picture)
                $newProfil = new ProfilManager(
                    $_POST['pseudo'],
                    $_POST['nom'],
                    $_POST['prenom'],
                    $_POST['mail'],
                    $_POST['password'],
                    $_POST['statut'],
                    $_SESSION['picture']
                );

                $memberUpdate = new MembersManager();
                $memberUpdate->updateMember($newProfil, $_POST['id']);
                // mise a jour de ses infos
                $infosMember = $memberUpdate->infosMember($newProfil->getMail());

                while ($data = $infosMember->fetch()) {
                    $_SESSION['pseudo'] = $data['pseudo'];
                    $_SESSION['prenom'] = $data['prenom'];
                    $_SESSION['nom'] = $data['nom'];
                    $_SESSION['mail'] = $data['mail'];
                    $_SESSION['statut'] = $data['statut'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['picture'] = $data['picture'];
                }
                $alert = "Votre mot de passe a été changé !";
                require_once('view/profil.php');
                require_once('view/template.php');
            }
            // Modification de la photo de profil
            // Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            elseif (isset($_FILES['picture']) && ($_FILES['picture']['error'] == 0)) {
                // Test si le fichier n'est pas trop gros
                if ($_FILES['picture']['size'] <= 1000000) {
                    // Test si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['picture']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    $picture = 'public/images/uploads/' . $_SESSION['prenom'] . $_SESSION['nom'] . 'ProfilPicture.' . $extension_upload;
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['picture']['tmp_name'], $picture);
                        // Mise a jour du profil dans la BDD
                        $profil = new ProfilManager(
                            $_SESSION['pseudo'],
                            $_SESSION['nom'],
                            $_SESSION['prenom'],
                            $_SESSION['mail'],
                            null,
                            $_SESSION['statut'],
                            $picture
                        );
                        $updateMember = new MembersManager();
                        $updateMember->updateMember($profil, $_SESSION['id']);
                        $_SESSION['picture'] = $picture.'?r='.date('mis');

                        $alert = "L'envoi a bien été effectué !";
                        require_once('view/profil.php');
                        require_once('view/template.php');
                    } else {
                        $alert = "l'extension de l'image n'est pas supporté (extensions autorisées: .jpg, .jpeg, .gif, .png)";
                    }
                } else {
                    $alert = "L'image est trop lourde";
                }
            }
            // Bouton deconnexion
            elseif(isset($_POST['btnDeconnectMember']))
            {
                unset($_SESSION['pseudo']);
                unset($_SESSION['prenom']);
                unset($_SESSION['nom']);
                unset($_SESSION['mail']);
                unset($_SESSION['statut']);
                unset($_SESSION['password']);
                unset($_SESSION['id']);
                unset($_SESSION['picture']);
                require_once('view/authentification.php');
                require_once('view/template.php');
            }
            else
            {
                require_once('view/profil.php');
                require_once('view/template.php');
            }
        }
        else 
        {
            require_once('view/notuser.php');
            require_once('view/template.php');
        } 
    }

    public function adminView()
    {
        if (isset($_SESSION['id']) && $_SESSION['statut'] == 'Admin') 
        {
            // Recuperation de la liste des membres:
            if (isset($_POST['btnMembersManager']))
            {
                $member = new MembersManager();
                $memberList = $member->getMembers();

                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
            // Modification des données d'un membre
            elseif (isset($_POST['btnModifyMember']) &&
                (isset($_POST['pseudo']) && $_POST['pseudo'] != null) &&
                (isset($_POST['statut']) && $_POST['statut'] != null) &&
                (isset($_POST['prenom']) && $_POST['prenom'] != null) &&
                (isset($_POST['nom']) && $_POST['nom'] != null) &&
                (isset($_POST['mail']) && $_POST['mail'] != null)        
            )
            {
                // rappel: profil($pseudo, $nom, $prenom, $mail, $password, $statut, $picture)
                $newProfil = new ProfilManager ($_POST['pseudo'], $_POST['nom'],
                                        $_POST['prenom'], $_POST['mail'],
                                        $_POST['password'], $_POST['statut'], $_POST['picture'] );

                $memberUpdate = new MembersManager();
                $memberUpdate->updateMember($newProfil, $_POST['id']);
                $alert = 'Profil mis a jour';
                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
            // Suppression d'un membre
            elseif (isset($_POST['btnDeleteMember']))
            {
                $member = new MembersManager();
                $member->deleteMember($_POST['id']);
                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
            // Modification de la photo de profil
            // Test si le fichier a bien été envoyé et s'il n'y a pas d'erreur
            elseif (isset($_FILES['picture']) && ($_FILES['picture']['error'] == 0)) {
                // Test si le fichier n'est pas trop gros
                if ($_FILES['picture']['size'] <= 1000000) {
                    // Test si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['picture']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    $picture = 'public/images/uploads/' . $_POST['prenom'] . $_POST['nom'] . 'ProfilPicture.' . $extension_upload;
                    if (in_array($extension_upload, $extensions_autorisees)) {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['picture']['tmp_name'], $picture);
                        // Mise a jour du profil dans la BDD
                        $profil = new ProfilManager(
                            $_POST['pseudo'],
                            $_POST['nom'],
                            $_POST['prenom'],
                            $_POST['mail'],
                            null,
                            $_POST['statut'],
                            $picture
                        );
                        $updateMember = new MembersManager();
                        $updateMember->updateMember($profil, $_POST['id']);
                        

                        $alert = "L'envoi a bien été effectué !";
                        require_once('view/administrateur.php');
                        require_once('view/template.php');
                    }
                    else
                    {
                        $alert = "l'extension de l'image n'est pas supporté (extensions autorisées: .jpg, .jpeg, .gif, .png)";
                    }
                }
                else
                {
                    $alert = "L'image est trop lourde";
                }
            }
            // Apres appuie sur bouton "gestion des evenements"
            elseif(isset($_POST['btnEventManager']))
            {
                $eventManager = new EventManager();
                $event = $eventManager->getEvents();
                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
            // Bouton Suppression d'un evenement
            elseif(isset($_POST['deleteEvent']) && isset($_POST['eventId']))
            {
                $eventId = $_POST['eventId'];
                $eventManager = new EventManager();
                $eventManager->deleteEvent($eventId);
                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
            // Si aucun envoi de formulaire
            else
            {
                require_once('view/administrateur.php');
                require_once('view/template.php');
            }
        } 
        else
        {
            require_once('view/notuser.php');
            require_once('view/template.php');
        }   
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
                    $_SESSION['statut'] = $data['statut'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['picture'] = $data['picture'];
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
            // Creation du nouveau profil
            $profil = new ProfilManager($_POST['newPseudo'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['newPassword']);
            // Appelle de la fonction checkPassword pour verifier que le MDP ai bien mini 8 caracteres, 1 minuscule, 1 majuscule et 1 chiffre
            if ($profil->checkPassword($_POST['newPassword']) && $profil->checkMail($_POST['mail']))
            {
                $pwdConfirmation = md5($this->prefixe . strip_tags($_POST['passwordConfirmation']) . $this->suffixe);

                // Verification du mot de passe identique a celui confirmé
                if ($profil->getPassword() == $pwdConfirmation) 
                {
                    $member = new MembersManager();
                    $member->addMember($profil);
                    $_SESSION['pseudo'] = $profil->getPseudo();
                    $_SESSION['prenom'] = $profil->getPrenom();
                    $_SESSION['nom'] = $profil->getNom();
                    $_SESSION['mail'] = $profil->getMail();
                    $_SESSION['statut'] = $profil->getStatut();
                    $_SESSION['password'] = $profil->getPassword();
                    $_SESSION['picture'] = $profil->getPicture();

                    // Recuperation de l'id 
                    $member = new MembersManager();
                    $infos = $member->infosMember($profil->getMail());
                    while ($data = $infos->fetch()) 
                    {
                        $_SESSION['id'] = $data['id'];
                    }

                    $alert = 'Bienvenue ' . $profil->getPseudo() . ', ton profil a bien été créé !';
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
            // Si le MDP n'est pas conforme
            elseif (!$profil->checkPassword($_POST['newPassword']))
            {
                $alert = "Votre mot de passe doit comporter au minimum 8 caracateres, 1 majuscule, 1 minuscule et un chiffre";
                require_once('view/authentification.php');
                require_once('view/template.php');
            } 
            elseif (!$profil->checkMail($_POST['mail'])) 
            {
                $alert = "Votre adresse mail est incorrect";
                require_once('view/authentification.php');
                require_once('view/template.php');
            }
        }
        // Actions si le formulaire d'INSCRIPTION est n'est pas ENTIEREMENT rempli
        elseif (
            isset($_POST['inscription']) ||
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