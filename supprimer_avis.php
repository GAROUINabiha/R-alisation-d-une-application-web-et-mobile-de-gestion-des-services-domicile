<?php
require "connection_bd.php";
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM avis WHERE idA=$id;"); 
header("Location: gerer_avis.php", 301);
?>