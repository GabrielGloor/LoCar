<?php
/**
 * @file         offers_findSection.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         17.02.2022
 * @project      LoCar
 * @description  Find section for the offers page and the home page
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 17.02.2022
 */
?>
<!-- find section -->
<section class="find_section layout_padding2" id="offres">
    <div class="container">
        <form action="" method="get">
            <input type="hidden" name="action" value="offers">
            <div>
                <h5>
                    Rechercher une offre
                </h5>
            </div>
            <div class=" form-row">
                <div class="col-sm-6">
                    <input type="text" name="search" class="form-control" placeholder="Lieu">
                </div>
                <div class="col-sm-6">
                    <select name="prices" id="" class="form-control">
                        <option value="">Tri</option>
                        <option value="">Prix croissant</option>
                        <option value="">Prix décroissant</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center justify-content-sm-end">
                <button type="submit" class="">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</section>
<!-- end find section -->
