<?php

require __DIR__ . "/../vendor/autoload.php";


//use Dotenv\Dotenv;

//$dotenv = Dotenv::createImmutable(__DIR__);
//$dotenv->load();

$dbHost = "localhost:8000"; // Adresse de l'hôte de la base de données
$dbName = "blog"; // Nom de la base de données
$dbUser = "aranhiblot"; // Nom d'utilisateur MySQL
$dbPass = "Bm1vx3;I"; // Mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM votre_table";
    $statement = $pdo->query($query);
    
    // Récupération des résultats
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    // Exemple d'affichage des résultats
    foreach ($results as $row) {
        echo "ID : " . $row['id'] . ", Nom : " . $row['nom'] . "<br>";
    }
} catch (PDOException $e) {
    // En cas d'échec de connexion à la base de données, afficher l'erreur
    echo "Erreur de connexion : " . $e->getMessage();
}



