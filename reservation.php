<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        nav{
            background: #fff;
            box-shadow: 0 3px 5px #0000001f;
            text-transform: uppercase;
        }
        header a:hover{
            border-bottom: solid 2px orange;
        }
        .Bienvenu{
            color: orange;
            font-family: Edwardian Script ITC Regular; 
            font-size: 60px;
            font-weight: 500;
        }
        .SUBLIMINAL{
        font-size: 50px;
        font-weight: bolder;
        color: #fff;
        }
        .RESTO{
            font-size: 20px;
            font-weight: 300;
            color: #fff;
        }
        body{
          background: url("img/news-bg.jpg");
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
        }
        header{
          background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),  url("img/reservation.jpg");
          background-repeat: no-repeat;
          background-size: cover;
          height: 100vh;
        }
        form{
          margin: auto;
          width: 930px;
          margin-top: 50px;
        }
        input,
        select,
        button{
          padding: 7px;
        }
        button{
          border: 0;
          background: orange;
        }
        input,
        select{
          border: 1px gray solid;
          background: #00000034;
          color: white;
        }
        input::placeholder{
          color: white;
          font-weight: 300;
        }
        select{
          color: white;
        }
        #datte{
          color: white;
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
            Faites une réservation
          </span><br>
          <span class="SUBLIMINAL">
            THE SUBLIMINAL
          </span><br>
          <span class="RESTO">
            RESTO A L'AFRICAINE
          </span>
        </center>
        <section>
       <form action="">
        <center>
             <h3 style="color: orange; font-family: Edwardian Script ITC Regular; font-size: 50px;">
            ____ <br>
            Réservation
          </h3>
          <span id="verif_msg">

          </span>
          <input type="text" name="nom" id="nom" placeholder="nom">
          <select name="selectionner" id="selection">
            <option value="1personne">
              Pour une personne
            </option>
            <option value="2personnes">
              Pour 2 personnes
            </option>
            <option value="3personnes">
              Pour 3 personnes
            </option>
            <option value="famille">
              Pour la famille
            </option>
            <option value="famille">
              Mariage
            </option>
            <option value="famille">
              Anniversaire
            </option>
          </select>
          <input type="datetime-local" name="datte" id="datte"><br><br>
          <button type="button" onclick="verif_nom()">
            Réserver une table
          </button>
        </center>
       </form> 
    </section>
    </header>
    <script type="text/javascript">
      function verif_nom(){
        var nom = document.getElementById("nom").value;
          if (nom.length <= 0){
            document.getElementById("verif_msg").innerHTML = "Nom obligatoire";
            document.getElementById("verif_msg").style.color = "red";
          }
          else{
            document.getElementById("verif_msg").style.display = "none";
          }
      }
    </script>
</body>
</html>