<!-- PHP -->
<?php

// affectation de la variable title (utilisé dans le template)
$title = "Accueil";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<!-- HTML -->
<!-- ACCUEIL -->
<div id="divAccueil" class="container mx-auto my-auto bg-light rounded p-5">
    <h1 class="text-primary">Bienvenue sur ALaGauda <?= $_SESSION['prenom']; ?> !</h1>
    <p class="lead font-weight-normal text-dark">Ici tu pourras consulter ton agenda pour savoir ce qu'il y a de prévu, créé des evenements et consulter ton profil !</p>
</div>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>