<?php
session_start();
require '../connexion_db/connexion.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['mdp'])) {
    header("Location: authentification.php");
    exit();
}

$requete = $connexion->query("SELECT nom_client, email, message FROM contacts ORDER BY nom_client ASC");
$messages = $requete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Resto - Messages</title>
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
            vertical-align: top;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: var(--light);
        }

        .message {
            line-height: 1.5;
            max-width: 520px;
            white-space: pre-wrap;
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
            <a href="messages.php"><li class="active">Messages</li></a>
            <a href="reservations.php"><li>Réservations</li></a>
            <a href="deconnexion.php"><li>Se deconnecter</li></a>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Messages</h1>
            <div class="user-info">Admin : <?= htmlspecialchars($_SESSION['admin']) ?></div>
        </div>

        <div class="table-container">
            <h3>Messages reçus</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nom du client</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($messages) > 0): ?>
                        <?php foreach ($messages as $message): ?>
                            <tr>
                                <td><?= htmlspecialchars($message['nom_client']) ?></td>
                                <td><?= htmlspecialchars($message['email']) ?></td>
                                <td class="message"><?= htmlspecialchars($message['message']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="empty" colspan="3">Aucun message enregistré.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
