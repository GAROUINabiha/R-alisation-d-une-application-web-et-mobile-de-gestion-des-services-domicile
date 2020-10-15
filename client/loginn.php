<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
   
    </head>
  
    <body>
<?php
$db = new mysqli("localhost", "root", "", "pfe");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}

     
   $username = $_REQUEST['username']; //information from login form
  $password = $_REQUEST['password']; //information from login form
  $sql = "SELECT username,password FROM tbl_user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($db,$sql);
  $login_variables = mysqli_fetch_array($result);
  $_SESSION['sess_username'] = $login_variables['username'];
  $_SESSION['sess_password'] = $login_variables['password'];

  if(isset($_SESSION['sess_username']) && isset($_SESSION['sess_password']))
  {
    echo "success";;
  } 
  else
  {

echo "failed";

}
        ?>
  
    </body>