<?php
$server = "localhost"; // Nom du serveur de bases de données - Ajouter le port si différent de 3306 -> Exemple : "localhost:3308"
$dbname = "PDO_PRODUCTS"; // Nom de notre base de données
// $dbname = "PDO_PRODUCTS_DEV"; // Nom de notre base de données Developpeur
$user = "root"; // Nom d'utilisateur pour éccder au serveur
$pwd = "root"; // Mot de passe pour accéder au serveur - Laisser vide pour les users Mac OS

try {
    $bdd = new PDO("mysql:host=$server;dbname=$dbname", $user, $pwd); // Connexion à la bdd exercicepdo
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activation du mode d'erreur amélioré
    // echo "Connexion reussie";
} catch (PDOException $e) {
    echo "Échec de la connexion : " . $e->getMessage(); // Affichage de l'erreur en cas d'erreur
}
?>