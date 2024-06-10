<?php
require_once '_includes/header.php';
require_once '_includes/footer.php';
require_once 'config/connect.php';


// Requête pour récupérer tous les produits
        
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $req = $bdd ->prepare($sql);
        $req->execute();
        $products = $req->fetchAll(PDO::FETCH_ASSOC);
// var_dump($products);
?>
    <h1>Liste des produits</h1>
    <section>
        <div class = "card-container">
            <?php foreach ($products as $product) : ?>
                <div class="card">
                    <img class = "thumbnail" src="<?= $product['thumbnail'] ?>">
                    <h2><?= $product['name'] ?></h2>
                    <div class="infos">
                        <p><span>Description :</span> <?= $product['description'] ?></p>
                        <p><span>Prix :</span> <?= number_format($product['price'] /100, 2, ',', ' ') ?> €</p>
                        <p> <span>En stock :</span> <?= $product['stock'] ?></p>
                    </div>
                    <div class="btn">
                        <div class="btn-container">
                            <img src="_includes/assets/images/edit.png" alt="edit">
                            <div class="btn-hover">
                            <a href="edit.php?id=<?= $product['id'] ?>"> Modifier </a>
                            </div>
                        </div>
                        <div class="btn-container">
                            <img src="_includes/assets/images/delete.png" alt="delete">
                            <div class="btn-hover">
                            <a href="remove.php?id=<?= $product['id'] ?>">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="btn-add">
            <a href='add.php'><img src="_includes/assets/images/add.png" alt="add"></a><a href="add.php">Ajouter un article</a>
        </div>
    </section>