<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Dbz";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Récupération de la requête de recherche
$query = $_POST['query'];

// Préparation et exécution de la requête SQL
$sql = "SELECT * FROM table_voulue WHERE colonne_voulue LIKE '%$query%'";
$result = $conn->query($sql);
