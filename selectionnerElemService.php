<?php
require 'connection_bd.php';
$id = $_GET['id'];
$result = mysqli_query($db, "select * from service where idSer=$id;");  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
echo json_encode($row);  

?>