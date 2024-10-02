<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";  // Votre nom d'utilisateur MySQL
$password = "root";  // Votre mot de passe MySQL
$dbname = "cybergame";  // Le nom de la base de données

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Récupération des tournois depuis la base de données
$sql = "SELECT * FROM tournoi";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erreur lors de la requête : " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="x-icon" href="logo.jpg">
    <title>Liste des Tournois</title>
</head>
<body>
    <div class="container">
        <h1>Liste des Tournois</h1>
        <ul>
            <?php
            // Affichage des tournois
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li><strong>" . htmlspecialchars($row['nom_tournoi']) . "</strong> - " . htmlspecialchars($row['jeu']) . 
                         " du " . htmlspecialchars($row['date_debut']) . " au " . htmlspecialchars($row['date_fin']) . "</li>";
                }
            } else {
                echo "<li>Aucun tournoi disponible pour le moment.</li>";
            }
            ?>
        </ul>
        <button onclick="window.location.href='accueil.php';">Retour à l'accueil</button>
    </div>
</body>
</html>

<?php
// Fermeture de la connexion
mysqli_close($conn);
?>
