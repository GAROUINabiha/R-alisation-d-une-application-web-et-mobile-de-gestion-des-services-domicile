<?php
include 'config.inc.php';

// Check whether username or password is set from android
if(isset($_POST['service']))
{
    // Innitialize Variable
    $result='';
    $service = $_POST['service'];

    $sql = "SELECT * from employe where serv ='".$service."'";


    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo json_encode(array("result"=>$stmt->fetchAll()));
}else{
echo "ddddddd 000 000 ";
}

?>
