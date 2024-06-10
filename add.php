<?php
require_once 'config/connect.php';
require_once '_includes/header.php';
require_once '_includes/footer.php';

?>

<form class="form" action="/src/insert.php" method="POST">
    <h1>Ajouter un produit</h1>
    <div class = "form-group">
        <label for="name">Nom du produit :</label>
        <input type="text" name="name" id="name">
    </div>
    <div class = "form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div class = "form-group">
        <label for="price">Prix :</label>
        <input type="number" step="1" name="price" id="price"  placeholder="(en centimes d'euro)">
    </div>
    <div class = "form-group">
        <label for="stock"> Produit en stock :</label>
        <input type="number" name="stock" id="stock">
    </div>
    <div class = "form-group">
        <label for="thumbnail">Lien de l'image :</label>
        <input type="url" name="thumbnail" id="tumbnail" placeholder="URL">
    </div>
    <div class = "btn" >
        <input type="submit" value="Ajouter">
    </div>

</form>