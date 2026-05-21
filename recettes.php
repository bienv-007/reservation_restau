<?php
include 'connexion_db/connexion.php';

$requete = $connexion->query("SELECT titre, description, image FROM recettes ORDER BY date_publication DESC");
$recettes = [];

if ($requete) {
    $recettes = $requete->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .Bienvenu{
            color: orange;
            font-weight: 500;
            font-family: Edwardian Script ITC Regular; font-size: 60px;
        }
        .SUBLIMINAL{
            font-size: 50px;
            font-weight: bolder;
        }
        .RESTO{
            font-size: 20px;
            font-weight: 300;
        }
        nav{
            background: #fff;
            box-shadow: 0 3px 5px #0000001f;
            text-transform: uppercase;
        }
        header a:hover{
            border-bottom: solid 2px orange;
        }
        
        /* FORCE TOUTES LES IMAGES À LA MÊME HAUTEUR STRICTE */
        .recipe-img {
            height: 200px; /* Tu peux changer cette valeur (ex: 220px, 250px) selon tes goûts */
            object-fit: cover; /* Coupe l'image proprement sans la déformer */
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        /* FORCE TOUS LES ARTICLES À LA MÊME HAUTEUR */
        .oeufs{
            max-width: 500px;
            width: 100%;
            height: 100%; /* S'étire sur toute la hauteur de la ligne */
            background: #ffffff;
            box-shadow: 0 3px 5px #0000001f;
            border-radius: 20px;
            border: none; /* Supprime la bordure par défaut des cartes Bootstrap */
        }
        
        .section1{
            padding-top: 50px;
            margin: auto;
        }
        .monlien{
            background: orange;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            color: #000;
            display: inline-block;
            transition: background 0.2s;
        }
        .monlien:hover{
            background: rgba(255, 166, 0, 0.856);
        }
        footer{
          background: #0000001f;
          margin-bottom: 0;
          text-align: center;
          padding: 10px;
        }
        body{
          background: url("img/news-bg.jpg");
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
        }
        img:hover{
          transform: scale(1.05);
          /* transition: 0.3s; */
        }
        img{
          transition: 0.3s;
          /* overflow: hidden; */
        }
        .card{
          overflow:hidden;
        }
    </style>
</head>
<body>
  <header>
    <?php include 'entete.php';?>
    <center>
      <span class="Bienvenu">
        Recettes
      </span><br>
      <span class="SUBLIMINAL">
        THE SUBLIMINAL
      </span><br>
      <span class="RESTO">
        RESTO A L'AFRICAINE
      </span>
    </center>
  </header>

  <div class="container section1">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center">
      <?php if (count($recettes) > 0): ?>
        <?php foreach ($recettes as $recette): ?>
          <div class="col">
            <div class="card h-100 oeufs">
                <img src="<?= htmlspecialchars($recette['image']) ?>" alt="<?= htmlspecialchars($recette['titre']) ?>" class="card-img-top recipe-img">
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <h4><?= htmlspecialchars($recette['titre']) ?></h4>
                        <p><?= htmlspecialchars($recette['description']) ?></p>
                    </div>
                    <div>
                        <a href="#" class="monlien">En savoir plus</a>
                    </div>
                </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col">
          <div class="card h-100 oeufs">
            <div class="card-body p-4">
              <h4>Aucune recette publiée</h4>
              <p>Les recettes ajoutées depuis l'administration s'afficheront ici.</p>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <br><br><br>
<?php include 'footer.php';?>
</body>
</html>
