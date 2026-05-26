# Réservation Restaurant - THE SUBLIMINAL

Application web de réservation et de gestion pour le restaurant **THE SUBLIMINAL**. Le projet permet aux visiteurs de découvrir le restaurant, consulter les recettes publiées, envoyer un message, souscrire à la newsletter et effectuer une réservation. Une interface d'administration permet de suivre les réservations, consulter les messages et gérer les recettes.

## Sommaire

- [Fonctionnalités](#fonctionnalités)
- [Technologies utilisées](#technologies-utilisées)
- [Prérequis](#prérequis)
- [Installation](#installation)
- [Configuration de la base de données](#configuration-de-la-base-de-données)
- [Utilisation](#utilisation)
- [Structure du projet](#structure-du-projet)
- [Notes de sécurité](#notes-de-sécurité)
- [Auteur](#auteur)

## Fonctionnalités

### Espace public

- Page d'accueil du restaurant.
- Page de présentation du restaurant.
- Affichage des recettes publiées depuis l'administration.
- Formulaire de réservation avec nom, nombre de personnes, date et heure.
- Formulaire de contact pour envoyer un message.
- Formulaire de souscription à la newsletter.
- Navigation responsive avec Bootstrap.
- Thème clair, sombre ou automatique via `localStorage`.

### Espace administrateur

- Authentification administrateur.
- Tableau de bord avec statistiques principales :
  - nombre de messages reçus ;
  - nombre de réservations ;
  - nombre d'inscrits à la newsletter.
- Consultation des messages clients.
- Consultation des réservations.
- Gestion des recettes :
  - ajout d'une recette ;
  - modification d'une recette ;
  - suppression d'une recette ;
  - upload d'images JPEG ou PNG.

## Technologies utilisées

- **PHP** avec PDO pour l'accès à MySQL/MariaDB.
- **MySQL / MariaDB** pour la persistance des données.
- **HTML5 / CSS3 / JavaScript** pour l'interface utilisateur.
- **Bootstrap 5** via CDN pour la mise en page responsive.
- **XAMPP / LAMPP** comme environnement local recommandé.

## Prérequis si vous voulez l'essayer chez vous

Avant de lancer le projet, assurez-vous d'avoir :

- PHP 8 ou version compatible ;
- MySQL ou MariaDB ;
- Apache ;
- phpMyAdmin, optionnel mais recommandé pour importer facilement la base ;
- XAMPP ou LAMPP si vous travaillez en local.

## Installation

1. Placez le projet dans le dossier web de votre serveur local.

   Exemple avec LAMPP :

   ```bash
   /opt/lampp/htdocs/reservation_restau
   ```

   Exemple avec XAMPP sous Windows :

   ```text
   C:\xampp\htdocs\reservation_restau
   ```

2. Démarrez Apache et MySQL depuis votre environnement local.

3. Importez la base de données fournie dans le fichier :

   ```text
   db_reservation_restau.sql
   ```

4. Vérifiez la configuration de connexion dans :

   ```text
   connexion_db/connexion.php
   ```

   Configuration actuelle :

   ```php
   $connexion = new Pdo("mysql:host=localhost;dbname=db_reservation_restau", "root", "");
   ```

5. Ouvrez le projet dans votre navigateur :

   ```text
   http://localhost/reservation_restau/
   ```

## Configuration de la base de données

Le fichier `db_reservation_restau.sql` crée la base **db_reservation_restau** et les tables suivantes :

- `contacts` : messages envoyés par les visiteurs ;
- `news_letter` : emails des abonnés à la newsletter ;
- `recettes` : recettes publiées avec titre, description, image et date ;
- `reservation` : réservations effectuées par les clients ;
- `t_admin` : comptes administrateurs.

### Import avec phpMyAdmin

1. Ouvrez `http://localhost/phpmyadmin`.
2. Créez ou sélectionnez la base `db_reservation_restau`.
3. Allez dans l'onglet **Importer**.
4. Choisissez le fichier `db_reservation_restau.sql`.
5. Lancez l'importation.

### Import avec la ligne de commande

```bash
mysql -u root -p db_reservation_restau < db_reservation_restau.sql
```

Si votre utilisateur MySQL local n'a pas de mot de passe, utilisez :

```bash
mysql -u root db_reservation_restau < db_reservation_restau.sql
```

## Utilisation

### Pages publiques

- Accueil : `index.php`
- Recettes : `recettes.php`
- À propos : `apropos.php`
- Réservation : `reservation.php`
- Contact : `contact.php`

### Administration

L'interface d'administration est accessible depuis :

```text
http://localhost/reservation_restau/admin/authentification.php
```

Identifiants de démonstration présents dans le dump SQL :

```text
Nom d'utilisateur : admin
Mot de passe      : 1234
```

Après connexion, l'administrateur peut accéder au tableau de bord, aux messages, aux réservations et à la gestion des recettes.

## Structure du projet

```text
reservation_restau/
├── admin/
│   ├── authentification.php
│   ├── deconnexion.php
│   ├── index.php
│   ├── messages.php
│   ├── recettes.php
│   ├── reservations.php
│   ├── verifSession.php
│   └── uploads_recettes/
├── connexion_db/
│   └── connexion.php
├── css/
│   └── theme.css
├── img/
├── js/
│   └── theme.js
├── apropos.php
├── contact.php
├── db_reservation_restau.sql
├── entete.php
├── footer.php
├── index.php
├── recettes.php
├── reservation.php
└── README.md
```

## Notes de sécurité

Ce projet est prévu pour un environnement local ou pédagogique. Avant une mise en production, il est recommandé de :

- changer les identifiants administrateur par défaut ;
- stocker les mots de passe avec `password_hash()` et les vérifier avec `password_verify()` ;
- utiliser un utilisateur MySQL dédié avec des droits limités ;
- déplacer les identifiants de connexion dans un fichier de configuration non versionné ;
- activer HTTPS sur le serveur ;
- renforcer la validation des données côté serveur ;
- limiter la taille maximale des fichiers uploadés ;
- protéger le dossier d'upload contre l'exécution de scripts.

## Auteur

Projet réalisé dans le cadre du cours de programmation web, année académique **2025-2026**.
