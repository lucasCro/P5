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
            <input type="hidden" id="memberId" value="<?= $_SESSION['id']; ?>">

            <!-- formulaire CREATION evenement -->
            <div class="row" id="divCreateEvent">
                <form>
                    <div class="form-group">
                        <h1 class="my-3 text-center text-uppercase text-info">Création d'un evenement :</h1>
                        <fieldset>
                            <legend>Evenement :</legend>
                            <input type="hidden" id="eventCreator" value="<?= $_SESSION['id']; ?>">
                            <label for="eventName">Nom de l'evenement :</label>
                            <input type="text" class="form-control" id="eventName">
                            <label for="eventLocalisation">localisation de l'evenement :</label>
                            <input type="text" class="form-control" id="eventLocalisation">
                            <label for="eventStart">Debut :</label>
                            <input type="date" class="form-control" id="eventStart">
                            <input type="time" class="form-control" id="eventStartTime">
                            <label for="eventEnd">Fin :</label>
                            <input type="date" class="form-control" id="eventEnd">
                            <input type="time" class="form-control" id="eventEndTime">
                            <label for="eventDescription">Description :</label>
                            <textarea class="form-control" id="eventDescription"></textarea>
                        </fieldset>
                        <fieldset>
                            <legend>Participants :</legend>
                            <div class="container" id="div_memberInEvent">
                            </div>
                        </fieldset>
                        <button type="button" class="btn btn-primary backToCalendar">Retour</button>
                        <button type="button" class="btn btn-success" id="btnCreatEvent">Envoyer</button>
                    </div>
                </form>
            </div>

            <!-- fenetre qui s affiche uniquement apres CLIQUE sur un evenement -->
            <div id="infosEvent" class="mb-3">
                <h1 class="my-3 text-center text-uppercase text-info"><span id="infosEventTitle"></span></h1>
                <h3>Organisateur:</h3>
                <p><span id="infosEventCreator"></span></p>
                <h3>Desctiption:</h3>
                <p><span id="infosEventDescription"></span></p>
                <h3>Lieu:</h3>
                <p><span id="infosEventLocalisation"></span></p>
                <h3>Participants:</h3>
                <ul id="infosEventMembers" class="my-4">
                </ul>
                <input type="hidden" id="infosEventId">
                <button type="button" class="btn btn-primary backToCalendar">Retour a l'agenda !</button>
                <button type="button" class="btn btn-warning" id="btnDeleteEvents">Supprimer l'evenement</button>
                <div id="confirmation" class="my-4">
                    <p>Es tu sur de vouloir supprimer l'evenement ?</p>
                    <button type="button" class="btn btn-primary" id="back">Retour</button>
                    <button type="button" class="btn btn-warning deleteEvent">Oui</button>
                </div>
            </div>


            <!-- Partie AGENDA + BOUTON ajout evenement -->
            <div class="container-fluid mt-3" id="divAgenda">
                <h1 class="my-3 text-center text-uppercase text-info">Mon agenda</h1>
                <div class="row">
                    <!-- bouton ajouter evenement -->
                    <button type="button" class="btn btn-success p-2" title="Ajouter un evenement" id="btnAddEvent" name="btnAddEvent">
                        Ajouter un evenement
                    </button>
                </div>

                <div class="row mt-2 mb-5 mb-3" id="calendar"></div>
            </div>
        </div>
    </div>
</section>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
?>