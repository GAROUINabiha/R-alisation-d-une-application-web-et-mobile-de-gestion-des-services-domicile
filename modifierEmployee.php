<?php  
$db = new mysqli("localhost", "root", "", "pfe"); 
 if(!empty($_POST))  
 {
      $message = '';  
      $id = $_POST['idEmpl'];
      $nom = mysqli_real_escape_string($db, $_POST["nom"]);  
      $prenom = mysqli_real_escape_string($db, $_POST["prenom"]);
      $login = mysqli_real_escape_string($db, $_POST["login"]);  
      $email = mysqli_real_escape_string($db, $_POST["email"]);
      $password = mysqli_real_escape_string($db, $_POST["password"]);  
      $adresse = mysqli_real_escape_string($db, $_POST["adresse"]);
      $numtel = mysqli_real_escape_string($db, $_POST["numtel"]);  
      $datenaiss = mysqli_real_escape_string($db, $_POST["datenaiss"]);


     $photoValue=$_POST['photo2'];
     if($_POST['photo']){
         $photoValue=$_POST['photo'];
     }


   if($_POST["idEmpl"] != '') {  
           $query = "  
           UPDATE employe    SET
           `nom`='$nom',`prenom`='$prenom',`photo`='images/$photoValue',`login`='$login',`email`='$email',`password`='$password',`adresse`='$adresse',`numtel`='$numtel',`datenaiss`='$datenaiss' WHERE idEmpl='$id'";
           $message = 'Data Updated';}
    //  }  
   /*   else  
      {  
           $query = "  
           INSERT INTO service(nomSer, description)  
           VALUES('$nomSer', '$description');  
           ";  
           $message = 'Data Inserted';}
           */
mysqli_query($db,$query);
header("Location: gerer_emp.php", true, 301);
}
 ?>