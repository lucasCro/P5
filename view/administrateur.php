<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Administrateur";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- ADMINISTRATEUR -->
<div class="container-fluid" id="divAdministrateur">
    <div class="container">
        <h1 class="my-3 text-info text-md-uppercase text-sm-normal text-sm-center text-md-left container">Administrateur</h1>

        <!-- bouton menu -->
        <form method="POST" class="mt-5">
            <div class="form-group container">
                <button type="submit" name="btnMembersManager" class="btn btn-primary my-1 col-md-6">
                    Gestion des membres
                </button>
                <button type="submit" name="btnEventManager" class="btn btn-primary my-1 col-md-6">
                    Gestion des evenements
                </button>
            </div>
        </form>

        <!-- div affichage MEMBRE -->
        <div class="container mt-3">
            <!-- récuperation et affichage des informations sur les membres ($memberList créé dans le mainController) -->
            <?php
            if (isset($memberList)) {
                while ($member = $memberList->fetch()) {
            ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card d-flex my-3">
                            <!-- header card  -->
                            <div class="card-header">
                                <img class="card-img-top col-12 col-md-4 mb-2" src="<?= $member['picture']; ?>" alt="photo de profil">
                                <label for="input_<?= $member['id']; ?>" class="btn btn-primary my-1">Cliquer ici pour choisir une image de profil!</label>
                                <input type="file" id="input_<?= $member['id']; ?>" name="picture" class="d-none" value="<?= $member['picture']; ?>" />
                                <button type="submit" class="btn btn-success my-1" name="btnChangePicture">Valider</button>
                            </div>
                            <!-- body card -->
                            <div class="card-body">
                                <div class="group-form">
                                    <h1><?= $member['nom']; ?> <?= $member['prenom']; ?></h1>
                                    <label for="<?= $member['pseudo']; ?>">Pseudo :</label>
                                    <input type="text" class="form-control" value="<?= $member['pseudo']; ?>" id="<?= $member['pseudo']; ?>" name="pseudo">
                                    <label for="<?= $member['prenom']; ?>">Prénom :</label>
                                    <input type="text" class="form-control" value="<?= $member['prenom']; ?>" id="<?= $member['prenom']; ?>" name="prenom">
                                    <label for="<?= $member['nom']; ?>">Nom :</label>
                                    <input type="text" class="form-control" value="<?= $member['nom']; ?>" id="<?= $member['nom']; ?>" name="nom">
                                    <label for="<?= $member['mail']; ?>">Mail :</label>
                                    <input type="mail" class="form-control" value="<?= $member['mail']; ?>" id="<?= $member['mail']; ?>" name="mail">
                                    <label>Statut :</label>
                                    <input type="text" class="form-control mb-3" value="<?= $member['statut']; ?>" name="statut">
                                    <label for="<?= $member['password']; ?>">Mot de passe :</label>
                                    <input type="password" class="form-control" placeholder="changer de mot de passe ?" id="<?= $member['password']; ?>" name="password">
                                    <input type="hidden" name="id" value="<?= $member['id']; ?>">
                                    <div class="row mt-3">
                                        <button type="submit" class="btn btn-primary mx-2" name="btnModifyMember">Modifier</button>
                                        <button type="submit" class="btn btn-primary" name="btnDeleteMember">Supprimer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- fin de la boucle php d'affichage des infos membres -->
            <?php
                }
            }
            ?>
        </div>
        <!-- div affichage des EVENEMENTS -->
        <div class="container mt-3">
            <!-- récuperation et affichage des informations sur les evenements ($event et $memberInEvent créé dans le mainController) -->
            <?php
            if (isset($event)) {
                while ($eventInfos = $event->fetch()) {
                    $creator = $eventManager->getEventCreator($eventInfos['eventId']);
            ?>
                    <form method="POST" class="col-sm-12 col-md-5 bg-white rounded">
                        <div class="form-group">
                            <h2 class="text-info"><?= $eventInfos['eventName']; ?></h2>
                            <h5 class="text-primary">Organisateur:</h5>
                            <p><?= $creator; ?></p>
                            <h5 class="text-primary">Desctiption:</h5>
                            <p><?= $eventInfos['eventDescription']; ?></p>
                            <h5 class="text-primary">Lieu:</h5>
                            <p><?= $eventInfos['eventLocalisation']; ?></p>
                            <h5 class="text-primary">Participants:</h5>
                            <ul class="my-4">
                                <?php
                                $memberInEvent = $eventManager->getMemberInEvent($eventInfos['eventId']);
                                if (isset($memberInEvent)) {
                                    while ($members = $memberInEvent->fetch()) {
                                ?>
                                        <li> <?= $members['nom'] . " " . $members['prenom']; ?> </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                            <input type="hidden" name="eventId" value="<?= $eventInfos['eventId']; ?>">
                            <button type="submit" name="deleteEvent" class="btn btn-danger">Supprimer</button>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>