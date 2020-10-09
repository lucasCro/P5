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
            <form action="POST">
                <div class="group-form">
                    <h1>Mon profil</h1>
                    <label for="pseudo">Mon pseudo :</label>
                    <input type="text" class="form-control" placeholder="<?= $_SESSION['pseudo']; ?>" id="pseudo">
                    <label for="prenom">Mon prénom :</label>
                    <input type="text" class="form-control" placeholder="<?= $_SESSION['prenom']; ?>" id="prenom">
                    <label for="nom">Mon nom :</label>
                    <input type="text" class="form-control" placeholder="<?= $_SESSION['nom']; ?>" id="nom">
                    <label for="mail">Mon pseudo :</label>
                    <input type="mail" class="form-control" placeholder="<?= $_SESSION['mail']; ?>" id="mail">
                    <label for="statut">Mon statut :</label>
                    <input type="text" class="form-control" placeholder="<?= $_SESSION['statut']; ?>" id="statut">
                </div>
            </form>
        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>