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
            <div class="row justify-content-center mt-5">
                <button class="btn btn-primary mr-3">
                    Gestion des membres
                </button>
                <button class="btn btn-primary">
                    Gestion des evenements
                </button>
            </div>
            <!-- div affichage membres -->
            <div class="row justify-content-around mt-5">
                <div class="col-3 card">
                    <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                    <div class="card-body">
                        Membre 1
                    </div>
                </div>
                <div class="col-3 card">
                    <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                    <div class="card-body">
                        Membre 2
                    </div>
                </div>
                <div class="col-3 card">
                    <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                    <div class="card-body">
                        Membre 3
                    </div>
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