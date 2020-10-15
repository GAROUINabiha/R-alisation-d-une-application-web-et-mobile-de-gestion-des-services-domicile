<?php
require "connection_bd.php";
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM service WHERE idSer=$id;"); 
header("Location: gerer_serv.php", 301);?>