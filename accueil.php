<?php
// Connexion à la base de données
require_once 'db_conn.php';  // Assurez-vous d'avoir le fichier de connexion à la base de données

// Récupération des tournois depuis la base de données
$sql = "SELECT * FROM tournoi";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <title>TechEssentials</title>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="" class="logo">
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="tournois.php">Tournois</a></li>
                <li><a href="login-register/login.php">Connexion</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Cyber Game Arras</h1>
            <p>Pour plus d'information sur les tournois.</p>
            <div>
              <button type="button" onclick="window.location.href='listetournois.php';"><span></span>En savoir plus</button>
            </div>
        </div>

        <div class="tournaments">
            <h2>Liste des tournois</h2>
            <ul>
                <?php
                // Affichage des tournois
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li><strong>" . $row['nom_tournoi'] . "</strong> - " . $row['jeu'] . " du " . $row['date_debut'] . " au " . $row['date_fin'] . "</li>";
                    }
                } else {
                    echo "<li>Aucun tournoi disponible pour le moment.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>
