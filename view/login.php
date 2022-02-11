<?php
/**
 * @file         login.php
 * @author       diogo.da-silva-fernandes@cpnv.ch
 * @date         10.02.2022
 * @project      LoCar WEBSITE
 * @description  Login page
 * @last_update  diogo.da-silva-fernandes@cpnv.ch - 10.02.2022
 */
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
				<form class="login100-form validate-form" action="?action=login" method="post">
					<span class="login100-form-title p-b-43">
						LoCar - Connexion
					</span>
					
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

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" onchange="fn_changePsswdView(this.id)">
							<label class="label-checkbox100" for="ckb1">
								Afficher le mot de passe
							</label>
						</div>
					</div>

					<?php
						if(isset($_GET['incorrect'])){
							if($_GET['incorrect'] == 'true'){
								echo "<div class='connectErr'>
									  	<p style='color: red; margin-top: -15px; margin-bottom: 15px;'>Email et/ou mot de passe incorrect !</p>
									  </div>";
							}
						}elseif (isset($_GET['userCreated'])){
                            if($_GET['userCreated'] == 'true'){
                                echo "<div class='registerOk'>
									  	<p style='color: limegreen; margin-top: -15px; margin-bottom: 15px;'>Votre utilisateur a bien été créé ! Vous pouvez vous connecter.</p>
									  </div>";
                            }
                        }
					?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							ou <a href="?action=register">s'inscrire</a>
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