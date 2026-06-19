<?php 
try {
    // notre chaine de connexion
    $connexion = new Pdo("mysql:host=localhost;dbname=db_reservation_restau","root",""); // chaine de connexion
} catch (PDOException $e) {
    die("erreur : ".$e->getMessage());
}