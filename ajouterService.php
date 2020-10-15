<?php
require 'connection_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nomPhoto=$_FILES['photo']['name'];
    $file_tmp_name=$_FILES['photo']['tmp_name'];
    $nomSer =$_POST["nomSer"];
    $description =$_POST["description"];
     
   $q ="INSERT INTO `service`(`idEmpl`,`idDe`,`nomSer`,`description`,`photo`) VALUES ('0','0','$nomSer','$description','images/$nomPhoto')";
    mysqli_query($db, $q);  
    move_uploaded_file($file_tmp_name,"images/$nomPhoto");
    header("Location: gerer_serv.php", true, 301);
}
?>