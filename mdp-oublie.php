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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

 $email=$_POST['email'];

    $resultat=mysqli_query($db, "select * from admin where emailad = '$email' ;");
    if ($resultat && $resultat->num_rows > 0) {
        //code qui envoie les informations dans un email
        $row = mysqli_fetch_array($resultat, MYSQLI_NUM);
        $login = $row[0];
        $mdp = $row[2];
		session_start();
		$_SESSION["__userId"] = $login;

        header("Location: r.php", true, 301);

    } else {
        $feedback = "Cette adresse e-mail n'est pas associé à un compte.";
    }
}
?>

		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/image.jpg);">
				</div>

				<?php if (isset($feedback)) { ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <?php echo $feedback; ?>
</div>


<?php } ?>



				<form class="login100-form validate-form" method="post" action="mdp-oublie.php">
					<div class="wrap-input100 validate-input m-b-26" data-validate="l'adresse e-mail est obligatoire">
						<span class="label-input100">Saisir votre E-mail :</span>
						<input class="input100" type="text" name="email" placeholder="adresse e-mail">
						<span class="focus-input100"></span>
					</div>

					

					<div class="flex-sb-m w-full p-b-30">
						
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Envoyer un lien
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