<?php
require_once '../config/connect.php';

if (isset($_POST) && !empty($_POST)) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = intval($_POST['price']);
    $stock = intval($_POST['stock']);
    $thumbnail = htmlspecialchars($_POST['thumbnail']);

    try {
        $sql = "INSERT INTO products (name, description, price, stock, thumbnail) VALUES (:name, :description, :price, :stock, :thumbnail)";
        $req = $bdd->prepare($sql);
        $req->bindValue(':name', $name);
        $req->bindValue(':description', $description);
        $req->bindValue(':price', $price);
        $req->bindValue(':stock', $stock);
        $req->bindValue(':thumbnail', $thumbnail);
        $req->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    header("Location: ../index.php");

} else {
    header("Location: ../add.php");
};