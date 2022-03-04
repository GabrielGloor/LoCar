<?php
/**
 * @file         register.php
 * @author       Diogo.DA-SILVA-FERNA
 * @date         11.02.2022
 * @project      PROJECT
 * @description  DESCRIPTION
 * @last_update  Diogo.DA-SILVA-FERNA - DATE
 */

if (isset($_SESSION['username'])) header('Location: ?action=home');
?>
<!--
	Downloaded from https://colorlib.com/wp/template/login-form-v18/
	Updated by: diogo.da-silva-fernandes@cpnv.ch
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>LoCar - Connexion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="view/contents/img/icon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="view/contents/css/login-util.css">
    <link rel="stylesheet" type="text/css" href="view/contents/css/login.css">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="?action=register" method="post">
                <span class="login100-form-title p-b-43">
                    LoCar - Inscription
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Vous devez rentrer un nom d'utilisateur">
                    <input class="input100" type="text" name="inputUsername">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Nom d'utilisateur</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Email valide: ex@abc.xyz">
                    <input class="input100" type="text" name="inputEmail">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Vous devez entrer un mot de passe">
                    <input class="input100" type="password" name="inputPswd" id="psswd">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Mot de passe</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Vous devez entrer le même mot de passe">
                    <input class="input100" type="password" name="inputPswdTwo" id="psswd2">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirmer le mot de passe</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" onchange="fn_changePsswdView(this.id)">
                        <label class="label-checkbox100" for="ckb1">
                            Afficher le mot de passe
                        </label>
                    </div>
                </div>

                <?php
                if(isset($_GET['incorrect']) && isset($_GET['badPassword'])){
                    if($_GET['incorrect'] == 'true' && $_GET['badPassword'] == 'true'){
                        echo "<div class='registerErr'>
                                <p style='color: red; margin-top: -15px; margin-bottom: 15px;'>Votre mot de passe ne correpond pas à la confirmation !</p>
                              </div>";
                    }
                }elseif(isset($_GET['incorrect']) && isset($_GET['userExists'])){
                    if($_GET['incorrect'] == 'true' && $_GET['userExists'] == 'true'){
                        echo "<div class='registerErr'>
                                <p style='color: red; margin-top: -15px; margin-bottom: 15px;'>Le nom d'utilisateur et/ou l'email est déjà utilisé !</p>
                              </div>";
                    }
                }
                ?>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        S'inscrire
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							ou <a href="?action=login">se connecter</a>
						</span>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('view/contents/img/hero-bg.png');">
                <a href="?action=home"><i class="fas fa-chevron-left"></i></a>
            </div>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="view/contents/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="view/contents/js/login.js"></script>
<!--===============================================================================================-->
<script src="https://kit.fontawesome.com/d8302aa554.js" crossorigin="anonymous"></script>

</body>
</html>
