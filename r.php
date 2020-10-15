<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>



	<?php
require 'connection_bd.php';


	if (!empty($_POST)) {

		session_start();

		$id = $_SESSION["__userId"];
		$motdepasse = mysqli_real_escape_string($db, $_POST["motdepasse"]);
		$motdepasse2 = mysqli_real_escape_string($db, $_POST["motdepasse2"]);


		if ($id != '' && ($motdepasse == $motdepasse2)) {
			$query = "  
           UPDATE admin   
           SET motdepasse='$motdepasse'
           WHERE ida='$id'";
			$message = 'Data Updated';
			mysqli_query($db, $query);
			session_unset();

// destroy the session
			session_destroy();
			header("Location: index.php", true, 301);
		}else{
			$errorPassword="asdads";

		}

	}
?>

		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/image.jpg);">
				</div>


				<?php if (isset($errorPassword)) { ?>
					<div class="alert alert-danger" role="alert">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true">
							<center>Les mots de passe que vous avez entrés ne sont pas identiques.  </center></span>
					</div>


				<?php } ?>

				<form class="login100-form validate-form" method="post" action="r.php">

					<span id='errorMessage'></span>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "le Mot de passe est obligatoire">
						<span class="label-input100"> Nouveau mot de passe</span>
						<input class="input100" type="password" name="motdepasse" placeholder="Entrer votre nouveau mot de passe" onkeyup="isPasswordMatch()" id="motdepasse" required>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "le Mot de passe est obligatoire">
						<span class="label-input100"> Confirmer votre mot de passe</span>
						<input class="input100" type="password" name="motdepasse2" placeholder="Confirmer votre mot de passe" id="motdepasse2"  onkeyup="isPasswordMatch();" required>
						<span class="focus-input100"></span>
					</div>
<div id="divCheckPassword"></div>

<script type="text/javascript">
	function isPasswordMatch() {
		if ($('#motdepasse').val().length<4) {
			$('#errorMessage').html('mot de passe très court').css('color', 'red');
			document.getElementById("sendPasswords").disabled = true;

		}else{
			if ($('#motdepasse').val() == $('#motdepasse2').val()) {
				$('#errorMessage').html('les mots de passes identiques .').css('color', 'green');

				document.getElementById("sendPasswords").disabled = false;

			} else{
				$('#errorMessage').html('les mots de passes doivent être identiques').css('color', 'red');
				document.getElementById("sendPasswords").disabled = true;

			}
		}



	}

				</script>
					<div class="flex-sb-m w-full p-b-30">
						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn " id="sendPasswords" disabled type="submit">
							Envoyer
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>