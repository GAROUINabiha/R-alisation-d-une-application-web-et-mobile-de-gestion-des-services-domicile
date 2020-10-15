<?php  
$db = new mysqli("localhost", "root", "", "pfe"); 
 if(!empty($_POST))  
 {
      $message = '';  
      $id = $_POST['idSer'];
      $nomSer = mysqli_real_escape_string($db, $_POST["nomSer"]);  
      $description = mysqli_real_escape_string($db, $_POST["description"]);
   if($_POST["idSer"] != '') {  
           $query = "  
           UPDATE service   
           SET nomSer='$nomSer',description='$description'
           WHERE idSer='$id'";  
           $message = 'Data Updated';  }
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
 header("Location: gerer_serv.php", true, 301);
}
 ?>
