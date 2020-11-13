<!-- PHP -->
<?php

// affectation de la variable title (utilisé dans le template)
$title = "Accueil";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- ACCUEIL -->
<section id="home" class="justify-content-center">
    <div id="homeContent" class="container-fluid bg-light rounded p-5">
        <h1 class="text-info">Bienvenue sur Tri Baous <?= $_SESSION['prenom']; ?> !</h1>
        <p>Ici tu pourras consulter ton agenda pour savoir ce qu'il y a de prévu, partager des photos et consulter ton profil !</p>
    </div>
    <img src="public/images/sliderHome.jpg" class="img-fluid" alt="photo d'une montagne">
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>