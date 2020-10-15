<?php
require 'connection_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomPhoto=$_FILES['photo']['name'];
    $file_tmp_name=$_FILES['photo']['tmp_name'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adresse = $_POST['adresse'];
    $numtel = $_POST['numtel'];
    $datenaiss = $_POST['datenaiss'];
    $serv = $_POST['serv'];
    
    
    $q =  "INSERT INTO `employe`(`idSer`, `nom`, `prenom`, `login`, `email`, `password`, `adresse`, `numtel`, `datenaiss`, `photo`, `serv`) VALUES ( '0','$nom','$prenom','$login','$email','$password','$adresse','$numtel','$datenaiss','images/$nomPhoto','$serv')";
     mysqli_query($db, $q);
move_uploaded_file($file_tmp_name, "images/$nomPhoto");
   header("Location: gerer_emp.php", true, 301);
}
?>