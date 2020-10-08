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
    <title><?= $title; ?></title>
</head>

<body>
    <!-- appel du header -->
    <?php require_once('header.php'); ?>

    <!-- appel de la variable body, changeante en fonction de la page appelée -->
    <?= $body; ?>

    <!-- appel du footer -->
    <?php require_once('footer.php'); ?>

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