<?php
session_start();
require '../connexion_db/connexion.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['mdp'])) {
    header("Location: authentification.php");
    exit();
}

$requete = $connexion->query("SELECT nom_client, nbre_personnes, date_reservation FROM reservation ORDER BY date_reservation DESC");
$reservations = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Resto - Réservations</title>
    <style>
        :root {
            --primary: #e67e22;
            --dark: #2c3e50;
            --light: #f4f7f6;
            --white: #ffffff;
            --text: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
            background-color: var(--light);
            color: var(--text);
        }

        .sidebar {
            width: 250px;
            background-color: var(--dark);
            color: var(--white);
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            text-align: center;
            color: var(--primary);
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .nav-links li {
            padding: 15px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 8px;
        }

        .nav-links li:hover,
        .nav-links .active {
            background-color: var(--primary);
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .table-container {
            background: var(--white);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--light);
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 24px;
        }

        a {
            text-decoration: none;
            color: var(--light);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>RestoAdmin</h2>
        <ul class="nav-links">
            <a href="index.php"><li>Tableau de bord</li></a>
            <a href="recettes.php"><li>Recettes (Plats)</li></a>
            <a href="commandes.php"><li>Commandes</li></a>
            <a href="reservations.php"><li class="active">Réservations</li></a>
            <a href="deconnexion.php"><li>Se deconnecter</li></a>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Réservations</h1>
            <div class="user-info">Admin : <?= htmlspecialchars($_SESSION['admin']) ?></div>
        </div>

        <div class="table-container">
            <h3>Liste des réservations</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nom du client</th>
                        <th>Nombre de personnes</th>
                        <th>Date et heure</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($reservations) > 0): ?>
                        <?php foreach ($reservations as $reservation): ?>
                            <tr>
                                <td><?= htmlspecialchars($reservation['nom_client']) ?></td>
                                <td><?= htmlspecialchars($reservation['nbre_personnes']) ?></td>
                                <td><?= htmlspecialchars($reservation['date_reservation']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="empty" colspan="3">Aucune réservation enregistrée.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
