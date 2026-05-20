<?php
session_start();
require '../connexion_db/connexion.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['mdp'])) {
    header("Location: authentification.php");
    exit();
}

$message = "";
$message_type = "";
$formats_autorises = ['image/jpeg' => 'jpg', 'image/png' => 'png'];
$dossier_upload = __DIR__ . '/uploads_recettes/';
$recette_a_modifier = null;

function supprimer_image_recette($image)
{
    $prefixe = 'admin/uploads_recettes/';

    if (strpos($image, $prefixe) !== 0) {
        return;
    }

    $chemin = __DIR__ . '/uploads_recettes/' . basename($image);

    if (is_file($chemin)) {
        @unlink($chemin);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? 'create';
    $titre = trim($_POST['titre'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $photo = $_FILES['photo'] ?? null;

    if ($action === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {
            $message = "Recette introuvable.";
            $message_type = "error";
        } else {
            $requete = $connexion->prepare("SELECT image FROM recettes WHERE id = ?");
            $requete->execute([$id]);
            $recette = $requete->fetch(PDO::FETCH_ASSOC);

            if (!$recette) {
                $message = "Recette introuvable.";
                $message_type = "error";
            } else {
                $suppression = $connexion->prepare("DELETE FROM recettes WHERE id = ?");

                if ($suppression && $suppression->execute([$id])) {
                    supprimer_image_recette($recette['image']);
                    $message = "Recette supprimée avec succès.";
                    $message_type = "success";
                } else {
                    $message = "Erreur lors de la suppression de la recette.";
                    $message_type = "error";
                }
            }
        }
    } elseif ($action === 'update') {
        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0 || $titre === '' || $description === '') {
            $message = "Veuillez remplir tous les champs obligatoires.";
            $message_type = "error";
        } else {
            $requete = $connexion->prepare("SELECT image FROM recettes WHERE id = ?");
            $requete->execute([$id]);
            $recette = $requete->fetch(PDO::FETCH_ASSOC);

            if (!$recette) {
                $message = "Recette introuvable.";
                $message_type = "error";
            } else {
                $lien_image = $recette['image'];
                $image_a_remplacer = false;

                if ($photo && $photo['error'] !== UPLOAD_ERR_NO_FILE) {
                    if ($photo['error'] !== UPLOAD_ERR_OK) {
                        $message = "Erreur lors de l'upload de l'image.";
                        $message_type = "error";
                    } else {
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $type_fichier = finfo_file($finfo, $photo['tmp_name']);
                        finfo_close($finfo);

                        if (!array_key_exists($type_fichier, $formats_autorises)) {
                            $message = "Format invalide. Seules les images JPEG et PNG sont autorisées.";
                            $message_type = "error";
                        } elseif (!is_dir($dossier_upload) || !is_writable($dossier_upload)) {
                            $message = "Le dossier d'upload n'est pas accessible en écriture.";
                            $message_type = "error";
                        } else {
                            $extension = $formats_autorises[$type_fichier];
                            $nom_fichier = uniqid('recette_', true) . '.' . $extension;
                            $chemin_destination = $dossier_upload . $nom_fichier;

                            if (@move_uploaded_file($photo['tmp_name'], $chemin_destination)) {
                                $lien_image = 'admin/uploads_recettes/' . $nom_fichier;
                                $image_a_remplacer = true;
                            } else {
                                $message = "Erreur lors de l'upload de l'image.";
                                $message_type = "error";
                            }
                        }
                    }
                }

                if ($message_type !== "error") {
                    $mise_a_jour = $connexion->prepare("UPDATE recettes SET titre = ?, description = ?, image = ? WHERE id = ?");

                    if ($mise_a_jour && $mise_a_jour->execute([$titre, $description, $lien_image, $id])) {
                        if ($image_a_remplacer) {
                            supprimer_image_recette($recette['image']);
                        }

                        $message = "Recette modifiée avec succès.";
                        $message_type = "success";
                    } else {
                        if ($image_a_remplacer) {
                            supprimer_image_recette($lien_image);
                        }

                        $message = "Erreur lors de la modification de la recette.";
                        $message_type = "error";
                    }
                }

                if ($message_type === "error") {
                    $recette_a_modifier = [
                        'id' => $id,
                        'titre' => $titre,
                        'description' => $description,
                        'image' => $recette['image']
                    ];
                }
            }
        }
    } elseif ($titre === '' || $description === '' || !$photo || $photo['error'] !== UPLOAD_ERR_OK) {
        $message = "Veuillez remplir tous les champs et choisir une photo.";
        $message_type = "error";
    } else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $type_fichier = finfo_file($finfo, $photo['tmp_name']);
        finfo_close($finfo);

        if (!array_key_exists($type_fichier, $formats_autorises)) {
            $message = "Format invalide. Seules les images JPEG et PNG sont autorisées.";
            $message_type = "error";
        } elseif (!is_dir($dossier_upload) || !is_writable($dossier_upload)) {
            $message = "Le dossier d'upload n'est pas accessible en écriture.";
            $message_type = "error";
        } else {
            $extension = $formats_autorises[$type_fichier];
            $nom_fichier = uniqid('recette_', true) . '.' . $extension;
            $chemin_destination = $dossier_upload . $nom_fichier;
            $lien_image = 'admin/uploads_recettes/' . $nom_fichier;

            if (@move_uploaded_file($photo['tmp_name'], $chemin_destination)) {
                $requete = $connexion->prepare("INSERT INTO recettes(titre, description, image) VALUES (?, ?, ?)");

                if ($requete && $requete->execute([$titre, $description, $lien_image])) {
                    $message = "Recette publiée avec succès.";
                    $message_type = "success";
                } else {
                    $message = "Erreur lors de l'enregistrement de la recette. Vérifiez que la table recettes existe.";
                    $message_type = "error";
                }
            } else {
                $message = "Erreur lors de l'upload de l'image.";
                $message_type = "error";
            }
        }
    }
}

if (isset($_GET['modifier'])) {
    $id_modifier = (int) $_GET['modifier'];

    if ($id_modifier > 0) {
        $requete = $connexion->prepare("SELECT id, titre, description, image FROM recettes WHERE id = ?");
        $requete->execute([$id_modifier]);
        $recette_a_modifier = $requete->fetch(PDO::FETCH_ASSOC);

        if (!$recette_a_modifier && $message === '') {
            $message = "Recette introuvable.";
            $message_type = "error";
        }
    }
}

$recettes = [];
$requete = $connexion->query("SELECT id, titre, description, image, date_publication FROM recettes ORDER BY date_publication DESC");

if ($requete) {
    $recettes = $requete->fetchAll(PDO::FETCH_ASSOC);
} elseif ($message === '') {
    $message = "La table recettes n'existe pas encore. Exécutez la requête SQL fournie.";
    $message_type = "error";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Resto - Recettes</title>
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

        .panel {
            background: var(--white);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }

        form {
            display: grid;
            gap: 14px;
            max-width: 720px;
        }

        label {
            font-weight: 600;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: inherit;
            box-sizing: border-box;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        button {
            width: fit-content;
            border: 0;
            background: var(--primary);
            color: var(--white);
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .cancel-link {
            color: var(--dark);
            font-weight: 600;
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

        .thumb {
            width: 110px;
            height: 76px;
            object-fit: cover;
            border-radius: 8px;
        }

        .message {
            display: inline-block;
            margin-bottom: 16px;
            font-weight: bold;
        }

        .message.success {
            color: #155724;
        }

        .message.error {
            color: #b00020;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 24px;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 6px;
            color: var(--white);
            font-size: 18px;
            line-height: 1;
            cursor: pointer;
        }

        .edit-btn {
            background: #2980b9;
        }

        .delete-btn {
            background: #c0392b;
            padding: 0;
        }

        .delete-form {
            display: inline;
            max-width: none;
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
            <a href="recettes.php"><li class="active">Recettes (Plats)</li></a>
            <a href="messages.php"><li>Messages</li></a>
            <a href="reservations.php"><li>Réservations</li></a>
            <a href="deconnexion.php"><li>Se deconnecter</li></a>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Recettes</h1>
            <div class="user-info">Admin : <?= htmlspecialchars($_SESSION['admin']) ?></div>
        </div>

        <div class="panel">
            <h3><?= $recette_a_modifier ? 'Modifier une recette' : 'Publier une recette' ?></h3>
            <?php if ($message !== ''): ?>
                <span class="message <?= $message_type ?>"><?= htmlspecialchars($message) ?></span>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="<?= $recette_a_modifier ? 'update' : 'create' ?>">
                <?php if ($recette_a_modifier): ?>
                    <input type="hidden" name="id" value="<?= (int) $recette_a_modifier['id'] ?>">
                <?php endif; ?>

                <div>
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" maxlength="150" value="<?= htmlspecialchars($recette_a_modifier['titre'] ?? '') ?>" required>
                </div>

                <div>
                    <label for="description">Description courte</label>
                    <textarea name="description" id="description" maxlength="255" required><?= htmlspecialchars($recette_a_modifier['description'] ?? '') ?></textarea>
                </div>

                <div>
                    <label for="photo">Photo JPEG ou PNG<?= $recette_a_modifier ? ' (optionnelle)' : '' ?></label>
                    <?php if ($recette_a_modifier): ?>
                        <p><img src="../<?= htmlspecialchars($recette_a_modifier['image']) ?>" alt="<?= htmlspecialchars($recette_a_modifier['titre']) ?>" class="thumb"></p>
                    <?php endif; ?>
                    <input type="file" name="photo" id="photo" accept="image/jpeg,image/png" <?= $recette_a_modifier ? '' : 'required' ?>>
                </div>

                <div class="form-actions">
                    <button type="submit"><?= $recette_a_modifier ? 'Enregistrer' : 'Publier' ?></button>
                    <?php if ($recette_a_modifier): ?>
                        <a class="cancel-link" href="recettes.php">Annuler</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="panel">
            <h3>Recettes publiées</h3>
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($recettes) > 0): ?>
                        <?php foreach ($recettes as $recette): ?>
                            <tr>
                                <td><img src="../<?= htmlspecialchars($recette['image']) ?>" alt="<?= htmlspecialchars($recette['titre']) ?>" class="thumb"></td>
                                <td><?= htmlspecialchars($recette['titre']) ?></td>
                                <td><?= htmlspecialchars($recette['description']) ?></td>
                                <td><?= htmlspecialchars($recette['date_publication']) ?></td>
                                <td>
                                    <div class="actions">
                                        <a class="icon-btn edit-btn" href="recettes.php?modifier=<?= (int) $recette['id'] ?>" title="Modifier" aria-label="Modifier la recette">&#9998;</a>
                                        <form class="delete-form" action="" method="POST" onsubmit="return confirm('Supprimer cette recette ?');">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= (int) $recette['id'] ?>">
                                            <button class="icon-btn delete-btn" type="submit" title="Supprimer" aria-label="Supprimer la recette">&#128465;</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="empty" colspan="5">Aucune recette publiée.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
