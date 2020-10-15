<?php
require "connection_bd.php";
$id = $_GET['id'];
mysqli_query($db, "DELETE FROM employe WHERE idEmpl=$id;");
header("Location: gerer_emp.php", 301);
?>