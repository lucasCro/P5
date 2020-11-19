<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Authentification";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- AUTHENTIFICATION -->
<div class="container row justify-content-center mx-auto my-auto text-sm-normal" id="divAuthentification">
    <!-- formulaire d'authentification -->
    <div class="col-12 col-md-4 bg-white p-sm-3 p-lg-5 m-1 rounded">
        <form method="POST">
            <div class="form-group">
                <h2 class="mb-3 text-info text-center text-uppercase-lg ">Authentification</h2>
                <input type="email" name="mail" class="form-control mb-1" placeholder="Entrez votre mail">
                <input type="password" name="password" class="form-control mb-1" placeholder="Entrez votre mot de passe">
                <input type="hidden" name="authentification">
                <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
            </div>
        </form>
    </div>
    <!-- formulaire de création de compte -->
    <div class="col-12 col-md-4 bg-white p-lg-5 p-sm-3 m-1 rounded">
        <form method="POST">
            <div class="form-group">
                <h2 class="mb-3 text-info text-center text-uppercase-lg text-sm-normal">Inscription</h2>
                <input type=" text" name="newPseudo" class="form-control mb-1" placeholder="Entrez votre pseudo">
                <input type="text" name="prenom" class="form-control mb-1" placeholder="Entrez votre prénom">
                <input type="text" name="nom" class="form-control mb-1" placeholder="Entrez votre nom">
                <input type="email" name="mail" class="form-control mb-1" placeholder="Entrez votre adresse mail">
                <input type="password" name="newPassword" class="form-control mb-1" placeholder="Entrez votre mot de passe">
                <input type="password" name="passwordConfirmation" class="form-control mb-1" placeholder="Confirmez votre mot de passe">
                <input type="hidden" name="inscription">
                <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
            </div>
        </form>
    </div>
</div>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>