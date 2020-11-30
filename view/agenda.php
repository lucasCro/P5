<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Agenda";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- AGENDA -->
<div class="container" id="sectionAgenda">
    <input type="hidden" id="memberId" value="<?= $_SESSION['id']; ?>">

    <!-- formulaire CREATION evenement -->
    <div class="row" id="divCreateEvent">
        <form>
            <div class="form-group container">
                <h1 class="my-3 text-center text-sm-normal text-md-uppercase text-info">Création d'un evenement :</h1>
                <fieldset>
                    <legend>Evenement :</legend>
                    <input type="hidden" id="eventCreator" value="<?= $_SESSION['id']; ?>">
                    <label for="eventName">Nom de l'evenement :</label>
                    <input type="text" class="form-control" id="eventName">
                    <label for="eventLocalisation">localisation de l'evenement :</label>
                    <input type="text" class="form-control" id="eventLocalisation">
                    <label for="eventStart">Date de début (format accepté: jj/mm/aaaa):</label>
                    <input type="date" class="form-control" id="eventStart">
                    <label for="eventStartTime">Heure de début (format accepté: HH:mm):</label>
                    <input type="time" class="form-control" id="eventStartTime">
                    <label for="eventEnd">Date de Fin (format accepté: jj/mm/aaaa):</label>
                    <input type="date" class="form-control" id="eventEnd">
                    <label for="eventEndTime">Heure de fin (format accepté: HH:mm):</label>
                    <input type="time" class="form-control" id="eventEndTime">
                    <label for="eventDescription">Description :</label>
                    <textarea class="form-control" id="eventDescription"></textarea>
                </fieldset>
                <fieldset>
                    <legend>Participants :</legend>
                    <div class="container" id="div_memberInEvent">
                    </div>
                </fieldset>
                <button type="button" class="btn btn-primary backToCalendar col-sm-12 col-lg-0 my-1">Retour</button>
                <button type="button" class="btn btn-success col-sm-12 col-lg-0 my-1" id="btnCreatEvent">Envoyer</button>
            </div>
        </form>
    </div>

    <!-- fenetre INFORMATIONS qui s affiche uniquement apres clique sur un evenement -->
    <div id="infosEvent" class="mb-3 bg-light p-3 rounded align-items-center">
        <h1 class="my-3 text-info"><span id="infosEventTitle"></span></h1>
        <h3>Organisateur:</h3>
        <p><span id="infosEventCreator"></span></p>
        <h3>Desctiption:</h3>
        <p><span id="infosEventDescription"></span></p>
        <h3>Lieu:</h3>
        <p><span id="infosEventLocalisation"></span></p>
        <h3>Participants:</h3>
        <ul id="infosEventMembers" class="mb-4 mt-2">
        </ul>
        <input type="hidden" id="infosEventId">
        <button type="button" class="btn btn-primary backToCalendar">Retour a l'agenda !</button>
        <button type="button" class="btn btn-warning" id="btnDeleteEvents">Supprimer l'evenement</button>
        <div id="confirmation" class="my-4">
            <p>Es tu sur de vouloir supprimer l'evenement ?</p>
            <button type="button" class="btn btn-primary" id="back">Retour</button>
            <button type="button" class="btn btn-warning deleteEvent">Oui</button>
        </div>
        <div class="mt-2">
            <h5 class="text-dark">Votre réponse actuel:</h5>
            <p><span id="participation-answer"></span></p>
            <button type="button" class="btn btn-light btn-participation" value="Oui">Je participe</button>
            <button type="button" class="btn btn-light btn-participation" value="Non">Pas disponible</button>
            <button type="button" class="btn btn-light btn-participation" value="Peut-etre">Ne sais pas encore</button>
        </div>
    </div>


    <!-- Partie AGENDA + BOUTON ajout evenement -->
    <div class="container-fluid mt-3 text-sm-normal font-weight-lighter-sm bg-light" id="divAgenda">
        <h1 class="my-3 text-center text-sm-normal text-md-uppercase text-info">Mon agenda</h1>
        <div class="row">
            <!-- bouton ajouter evenement -->
            <button type="button" class="btn btn-success p-2 my-2" title="Ajouter un evenement" id="btnAddEvent" name="btnAddEvent">
                Ajouter un evenement
            </button>
        </div>

        <div class="row container-fluid" id="calendar"></div>
    </div>
</div>

<!-- PHP -->
<?php
// fin de la variable body:
$body = ob_get_clean();
// liens JS Calendar
ob_start();
?>

<!-- script javascript API full calendar -->
<script src='public/calendar/lib/main.js'></script>
<!-- mon js -->
<script src='public/calendar.js'></script>
<script src='public/calendarEvent.js'></script>

<?php
$footer_js = ob_get_clean();
?>