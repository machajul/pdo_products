<?php
require_once '_includes/header.php';
require_once '_includes/footer.php';
require_once 'config/connect.php';

// Requête pour récupérer tous les produits
        
        $sql = "SELECT * FROM products WHERE id = " . $_GET['id'];
        $req = $bdd ->prepare($sql);
        $req->execute();
        $product = $req->fetch(PDO::FETCH_ASSOC);
// var_dump($product);
// var_dump($product['description']);
?>

    <form class="form" action="/src/update.php" method="POST">
                <h1>Modification de <?= $product['name'] ?>.</h1>
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <div class = "form-group">
                    <label for="name">Nom du produit :</label>
                    <input type="text" name="name" id="name" value="<?= $product['name'] ?>">
                </div>
                <div class = "form-group">
                    <label for="description">Description :</label>
                    <textarea name="description" id="description"><?= $product['description'] ?>"</textarea>
                </div>
                <div class = "form-group">
                    <label for="price">Prix :</label>
                    <input type="number" step="1" name="price" id="price"  placeholder="(en centimes)" value = "<?= intval($product['price']) ?>">
                </div>
                <div class = "form-group">
                    <label for="stock"> Produit en stock :</label>
                    <input type="number" name="stock" id="stock" value = "<?= $product['stock'] ?>">
                </div>
                <div class = "form-group">
                    <label for="thumbnail">Lien de l'image :</label>
                    <input type="url" name="thumbnail" id="tumbnail" placeholder="URL" value = "<?= $product['thumbnail'] ?>">
                </div>
                <div class = "btn">
                    <input type="submit" value="Modifier">
                </div>
</form>