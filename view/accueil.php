<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Accueil";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- ACCUEIL -->
<section id="home">
    <img src="public/images/sliderHome.jpg" class="img-fluid" alt="photo d'une montagne">
    <div class="container-fluid">
        <div class="container bg-light rounded" id="homeContent">
            <h1>Bienvenue sur Tri Baous <?= $_SESSION['pseudo']; ?> !</h1>
            <p>Ici tu pourras consulter votre agenda pour savoir ce qu'il y a de prévu, partager des photos et consulter ton profil !</p>
        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>