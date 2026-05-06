<?php
// Détecter la page courante
$page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE SUBLIMINAL</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Override Bootstrap */
        .navbar-light .nav-link {
            color: inherit !important;
        }

        /* Styles par défaut */
        .custom-navbar .nav-link {
            color: black;
        }

        /* Variantes par page */
        .nav-home .nav-link {
            color: white;
        }

        .nav-recettes .nav-link {
            color: orange;
        }

        .nav-apropos .nav-link {
            color: blue;
        }

        .nav-reservation .nav-link {
            color: purple;
        }

        .nav-contact .nav-link {
            color: green;
        }

        /* Lien actif */
        .nav-link.active {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body class="<?php
    if($page == 'index.php') echo 'nav-home';
    elseif($page == 'recettes.php') echo 'nav-recettes';
    elseif($page == 'apropos.php') echo 'nav-apropos';
    elseif($page == 'reservation.php') echo 'nav-reservation';
    elseif($page == 'contact.php') echo 'nav-contact';
?>">

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
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
        </div>
    </div>
</nav>

<br><br><br>