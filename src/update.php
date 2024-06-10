<?php
require_once '../config/connect.php';

if (isset($_POST) && !empty($_POST)) { // Vérification si le formulaire a bien été envoyé
    // Récupération des informations du formulaire et sécurisation
    $id = htmlspecialchars($_POST['id']);
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = intval($_POST['price']);
    $stock = intval($_POST['stock']);
    $thumbnail = htmlspecialchars($_POST['thumbnail']);
    
    
    try {
        // Requête pour mettre à jour un produit
        $sql = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, thumbnail = :thumbnail  WHERE id = :id;";
        $req = $bdd->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':name', $name, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':price', $price, PDO::PARAM_INT);
        $req->bindValue(':stock', $stock, PDO::PARAM_INT);
        $req->bindValue(':thumbnail', $thumbnail, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("Location: ../index.php");

} else {
    header("Location: ../edit.php");
};