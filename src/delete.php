<?php
require_once '../config/connect.php';

if (isset($_POST) && !empty($_POST)) { // Vérification si le formulaire a bien été envoyé
    // Récupération des informations du formulaire et sécurisation
    $id = htmlspecialchars($_POST['id']);

    try {
        // Requête pour mettre à jour un produit
        $sql = "DELETE FROM products WHERE id = :id;";
        $req = $bdd->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("Location: ../index.php");

} else {
    header("Location: ../remove.php");
};