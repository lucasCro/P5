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
                <div class="col-3 mx-auto my-auto">
                    <div class="row">
                        <!-- bouton ajouter evenement -->
                        <button type="button" class="btn btn-primary p-3 m-1 col-5" title="Ajouter un evenement">
                            <i class="fas fa-calendar-plus fa-2x"></i>
                        </button>
                        <!-- bouton pour gerer les groupes -->
                        <button type="button" class="btn btn-primary p-3 m-1 col-5" title="Gerer ses groupes">
                            <i class="fas fa-users fa-2x"></i>
                        </button>
                    </div>
                    <div class="row">
                        <!-- bouton supprimer evenement -->
                        <button type="button" class="btn btn-primary p-3 m-1 col-5" title="Supprimer un evenement">
                            <i class="fas fa-calendar-minus fa-2x"></i>
                        </button>

                    </div>
                </div>

                <div class="col-9">
                    <div class="row mt-4" id="calendar"></div>
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