<?php
/**
 * @file         modifyOffer.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         06.03.2022
 * @project      LoCar
 * @description  Modify offer view
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */

ob_start();
$title = 'Modifier une offre';
?>
<?php include 'contents/top_bar.php'; ?>

<form action="?action=modifyOffer&offerId=<?=$offerId?>" method="post" enctype="multipart/form-data" class="createOffer">
    <div class="form-group">
        <label for="title">Titre de l'annonce *</label>
        <input class="form-control" id="title" name="title" required value="<?=$name?>">
    </div>
    <div class="form-group">
        <label for="town">Lieu *</label>
        <input class="form-control" type="text" id="town" name="town" required value="<?=$town?>">
    </div>
    <div class="form-group">
        <label for="brand">Marque *</label>
        <input class="form-control" type="text" id="brand" name="brand" required value="<?=$brand?>">
    </div>
    <div class="form-group">
        <label for="desc">Description *</label><br>
        <textarea class="form-control" id="desc" name="desc" oninput="auto_grow(this)"><?=$desc?></textarea>
    </div>
    <div class="form-group">
        <label for="year">Année *</label>
        <input class="form-control" type="text" id="year" name="year" pattern="[1-2]+[0,9]+[0-9]+[0-9]" required value="<?=$year?>">
        <?php if (isset($yearErr)):?>
        <p style="margin-top: 5px; color: red; font-size: 10px"><?=$yearErr?></p>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="price">Prix (par jour) *</label>
        <input class="form-control" type="text" name="price" id="price" pattern="[1-9]+([,\.][0-9]+)?" required value="<?=$price?>">
    </div>
    <button class="btn btn-primary" type="submit">Modifier</button>
</form>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';
?>