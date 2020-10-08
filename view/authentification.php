<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Authentification";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- AUTHENTIFICATION -->
<section id="Authentification">
    <img src="public/images/slider.jpg" class="img-fluid" alt="photo d'une montagne">
    <div class="container-fluid" id="authentificationContent">
        <div class="container">
            <div class="row justify-content-around">
                <!-- formulaire d'authentification -->
                <div class="col-4 bg-light p-5 rounded">
                    <form method="POST">
                        <div class="form-group">
                            <h2>Authentification</h2>
                            <input type="text" class="form-control" placeholder="Entrez votre pseudo">
                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
                            <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
                        </div>
                    </form>
                </div>
                <!-- formulaire de création de compte -->
                <div class="col-4 bg-light p-5 rounded">
                    <form method="POST">
                        <div class="form-group">
                            <h2>Pas encore inscrit ?</h2>
                            <input type="text" class="form-control" placeholder="Entrez votre pseudo">
                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
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