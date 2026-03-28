<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
        img{
            width: 100%;
            border-radius: 10px;
        }
        .oeufs{
            width: 500px;
            background: #ffffff;
            box-shadow: 0 3px 5px #0000001f;
            border-radius: 20px;
            padding-bottom: 20px;
            margin: auto;
        }
        .section1{
            padding-top: 50px;
            margin: auto;
            gap: 25px;
        }
        .monlien{
            background: orange;
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #000;
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
    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index.html">THE SUBLIMINAL</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.html">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="recettes.html">Recettes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="apropos.html">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="reservation.html">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="contact.html">Nous contacter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>
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
  <section class="container section1 row">
    <article class="oeufs col-12 col-md-5 col-lg-6 pt-3">
        <img src="img/salad-chicken.jpg" alt="les oeufs" class="img-fluid">
        <h4 class="pt-3">
            Salades au Poulet
        </h4>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, odio saepe? Saepe sequi velit natus.
        </p>
        <a href="#" class="monlien">
            Commander
        </a>
    </article>
    <article class="oeufs col-12 col-md-5 col-lg-6 pt-3">
        <img src="img/burger.jpg" alt="les oeufs" class="img-fluid">
        <h4 class="pt-3">
            Un cheese burger
        </h4>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, odio saepe? Saepe sequi velit natus.
        </p>
        <a href="#" class="monlien">
            Commander
        </a>
    </article>
  </section>
  <section class="container section1 row">
    <article class="oeufs col-12 col-md-5 col-lg-6 pt-3">
        <img src="img/crusted-chicken.jpg" alt="les oeufs" class="img-fluid">
        <h4 class="pt-3">
            Poulet à la salade
        </h4>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, odio saepe? Saepe sequi velit natus.
        </p>
        <a href="#" class="monlien">
            Commander
        </a>
    </article>
    <article class="oeufs col-12 col-md-5 col-lg-6 pt-3">
        <img src="img/eggs.jpg" alt="les oeufs" class="img-fluid">
        <h4 class="pt-3">
            Les oeufs boullies aux salades
        </h4>
        <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo, odio saepe? Saepe sequi velit natus.
        </p>
        <a href="#" class="monlien">
            Commander
        </a>
    </article>
  </section><br><br><br>
   <footer>
    THE SUBLIMINAL 
    <span><br>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ab odio repellat, accusantium <br>libero veniam quod nihil aliquam vel consequuntur.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ab odio repellat, accusantium <br>libero veniam quod nihil aliquam vel consequuntur.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ab odio repellat, accusantium <br>libero veniam quod nihil aliquam vel consequuntur.
    </span>
    <hr>
        <span>
            Contacts : +243 975783421
        </span><br>
        &copy; 2025 projet final developpement web 1
  </footer>
</body>
</html>