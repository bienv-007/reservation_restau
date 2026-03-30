<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        nav{
            background: #ffffffd8;
            box-shadow: 0 3px 5px #0000001f;
            text-transform: uppercase;
        }
        header a:hover{
            border-bottom: solid 2px orange;
        }
        .Bienvenu{
            color: orange;
            font-weight: 500;
            font-family: Edwardian Script ITC Regular;
            font-size: 60px;
        }
        .SUBLIMINAL{
            font-size: 50px;
            font-weight: bolder;
        }
        .RESTO{
            font-size: 20px;
            font-weight: 300;
        }
        form{
            width: 500px;
            margin:auto;
            background-color: #fff;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 3px 5px #00000046;
            border-radius: 20px;
        }
        body{
            background: #f8f9fa;
            font-family: sans-serif;
        }
        input,
        textarea{
            padding: 9px;
            width: 100%;
            border-radius: 10px;
            border: 1px solid gray;
        }
        button{
            background-color: orange;
            padding: 10px;
            border: 0;
            border-radius:10px ;
            width: 100%;
        }
        button:hover{
            background: rgb(236, 155, 4);
        }
        .contact{
            font-weight: bold;
            color: orange;
        }
        a{
            text-decoration: none;
            color: #312929;
        }
        @media screen and (max-width: 740px){
            form{
                width: 70%;
            }
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
        .nav-link{
            font-size: 15px;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="index.php">THE SUBLIMINAL</a>
<button class="navbar-toggler bg-light" type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarsExample07"
        aria-controls="navbarsExample07"
        aria-expanded="false"
        aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="recettes.php">Recettes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="apropos.php">A propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="reservation.php">Reservation</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="contact.php">Nous contacter</a>
            </li>
          </ul>
        </div>
      </div>
    </nav><br><br>
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
    <form action="">
        <center>
            <span class="contact">
                Nous contacter
            </span>
        </center><br><br>
        <span id="nomErreur">

        </span>
        <input type="text" name="nom" id="nom" placeholder="Nom"><br><br>
        <span id="emailErreur">

        </span>
        <input type="email" name="email" id="email" placeholder="Email"><br><br>
        <span id="msgErreur">

        </span>
        <textarea name="message" id="message" placeholder="Ecrire un message"></textarea><br><br>
        <button type="button" onclick="nameError();emaiError();msgErreur()">
            Envoyer
        </button>
    </form><br><br><br><br>
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
    <script type="text/javascript">
        function nameError(){
            var nom = document.getElementById("nom").value;
            if (nom.length == 0){
                document.getElementById("nomErreur").innerHTML = "* Veuillez entrer votre nom";
                document.getElementById("nomErreur").style.color ="red";
            }
            else{
                document.getElementById("nomErreur").style.display ="none";
            }
        }
        function emaiError(){
            var email =document.getElementById("email").value;
            if (email.length == 0){
                document.getElementById("emailErreur").innerHTML="* Veuillez entrer votre email";
                document.getElementById("emailErreur").style.color ="red";
            }
            else{
                document.getElementById("nomErreur").style.display ="none";
            }
        }
        function msgErreur(){
            var msg =document.getElementById("message").value;
            if (msg.length==0){
                document.getElementById("msgErreur").innerHTML="Veuillez entrer votre message";
                document.getElementById("msgErreur").style.color="red";
            }
            else{
                document.getElementById("msgErreur").style.display ="none";
            }
        }
    </script>
</body>
</html>