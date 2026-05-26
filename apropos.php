<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A propos</title>

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

        body{
            background: url("img/news-bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        img{
            width: 100%;
        }

        .contenu{
            margin-top: 50px;
            width: 80%;
            background: rgba(255,255,255,0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }

        iframe{
            width: 100%;
            height: 500px;
            border-radius: 10px;
            margin-top: 30px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.3);
        }

        footer{
            background: #0000001f;
            margin-bottom: 0;
            text-align: center;
            padding: 20px;
            margin-top: 150px;
        }

    </style>
    <script>
        (function () {
            var preference = localStorage.getItem("theme-preference") || "system";
            var isDark = preference === "dark" || (preference === "system" && window.matchMedia("(prefers-color-scheme: dark)").matches);
            document.documentElement.dataset.theme = isDark ? "dark" : "light";
        })();
    </script>
    <link href="css/theme.css" rel="stylesheet">
    <script src="js/theme.js" defer></script>
</head>

<body class="nav-apropos">

    <header>

        <?php include 'entete.php';?>

        <center>

            <span class="Bienvenu">
                A propos de nous
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

    <center>

        <div class="contenu">

            <h3 style="color: orange;">
                Création
            </h3>

            <p style="font-size: 18px;">
                THE SUBLIMINAL est un restaurant africain moderne créé dans le but 
                d’offrir une expérience culinaire unique mêlant tradition africaine 
                et élégance contemporaine. Notre mission est de proposer des plats 
                authentiques dans un cadre chaleureux et raffiné.
            </p>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63834.77660640257!2d29.420355388025445!3d0.4881129541739864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1761ab017951ba17%3A0xa45247d1f6b2a53c!2sBeni!5e0!3m2!1sfr!2scd!4v1778536805180!5m2!1sfr!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </iframe>

        </div>

    </center>
<?php include 'footer.php';?>
</body>
</html>
