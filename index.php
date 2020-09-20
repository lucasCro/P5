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
    <!-- calendar -->
    <link href='public/calendar/lib/main.css' rel='stylesheet' />
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- mon css  -->
    <link rel="stylesheet" href="public/style.css">
    <title>Tri Baous</title>
</head>

<body>
    <!-- header -->
    <header>
        <nav class="container-fluid">
            <div class="container">
                <ul class="row">
                    <li class="col"><a href=""><i class="fas fa-home"></i></a></li>
                    <li class="col"><a href=""><i class="far fa-calendar-alt"></i></a></li>
                    <li class="col"><a href=""><i class="fas fa-images"></i></a></li>
                    <li class="col"><a href=""><i class="fas fa-user-circle"></i></li></a>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Corps de page  -->
    <section class="container-fluid">
        <div class="container">
            <div class="row">
                <!-- menu de navigation secondaire contextuel -->
                <nav class="col-4">
                    <ul>
                        <li><button>Créé un évenement</button></li>
                        <li><button>Evenements disponibles</button></li>
                        <li><button>Tous les evenements</button></li>
                        <li><button>Gerer mes groupes d'amis</button></li>
                    </ul>
                </nav>

                <div class="col-8">
                    <h1>Mon agenda</h1>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="container">
            <p class="row">Site dans le cadre d'un projet scolaire, tout les droits d'image ou de texte ne m'appartiennent pas</p>
        </div>
    </footer>


    <!-- script javascript API full calendar -->
    <script src='public/calendar/lib/main.js'></script>
    <script src='public/calendar.js'></script>
    <!-- script bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>