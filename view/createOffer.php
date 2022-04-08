<?php
/**
 * @file         createOffer.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         04.03.2022
 * @project      LoCar
 * @description  Create offer view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */

ob_start();
$title = 'Créer une offre';
?>
<?php include 'contents/top_bar.php'; ?>

<form action="?action=createOffer" method="post" enctype="multipart/form-data" class="createOffer">
    <div class="form-group">
        <label for="title">Titre de l'annonce *</label>
        <input class="form-control" id="title" name="title" placeholder="Ex: Honda Civic 3 portes" required <?php if (isset($titleO)){?>value="<?=$titleO?>"<?php } ?>>
    </div>
    <div class="form-group">
        <label for="town">Lieu *</label>
        <input class="form-control" type="text" id="town" name="town" placeholder="Ex: Yverdon-Les-Bains" required <?php if (isset($town)){?>value="<?=$town?>"<?php } ?>>
    </div>
    <div class="form-group">
        <label for="brand">Marque *</label>
        <input class="form-control" type="text" id="brand" name="brand" placeholder="Ex: Honda" required <?php if (isset($brand)){?>value="<?=$brand?>"<?php } ?>>
    </div>
    <div class="form-group">
        <label for="desc">Description *</label><br>
        <textarea class="form-control" id="desc" name="desc" placeholder="Ex: 5 places, essence, ..." oninput="auto_grow(this)"><?php if (isset($desc)){ echo $desc; } ?></textarea>
    </div>
    <div class="form-group">
        <label for="year">Année *</label>
        <input class="form-control" type="text" id="year" name="year" pattern="[1-2]+[0,9]+[0-9]+[0-9]" placeholder="Ex: 1998" required <?php if (isset($year)){?>value="<?=$year?>"<?php } ?>>
        <?php if (isset($yearErr)):?>
        <p style="margin-top: 5px; color: red; font-size: 10px"><?=$yearErr?></p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="price">Prix (par jour) *</label>
        <input class="form-control" type="text" name="price" id="price" pattern="[1-9]+([,\.][0-9]+)?" placeholder="Ex: 49.95" required <?php if (isset($price)){?>value="<?=$price?>"<?php } ?>>
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