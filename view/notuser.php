<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Verification utilisateur";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>

<div class="container" id="divNotauser">
    <h1 class="my-3 text-center text-uppercase text-info">Il faut s'être identifié pour acceder a cette page ! </h1>
    <a type="button" class="btn btn-primary" href="index.php">Se connecter</a>
</div>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>