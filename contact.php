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

        body{
            background: url("img/news-bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            font-family: sans-serif;
        }

        form{
            width: 500px;
            margin: auto;
            background-color: rgba(255,255,255,0.95);
            padding: 30px;
            margin-top: 40px;
            box-shadow: 0 5px 10px #00000046;
            border-radius: 20px;
        }

        input,
        textarea{
            padding: 12px;
            width: 100%;
            border-radius: 10px;
            border: 1px solid gray;
            outline: none;
        }

        textarea{
            resize: none;
            height: 150px;
        }

        input:focus,
        textarea:focus{
            border: 1px solid orange;
        }

        button{
            background-color: orange;
            padding: 12px;
            border: 0;
            border-radius:10px;
            width: 100%;
            color: white;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover{
            background: rgb(236, 155, 4);
            transform: scale(1.02);
        }

        .contact{
            font-weight: bold;
            color: orange;
            font-size: 25px;
        }

        a{
            text-decoration: none;
            color: #312929;
        }

        footer{
            background: rgba(0,0,0,0.7);
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 80px;
        }

        .nav-link{
            font-size: 15px;
        }

        @media screen and (max-width: 740px){

            form{
                width: 90%;
            }

            .Bienvenu{
                font-size: 45px;
            }

            .SUBLIMINAL{
                font-size: 35px;
            }
        }

    </style>

</head>

<body>

    <header>

        <?php include 'entete.php';?>

        <center>

            <span class="Bienvenu">
                Bienvenu
            </span>

            <br>

            <span class="SUBLIMINAL">
                THE SUBLIMINAL
            </span>

            <br>

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

        </center>

        <br><br>

        <span id="nomErreur"></span>

        <input 
            type="text" 
            name="nom" 
            id="nom" 
            placeholder="Nom"
        >

        <br><br>

        <span id="emailErreur"></span>

        <input 
            type="email" 
            name="email" 
            id="email" 
            placeholder="Email"
        >

        <br><br>

        <span id="msgErreur"></span>

        <textarea 
            name="message" 
            id="message" 
            placeholder="Ecrire un message"
        ></textarea>

        <br><br>

        <button 
            type="button" 
            onclick="nameError(); emaiError(); msgErreur();"
        >
            Envoyer
        </button>

    </form>

<?php include 'footer.php';?>

    <script type="text/javascript">

        function nameError(){

            var nom = document.getElementById("nom").value;

            if(nom.length == 0){

                document.getElementById("nomErreur").innerHTML =
                "* Veuillez entrer votre nom";

                document.getElementById("nomErreur").style.color = "red";
            }
            else{

                document.getElementById("nomErreur").style.display = "none";
            }
        }

        function emaiError(){

            var email = document.getElementById("email").value;

            if(email.length == 0){

                document.getElementById("emailErreur").innerHTML =
                "* Veuillez entrer votre email";

                document.getElementById("emailErreur").style.color = "red";
            }
            else{

                document.getElementById("emailErreur").style.display = "none";
            }
        }

        function msgErreur(){

            var msg = document.getElementById("message").value;

            if(msg.length == 0){

                document.getElementById("msgErreur").innerHTML =
                "* Veuillez entrer votre message";

                document.getElementById("msgErreur").style.color = "red";
            }
            else{

                document.getElementById("msgErreur").style.display = "none";
            }
        }

    </script>

</body>
</html>