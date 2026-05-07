<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>

    header{
      background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)),
      url("img/eggs.jpg");

      height: 90vh;
      background-attachment: fixed;
      background-repeat: no-repeat;
      background-size: cover;
    }

    /* ===== LIENS NAVBAR ===== */

    .navbar .nav-link{
      color: white !important;
      text-transform: uppercase;
      transition: 0.3s;
    }

    .navbar .nav-link:hover{
      /* color: orange !important; */
      border-bottom: solid 2px orange;
    }

    .navbar-brand{
      color: white !important;
      font-weight: bold;
    }

    /* ===== TEXTES HEADER ===== */

    .RESTO,
    .SUBLIMINAL{
      color: white;
    }

    .Bienvenu{
      color: orange;
      font-size: 60px;
      font-weight: 500;
      font-family: Edwardian Script ITC Regular;
    }

    .SUBLIMINAL{
      font-size: 50px;
      font-weight: bolder;
    }

    .RESTO{
      font-size: 20px;
      font-weight: 300;
    }

    /* ===== IMAGES ===== */

    .myimg{
      height: 400px;
      width: 325px;
    }

    img{
      border-radius: 10px;
    }

    /* ===== CONTENU ===== */

    .decouvrez{
      color: orange;
      font-family: Edwardian Script ITC Regular;
      font-size: 50px;
    }

    .bouton{
      text-decoration: none;
      color: orange;
    }

    .text{
      font-weight: 600;
      color: gray;
      text-transform: uppercase;
      font-size: 40px;
    }

    /* ===== FOOTER ===== */

    footer{
      background: #0000001f;
      margin-bottom: 0;
      text-align: center;
      padding: 10px;
    }

    /* ===== BODY ===== */

    body{
      background: url("img/news-bg.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }

  </style>
</head>

<body>

<header>

  <?php include 'entete.php';?>

  <center>
    <span class="Bienvenu">
      Bienvenu
    </span><br>

    <span class="SUBLIMINAL">
      THE SUBLIMINAL
    </span><br>

    <span class="RESTO">
      RESTO A L'AFRICAINE
    </span>
  </center>

</header>

<section class="row container m-auto pt-5">

  <div class="col-12 col-md-6 col-lg-6">
    <img src="img/burger.jpg" alt="" class="img-fluid myimg">
  </div>

  <div class="col-12 col-md-6 col-lg-6">

    <h2 class="decouvrez">
      ____ <br>
      Découvrez
    </h2>

    <span class="text">
      Notre Gastronomie
    </span><br><br>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Magni blanditiis quisquam consequuntur aspernatur expedita nobis?
    </p>

    <a href="#" class="bouton">
      Voir plus >
    </a>

  </div>

</section>

<section class="row container m-auto pt-5">

  <div class="col-12 col-md-6 col-lg-7">

    <h2 class="decouvrez">
      ___ <br>
      Délicieux
    </h2>

    <span class="text">
      Des récettes faites avec amour
    </span><br><br>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Magni blanditiis quisquam consequuntur aspernatur expedita nobis?
    </p>

    <a href="#" class="bouton">
      Voir plus >
    </a>

  </div>

  <div class="col-12 col-md-6 col-lg-5">
    <img src="img/crusted-chicken.jpg" alt="" class="img-fluid">
  </div>

</section>

<br><br><br>

<footer>

  THE SUBLIMINAL

  <span><br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Praesentium ab odio repellat.
  </span>

  <hr>

  <span>
    Contacts : +243 975783421
  </span><br>

  &copy; 2025 projet final developpement web 1

</footer>

</body>
</html>