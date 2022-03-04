<?php
/**
 * @file         createOffer.php
 * @author       Diogo.DA-SILVA-FERNA
 * @date         04.03.2022
 * @project      PROJECT
 * @description  DESCRIPTION
 * @last_update  Diogo.DA-SILVA-FERNA - DATE
 */

if (!isset($_SESSION['username'])) header('Location: ?action=home');

ob_start();
$title = 'Créer une offre';
?>
<?php include 'contents/top_bar.php'; ?>

<form action="?action=createOffer" method="post" enctype="multipart/form-data" class="createOffer">
    <div class="form-group">
        <label for="title">Titre de l'annonce *</label>
        <input class="form-control" id="title" name="title" placeholder="Ex: Honda Civic 3 portes" required>
    </div>
    <div class="form-group">
        <label for="town">Lieu *</label>
        <input class="form-control" type="text" id="town" name="town" placeholder="Ex: Yverdon-Les-Bains" required>
    </div>
    <div class="form-group">
        <label for="brand">Marque *</label>
        <input class="form-control" type="text" id="brand" name="brand" placeholder="Ex: Honda" required>
    </div>
    <div class="form-group">
        <label for="desc">Description *</label><br>
        <textarea class="form-control" id="desc" name="desc" placeholder="Ex: 5 places, essence, ..." oninput="auto_grow(this)"></textarea>
    </div>
    <div class="form-group">
        <label for="year">Année *</label>
        <input class="form-control" type="text" id="year" name="year" placeholder="Ex: 1998" required>
    </div>
    <div class="form-group">
        <label for="price">Prix (par jour) *</label>
        <input class="form-control" type="text" name="price" id="price" placeholder="Ex: 49.95" required>
    </div>
    <div class="form-group">
        <label for="img">Image *</label>
        <input class="form-control-file" type="file" name="img"  accept="image/jpeg, image/png, image/jpg" id="img" required>
    </div>
    <button class="btn btn-primary" type="submit">Créer</button>
</form>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>