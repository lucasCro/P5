<!-- header -->
<header>
    <div class="container-fluid fixed-top bg-dark">
        <div class="container">
                <!-- nav bar en responsive -->
                <nav class="container-fluid navbar navbar-dark navbar-expand-lg">
                    <a class="navbar-brand" href="index.php">ALaGauda</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php if (isset($_SESSION['id'])) : ?>
                        <div id="navbarContent" class="collapse navbar-collapse">
                            <ul class="navbar-nav">
                                <li class="nav-item active"><a class="nav-link" href="index.php?page=home"><i class="fas fa-home"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=calendar"><i class="far fa-calendar-alt"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=picture"><i class="fas fa-images"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="index.php?page=profil"><i class="fas fa-user-circle"></i></a></li>
                                <?php if ($_SESSION['statut'] == 'Admin') : ?>
                                    <li class="nav-item"><a class="nav-link" href="index.php?page=admin"><i class="fas fa-user-lock"></i></i></a></li>
                                <?php endif ; ?>
                            </ul>
                        </div>
                    <?php endif ; ?>
                </nav>
        </div>
    </div>
</header>