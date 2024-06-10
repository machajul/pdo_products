<?php
require_once '_includes/header.php';
require_once '_includes/footer.php';
require_once 'config/connect.php';

// Requête pour récupérer tous les produits
        
        $sql = "SELECT * FROM products WHERE id = ". $_GET['id'];
        $req = $bdd ->prepare($sql);
        $req->execute();
        $product = $req->fetch(PDO::FETCH_ASSOC);
// var_dump($product);
// var_dump($product['description']);
?>

    <form class="form" action="/src/delete.php" method="POST">
        <h1>Suppression de <?= $product['name'] ?>.</h1>
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <div class="card">
                    <img class = "thumbnail" src="<?= $product['thumbnail'] ?>">
                    <h2><?= $product['name'] ?></h2>
                    <div class="infos">
                        <p><span>Description :</span> <?= $product['description'] ?></p>
                        <p><span>Prix :</span> <?= number_format($product['price'] /100, 2, ',', ' ') ?> €</p>
                        <p> <span>En stock :</span> <?= $product['stock'] ?></p>
                    </div>
                <div class = "btn">
                    <input type="submit" value="Supprimer definitivement">
                </div>
    </form>
            </div>