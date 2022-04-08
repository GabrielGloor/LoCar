<?php
/**
 * @file         lost.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         11.02.2022
 * @project      LoCar
 * @description  Lost page
 * @last_update  diogo.da-silva-fernandes@cpnv.ch
 */
ob_start();

$title = "Vous vous êtes perdu !";

require "view/contents/top_bar.php";
?>

<div style="padding: 300px 0px">
    <h1 style="text-align: center">Je crois que vous vous êtes perdu :(</h1>
</div>
<?php
$content = ob_get_clean();
require 'gabarit.php'
?>