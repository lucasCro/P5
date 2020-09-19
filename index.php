<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href='public/calendar/lib/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="public/style.css">
    <title>Ma Tribu</title>
</head>

<body>
    <!-- header -->
    <header>
        <nav class="main-nav">
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="">Agenda</a></li>
                <li><a href="">Photo</a></li>
                <li><a href=""><i class="fas fa-user-circle"></i>Profil</li></a>
            </ul>
        </nav>
        <figure id="main-slider">
            <img src="public/images/baous.jpg" alt="Les baous">
        </figure>
    </header>

    <!-- Corps de page  -->
    <section id="main-section">

        <!-- contenu changeant de la page -->
        <div class="wrapper">
            <div class="content">
                <!-- menu de navigation secondaire contextuel -->
                <nav class="second-nav">
                    <ul>
                        <li><button>Créé un évenement</button></li>
                        <li><button>Evenements disponibles</button></li>
                        <li><button>Tous les evenements</button></li>
                        <li><button>Gerer mes groupes d'amis</button></li>
                    </ul>
                </nav>

                <div class="main-object">
                    <h1>Mon agenda</h1>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    </section>

    <!-- footer -->
    <footer>
        <div class="wrapper">
            <p>Site dans le cadre d'un projet scolaire, tout les droits d'image ou de texte ne m'appartiennent pas</p>
        </div>
    </footer>


    <!-- script javascript -->
    <script src='public/calendar/lib/main.js'></script>
    <script src='public/calendar.js'></script>
</body>

</html>