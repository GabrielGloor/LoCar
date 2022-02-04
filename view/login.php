<!--
	Downloaded from https://colorlib.com/wp/template/login-form-v18/
	Updated by: diogo.da-silva-fernandes@cpnv.ch
-->

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Login | LoCar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="contents/img/icon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contents/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="contents/css/login-util.css">
	<link rel="stylesheet" type="text/css" href="contents/css/login.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="?action=loginSend" method="post">
					<span class="login100-form-title p-b-43">
						LoCar - Connexion
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" id="psswd">
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
						}
					?>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							ou <a href="#">s'inscrire</a>
						</span>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('contents/img/hero-bg.png');">
					<a href="index.php"><i class="fas fa-chevron-left"></i></a>
				</div>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="contents/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="contents/js/login.js"></script>
<!--===============================================================================================-->
	<script src="https://kit.fontawesome.com/d8302aa554.js" crossorigin="anonymous"></script>

</body>
</html>