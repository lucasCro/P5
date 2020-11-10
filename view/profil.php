<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Profil";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- PROFIL -->
<section id="profil">
    <div class="container-fluid">
        <div class="container">
            <form method="POST" enctype="multipart/form-data">
                <div class="card d-flex flex-row my-3">
                    <div class="card-top col-4">
                        <img class="card-img-top mb-2" src="<?= $_SESSION['picture']; ?>" alt="photo de profil">
                        <input type="file" name="picture" class="m-1" />
                        <button type="submit" class="btn btn-primary" name="btnChangePicture">Valider</button>
                    </div>
                    <div class="card-body pt-0 col-7">
                        <div class="group-form my-5">
                            <h1>Mon profil</h1>
                            <label for="pseudo">Mon pseudo :</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['pseudo']; ?>" id="pseudo" name="pseudo">
                            <label for="prenom">Mon prénom :</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['prenom']; ?>" id="prenom" name="prenom">
                            <label for="nom">Mon nom :</label>
                            <input type="text" class="form-control" value="<?= $_SESSION['nom']; ?>" id="nom" name="nom">
                            <label for="mail">Mon mail :</label>
                            <input type="email" class="form-control" value="<?= $_SESSION['mail']; ?>" id="mail" name="mail">
                            <label for="statut">Mon statut :</label>
                            <input type="text" class="form-control mb-3" value="<?= $_SESSION['statut']; ?>" id="statut" name="statut" readonly>
                            <label for="password">Mon mot de passe : (Ne pas tenir compte de la longueur)</label>
                            <div class="row container-fluid justify-content-between m-0 p-0">
                                <input type="password" class="form-control mb-3 col-10" placeholder="Ecrivez uniquement si vous voulez changer votre mot de passe" id="passwordInput" name="password" readonly>
                                <div id="divBtnLock" class="col-1">
                                    <button type="button" id="btnLockClose" class="btn btn-primary">
                                        <i class="fas fa-lock" id="imgBtnClose"></i>
                                        <i class="fas fa-lock-open" id="imgBtnOpen"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="container-fluid row my-2" id="div_btnChangePassword">
                                <button type="submit" class="btn btn-warning" name="btnChangePassword">Changer de mot de passe</button>
                            </div>
                            <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                            <button type="submit" class="btn btn-primary" name="btnModifyMember">Modifier</button>
                            <button type="submit" class="btn btn-danger" name="btnDeconnectMember">Deconnexion</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>