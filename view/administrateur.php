<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Administrateur";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- ADMINISTRATEUR -->
<section>
    <div class="container-fluid">
        <div class="container">
            <h1>Administrateur</h1>

            <!-- bouton menu -->
            <div class="row justify-content-center mt-5">
                <form method="POST" class="form-group">
                    <div class="form-group">
                        <button type="submit" name="btnMembersManager" class="btn btn-primary mr-3">
                            Gestion des membres
                        </button>
                        <button type="submit" name="btnEventManager" class="btn btn-primary">
                            Gestion des evenements
                        </button>
                    </div>
                </form>
            </div>

            <!-- div affichage membres -->
            <div class="container row mt-3 justify-content-between">
                <!-- récuperation et affichage des informations sur les membres ($memberList créé dans le mainController) -->
                <?php
                if (isset($memberList)) {
                    while ($member = $memberList->fetch()) {
                ?>

                        <div class="card col-5">
                            <img class="card-img-top w-25" src="public/images/imgProfil.jpg" alt="photo de profil">
                            <div class="card-body">
                                <form method="POST">
                                    <div class="group-form">
                                        <h1><?= $member['nom']; ?> <?= $member['prenom']; ?></h1>
                                        <label for="pseudo">Pseudo :</label>
                                        <input type="text" class="form-control" value="<?= $member['pseudo']; ?>" id="pseudo" name="pseudo">
                                        <label for="prenom">Prénom :</label>
                                        <input type="text" class="form-control" value="<?= $member['prenom']; ?>" id="prenom" name="prenom">
                                        <label for="nom">Nom :</label>
                                        <input type="text" class="form-control" value="<?= $member['nom']; ?>" id="nom" name="nom">
                                        <label for="mail">Mail :</label>
                                        <input type="mail" class="form-control" value="<?= $member['mail']; ?>" id="mail" name="mail">
                                        <label for="statut">Statut :</label>
                                        <input type="text" class="form-control mb-3" value="<?= $member['statut']; ?>" id="statut" name="statut">
                                        <label for="password">Mot de passe :</label>
                                        <input type="password" class="form-control" value="<?= $member['password']; ?>" id="password" name="password">
                                        <input type="hidden" name="id" value="<?= $member['id']; ?>">
                                        <div class="row mt-3">
                                            <button type="submit" class="btn btn-primary mx-2" name="btnModifyMember">Modifier</button>
                                            <button type="submit" class="btn btn-primary" name="btnDeleteMember">Supprimer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- fin de la boucle php d'affichage des infos membres -->
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>