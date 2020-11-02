<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Agenda";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- AGENDA -->
<section id="myCalendar">
    <div class="container-fluid mt-3">
        <div class="container">
            <h1>Mon agenda</h1>
            <div class="row mt-3">
                <!-- menu contextuel -->
                <div class="col-1 mx-auto my-auto">
                    <form method="POST">
                        <!-- bouton ajouter evenement -->
                        <button type="submit" class="btn btn-primary p-2" title="Ajouter un evenement" id="btnAddEvent" name="btnAddEvent">
                            <i class="fas fa-calendar-plus fa-2x"></i>
                        </button>
                    </form>
                </div>

                <div class="col-11">
                    <div class="row mt-4" id="calendar"></div>
                </div>
            </div>
            <div class="row">
                <form>
                    <div class="form-group">
                        <h1>Création d'un evenement :</h1>
                        <fieldset>
                            <legend>Evenement :</legend>
                            <label for="eventName">Nom de l'evenement :</label>
                            <input type="text" class="form-control" id="eventName">
                            <label for="eventLocalisation">localisation de l'evenement :</label>
                            <input type="text" class="form-control" id="eventLocalisation">
                            <label for="eventStart">Debut :</label>
                            <input type="date" class="form-control" id="eventStart">
                            <label for="eventEnd">Fin :</label>
                            <input type="date" class="form-control" id="eventEnd">
                            <label for="eventDescription">Description :</label>
                            <textarea class="form-control" id="eventDescription"></textarea>
                        </fieldset>
                        <fieldset>
                            <legend>Participants :</legend>
                            <div class="container">
                                <?php
                                if (isset($allMember)) {
                                    while ($infos = $allMember->fetch()) {
                                        if ($infos['id'] != $_SESSION['id']) {

                                ?>

                                            <div class="row mb-1">
                                                <label for="eventMember" class="form-check-label col-4"><?= $infos['nom'] . ' ' . $infos['prenom']; ?></label>
                                                <input type="checkbox" class="form-check-input col-4" id="eventMember" name="<?= $infos['id']; ?>">
                                            </div>



                                <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-1" id="btnCreatEvent">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>