<?php
// Détecter la page courante
$page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">THE SUBLIMINAL</a>

        <button class="navbar-toggler bg-light" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarsExample07"
                aria-controls="navbarsExample07"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'index.php') ? 'active' : '' ?>" href="index.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'recettes.php') ? 'active' : '' ?>" href="recettes.php">Recettes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'apropos.php') ? 'active' : '' ?>" href="apropos.php">A propos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'reservation.php') ? 'active' : '' ?>" href="reservation.php">Reservation</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'contact.php') ? 'active' : '' ?>" href="contact.php">Nous contacter</a>
                </li>

            </ul>
            <div class="theme-switcher" aria-label="Choisir le thème">
                <button class="theme-option" type="button" data-theme-choice="system" title="Suivre le thème de l'ordinateur">Auto</button>
                <button class="theme-option" type="button" data-theme-choice="light" title="Mode clair">Clair</button>
                <button class="theme-option" type="button" data-theme-choice="dark" title="Mode sombre">Sombre</button>
            </div>
        </div>
    </div>
</nav>
