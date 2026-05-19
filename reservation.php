<?php

include 'connexion_db/connexion.php';

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = trim($_POST['nom'] ?? '');
    $nbre_personne = $_POST['selectionner'] ?? '';
    $date_heure = str_replace('T', ' ', $_POST['datte'] ?? '');

    if ($nom === '' || $nbre_personne === '' || $date_heure === '') {
        $message = "Veuillez remplir tous les champs.";
        $message_type = "error";
    } else {
        $sql = "INSERT INTO reservation(nom_client, nbre_personnes, date_reservation) VALUES (?, ?, ?)";

        $stmt = $connexion->prepare($sql);

        if ($stmt->execute([$nom, $nbre_personne, $date_heure])) {
            $message = "Réservation enregistrée avec succès.";
            $message_type = "success";
        } else {
            $message = "Erreur lors de la réservation.";
            $message_type = "error";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
          max-width: 930px;
          width: 90%;
          margin-top: 10px;
          background: rgba(0, 0, 0, 0.35);
          padding: 28px;
          border-radius: 12px;
        }
        .form-fields{
          display: grid;
          grid-template-columns: repeat(3, minmax(180px, 1fr));
          gap: 12px;
        }
        input,
        select,
        button{
          padding: 12px;
          border-radius: 6px;
        }
        button{
          border: 0;
          background: orange;
          color: white;
          font-weight: bold;
          cursor: pointer;
          min-width: 220px;
          transition: 0.3s;
        }
        button:hover{
          background: #e67e22;
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
        option{
          color: #333;
        }
        #datte{
          color: white;
        }
        .message{
          display: block;
          margin-bottom: 15px;
          font-weight: bold;
        }
        .message.success{
          color: #28a745;
        }
        .message.error{
          color: #ff4d4d;
        }
        @media screen and (max-width: 800px){
          header{
            height: auto;
            min-height: 100vh;
            padding-bottom: 40px;
          }
          .form-fields{
            grid-template-columns: 1fr;
          }
          .SUBLIMINAL{
            font-size: 36px;
          }
          .Bienvenu{
            font-size: 48px;
          }
        }
    </style>
</head>
<body>
    <header>
        <?php include 'entete.php';?>
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
       <form action="" method="POST" id="reservationForm">
        <center>
             <h3 style="color: orange; font-family: Edwardian Script ITC Regular; font-size: 50px;">
            ____ <br>
            Réservation
          </h3>
          <?php if ($message !== ''): ?>
            <span class="message <?= $message_type ?>">
              <?= htmlspecialchars($message) ?>
            </span>
          <?php endif; ?>
          <span id="verif_msg" class="message error">

          </span>
          <div class="form-fields">
            <input type="text" name="nom" id="nom" placeholder="Nom" required>
            <select name="selectionner" id="selection" required>
              <option value="">
                Choisir le nombre de personnes
              </option>
              <option value="1 personne">
                Pour une personne
              </option>
              <option value="2 personnes">
                Pour 2 personnes
              </option>
              <option value="3 personnes">
                Pour 3 personnes
              </option>
              <option value="Famille">
                Pour la famille
              </option>
              <option value="Mariage">
                Mariage
              </option>
              <option value="Anniversaire">
                Anniversaire
              </option>
            </select>
            <input type="datetime-local" name="datte" id="datte" required>
          </div>
          <br>
          <button type="submit">
            Réserver une table
          </button>
        </center>
       </form> 
    </section>
    </header>
    <script type="text/javascript">
      document.getElementById("reservationForm").addEventListener("submit", function(event){
        var nom = document.getElementById("nom").value;
        var selection = document.getElementById("selection").value;
        var datte = document.getElementById("datte").value;

          if (nom.trim().length <= 0){
            event.preventDefault();
            document.getElementById("verif_msg").innerHTML = "Nom obligatoire";
            document.getElementById("verif_msg").style.color = "red";
          }
          else if (selection.length <= 0){
            event.preventDefault();
            document.getElementById("verif_msg").innerHTML = "Veuillez choisir le nombre de personnes";
            document.getElementById("verif_msg").style.color = "red";
          }
          else if (datte.length <= 0){
            event.preventDefault();
            document.getElementById("verif_msg").innerHTML = "Veuillez choisir la date et l'heure";
            document.getElementById("verif_msg").style.color = "red";
          }
          else{
            document.getElementById("verif_msg").innerHTML = "";
          }
      });
    </script>
</body>
</html>
