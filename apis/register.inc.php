<?php
include 'config.inc.php';

// Check whether username or password is set from android
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nom'])
&& isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['adresse']))
{
    // Innitialize Variable
    $result='';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $login = $_POST['login'];
    $numtel = $_POST['numtel'];
    $adresse= $_POST['adresse'];

    // Query database for row exist or not
    $sql = "insert into   client (nom, prenom, login, email,password,adresse,numtel) VALUE ".
    "('".$nom."','".$prenom."','".$login."','".$email."','".$password."','".$adresse."','".$numtel."')";


    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount())
    {
        $result="true";
    }
    elseif(!$stmt->rowCount())
    {
        $result="false";
    }

    // send result back to android
    echo $result;
}

?>
