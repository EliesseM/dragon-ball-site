<?php
$servername = "localhost";
$username = "root"; // Remplacez par votre nom d'utilisateur
$password = ""; // Remplacez par votre mot de passe
$dbname = "dbz";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
?>
<?php
include 'dbz.php';

// Récupérer les personnages de la base de données
$sql = "SELECT id, name, description, image_url FROM personnages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .character {
            width: 30%;
            padding: 10px;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .character img {
            width: 100%;
            height: auto;
        }
        .character h2 {
            color: #333;
        }
    </style>
</head>
<body>

<h1 style="text-align: center;">Personnages</h1>

<?php
if ($result->num_rows > 0) {
    // Afficher chaque personnage
    while($row = $result->fetch_assoc()) {
        echo '<div class="character">';
        echo '<img src="' . $row["image_url"] . '" alt="' . $row["name"] . '">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '</div>';
    }
} else {
    echo "<p>Aucun personnage trouvé.</p>";
}
$conn->close();
?>

</body>
</html>

