<?php
include 'config.inc.php';
if ( isset($_POST['nom'])) {  
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $adresse = $_POST['adresse'];
    $numtel = $_POST['numtel'];
    $datenaiss= $_POST['datenaiss'];

  $sql="INSERT INTO `user`(`id`, `nom`, `prenom`, `login`, `email`, `password`, `repassword`, `adresse`, `numtel`, `datenaiss`) VALUES ('0','$nom', '$prenom', '$login','$email', '$password','$repassword', '$adresse', '$numtel', '$datenaiss')";
 // use exec() because no results are returned
    $conn->exec($sql);
  }
?>

<html>
<head><title>Inscription</title></head>
<body>
            <form method="post" action="inscription.php">
                 <input class="form-control form-control-lg" placeholder="nom" type="text" name="nom" required><br>
              <input class="form-control form-control-lg" placeholder="prénom" type="text" name="prenom" required><br>
              <input class="form-control form-control-lg" placeholder="login" type="text" name="login" required><br>
              <input class="form-control form-control-lg" placeholder="e-mail" type="email" name="email" required><br>
              <input class="form-control form-control-lg" placeholder="password" type="password" name="password" required><br>
              <input class="form-control form-control-lg" placeholder="repassword" type="password" name="repassword" required><br>
              <input class="form-control form-control-lg" placeholder="adresse" type="text" name="adresse" required><br>
             <input class="form-control form-control-lg" placeholder="numéro de tel" type="number" name="numtel" required><br>
             <input class="form-control form-control-lg" placeholder="date de naissance" type="date" name="datenaiss" required><br>
      <button type="submit"  >Ajouter</button>
          </form>
</body>
</html>