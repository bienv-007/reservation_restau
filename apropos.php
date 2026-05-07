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
        footer{
          background: #0000001f;
          margin-bottom: 0;
          text-align: center;
          padding: 10px;
          margin-top: 150px;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'entete.php';?>
        <center>
          <span class="Bienvenu">
            A propos de nous
          </span><br>
          <span class="SUBLIMINAL">
            THE SUBLIMINAL
          </span><br>
          <span class="RESTO">
            RESTO A L'AFRICAINE
          </span>
        </center>
    </header>
    <center>
       <div style="margin-top: 50px;">
         <h3>
          Création
        </h3>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates asperiores facilis corporis architecto et, odit expedita sed similique nesciunt quis.
        </p>
       </div>
       <iframe src="" frameborder="0"></iframe>
    </center>
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