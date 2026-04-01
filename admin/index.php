<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Resto - Dashboard</title>
    <style>
        /* Variables de couleurs pour personnalisation facile */
        :root {
            --primary: #e67e22; /* Orange gourmand */
            --dark: #2c3e50;
            --light: #f4f7f6;
            --white: #ffffff;
            --text: #333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            display: flex;
            height: 100vh;
            background-color: var(--light);
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--dark);
            color: var(--white);
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 { text-align: center; color: var(--primary); }

        .nav-links { list-style: none; padding: 0; margin-top: 30px; }

        .nav-links li {
            padding: 15px;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 8px;
        }

        .nav-links li:hover { background-color: var(--primary); }

        /* Main Content */
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

        /* Cards Statistiques */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: var(--white);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card h3 { margin: 0; color: var(--primary); font-size: 2rem; }

        /* Tableau des commandes */
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

        th { background-color: var(--light); }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        .status-ready { background: #d4edda; color: #155724; }
        .status-pending { background: #fff3cd; color: #856404; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>RestoAdmin</h2>
        <ul class="nav-links">
            <li>Tableau de bord</li>
            <li>Menu (Plats)</li>
            <li>Commandes</li>
            <li>Réservations</li>
            <li>Paramètres</li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Vue d'ensemble</h1>
            <div class="user-info">Admin : Jean Bon</div>
        </div>

        <div class="stats-grid">
            <div class="card">
                <p>Commandes</p>
                <h3>24</h3>
            </div>
            <div class="card">
                <p>Chiffre d'Affaire</p>
                <h3>1 250€</h3>
            </div>
            <div class="card">
                <p>Nouveaux Clients</p>
                <h3>12</h3>
            </div>
        </div>

        <div class="table-container">
            <h3>Dernières Commandes</h3>
            <table>
                <thead>
                    <tr>
                        <th>Table</th>
                        <th>Commande</th>
                        <th>Prix</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Table 5</td>
                        <td>Burger Deluxe + Frites</td>
                        <td>18.50€</td>
                        <td><span class="status status-ready">Prêt</span></td>
                    </tr>
                    <tr>
                        <td>Table 2</td>
                        <td>Pizza Margherita</td>
                        <td>12.00€</td>
                        <td><span class="status status-pending">En cuisine</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>