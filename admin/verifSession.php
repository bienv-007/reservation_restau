<?php
session_start();
require_once '../connexion_db/connexion.php';
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Préparer et exécuter la requête pour vérifier les informations d'identification
    $stmt = $connexion->prepare("SELECT * FROM t_admin WHERE user_name = ? AND mdp = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        // Authentification réussie
        $_SESSION['admin'] = $username; // Stocker le nom d'utilisateur dans la session
        $_SESSION['mdp'] = $password; // Stocker le mot de passe dans la session (optionnel, à éviter pour des raisons de sécurité)
        header("Location: index.php"); // Rediriger vers le tableau de bord
        exit();
    } else {
        // Authentification échouée
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}