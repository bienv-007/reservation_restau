<?php
require 'connexion_db/connexion.php';
if (isset($_POST['email'])) {

    // $nom = $_POST['nom'];
    $email = $_POST['email'];
    // $message = $_POST['message'];

    $sql = "INSERT INTO news_letter(email) 
            VALUES (?)";

    $stmt = $connexion->prepare($sql);

    if ($stmt->execute([$email])) {

        echo "
        <script>
            alert('vous avez ete enregistre avec succès');
        </script>
        ";
    } 
    else {

        echo "
        <script>
            alert('Erreur lors de l\\'enregistrement');
        </script>
        ";
    }
}
?>
<footer>

    <h4 style="font-weight: bold;">
        THE SUBLIMINAL
    </h4>

    <p>
        Découvrez le meilleur de la cuisine africaine dans un cadre élégant, 
        moderne et chaleureux. THE SUBLIMINAL vous offre une expérience 
        gastronomique unique inspirée des saveurs authentiques du continent africain.
    </p>

    <hr>

    <span>
        Adresse : Beni, République Démocratique du Congo
    </span>

    <br>

    <span>
        Téléphone : +243 975 783 421
    </span>

    <br>

    <span>
        Email : thesubliminal@gmail.com
    </span>

    <br><br>

    <span>
        Ouvert tous les jours : 10h00 — 23h00
    </span>

    <br><br>
<form style="padding: 20px; background: transparent" action="" method="post">
    <input 
        type="email" 
        name="email"
        placeholder="Souscrire à notre newsletter"
        style="
            width: 320px;
            padding: 12px;
            border: none;
            border-radius: 30px;
            outline: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        "
    ><br><br>

    <button type="submit"
        style="
            padding: 12px 25px;
            border: none;
            border-radius: 20px;
            width: 150px;
            background: #004ec2ff;
            color: white;
            font-weight: bold;
            margin-left: 10px;
            transition: 0.3s;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        "
        onmouseover="this.style.background='#005ce6ff'"
        onmouseout="this.style.background='#004ec2ff'"
    >
        Souscrire
    </button>
</form>

    <br><br>

    &copy; 2025 THE SUBLIMINAL — Tous droits réservés

</footer>