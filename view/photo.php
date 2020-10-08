<!-- PHP -->
<?php
// affectation de la variable title (utilisé dans le template)
$title = "Photo";
// creation de la variable body (utilisé dans le template), debut:
ob_start();
?>
<!-- HTML -->
<!-- PHOTO -->
<section id="pictures">
    <div class="container-fluid">
        <div class="container">
            <h1>Photos</h1>
            <div class="row justify-content-around">
                <div class="card col-3">
                    <img class="card-img-top" src="public/images/pic1.jpg" alt="photo de vacance">
                    <div class="card-body">
                        Montagne
                    </div>
                </div>
                <div class="card col-3">
                    <img class="card-img-top" src="public/images/pic2.jpg" alt="photo de vacance">
                    <div class="card-body">
                        Italie
                    </div>
                </div>
                <div class="card col-3">
                    <img class="card-img-top" src="public/images/pic3.jpg" alt="photo de vacance">
                    <div class="card-body">
                        Afrique
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