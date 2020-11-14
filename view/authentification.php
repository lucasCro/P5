<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Authentification";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- AUTHENTIFICATION -->
<section id="Authentification" >
    <img src="public/images/slider.jpg" class="img-fluid" alt="photo d'une montagne">
    <div class="container-fluid" id="authentificationContent">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <!-- formulaire d'authentification -->
                <div class="col-4 bg-light p-5 rounded align-items-end">
                    <form method="POST">
                        <div class="form-group">
                            <h2 class="mb-3 text-info text-center text-uppercase">Authentification</h2>
                            <input type="email" name="mail" class="form-control mb-1" placeholder="Entrez votre mail">
                            <input type="password" name="password" class="form-control mb-1" placeholder="Entrez votre mot de passe">
                            <input type="hidden" name="authentification">
                            <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
                        </div>
                    </form>
                </div>
                <!-- formulaire de création de compte -->
                <div class="col-4 bg-light p-5 rounded">
                    <form method="POST">
                        <div class="form-group">
                            <h2 class="mb-3 text-info text-center text-uppercase">Inscription</h2>
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
        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>