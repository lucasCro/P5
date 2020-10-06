<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- responsive propre a bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- fontawesome  -->
    <script src="https://kit.fontawesome.com/fd2a85a727.js" crossorigin="anonymous"></script>
    <!-- googlefont  -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <!-- bootstrap version basique -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
    <!-- bootstrap them cerulan -->
    <link href="public/bootstrap.min.css" rel="stylesheet" />
    <!-- calendar -->
    <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
    <link href='public/calendar/lib/main.css' rel='stylesheet' />
    <!-- mon css  -->
    <link rel="stylesheet" href="public/style.css">
    <title>TriB(ao)us</title>
</head>

<body>
    <!-- header -->
    <header>
        <div class="container-fluid bg-primary fixed-top">
            <div class="container">
                <div class="row">
                    <!-- nav bar en responsive -->
                    <nav class="col navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">TriB(ao)us</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div id="navbarContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item active"><a class="nav-link" href=""><i class="fas fa-home"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href=""><i class="far fa-calendar-alt"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-images"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-user-circle"></i></a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Corps de page  -->

    <!-- AUTHENTIFICATION -->
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-around">
                <!-- formulaire d'authentification -->
                <div class="col-4 bg-light p-3 rounded">
                    <form method="POST">
                        <div class="form-group">
                            <h2>Authentification</h2>
                            <input type="text" class="form-control" placeholder="Entrez votre pseudo">
                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
                            <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
                        </div>
                    </form>
                </div>
                <!-- formulaire de création de compte -->
                <div class="col-4 bg-light p-3 rounded">
                    <form method="POST">
                        <div class="form-group">
                            <h2>Pas encore inscrit ?</h2>
                            <input type="text" class="form-control" placeholder="Entrez votre pseudo">
                            <input type="password" class="form-control" placeholder="Entrez votre mot de passe">
                            <button type="submit" class="btn btn-primary mt-1">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ACCUEIL -->
    <section id="home">
        <div class="container-fluid mt-3">
            <div class="container">
                <h1>Bienvenue sur Tri Baous !</h1>
                <p>Ici tu pourras consulter votre agenda pour savoir ce qu'il y a de prévu, partager des photos et consulter ton profil !</p>
            </div>
        </div>
    </section>


    <!-- AGENDA -->
    <section id="myCalendar">
        <div class="container-fluid mt-3">
            <div class="container">
                <div class="row alert alert-success alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading">Prérequis</h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
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

    <!-- ADMINISTRATEUR -->
    <section>
        <div class="container-fluid">
            <div class="container">
                <h1>Administrateur</h1>
                <div class="row justify-content-center mt-5">
                    <button class="btn btn-primary mr-3">
                        Gestion des membres
                    </button>
                    <button class="btn btn-primary">
                        Gestion des evenements
                    </button>
                </div>
                <!-- div affichage membres -->
                <div class="row justify-content-around mt-5">
                    <div class="col-3 card">
                        <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                        <div class="card-body">
                            Membre 1
                        </div>
                    </div>
                    <div class="col-3 card">
                        <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                        <div class="card-body">
                            Membre 2
                        </div>
                    </div>
                    <div class="col-3 card">
                        <img class="card-img-top" src="public/images/imgProfil.jpg" alt="photo de profil">
                        <div class="card-body">
                            Membre 3
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="mt-5">
        <div class="container-fluid bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <p class="text-light">Site dans le cadre d'un projet scolaire, tout les droits d'image ou de texte ne m'appartiennent pas</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- script javascript API full calendar -->
    <script src='public/calendar/lib/main.js'></script>
    <!-- mon js -->
    <script src='public/calendar.js'></script>
    <script src='public/main.js'></script>
    <!-- script bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>