<?php
include 'config.inc.php';
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['email']) && isset($_POST['password']))
     {
		  // Innitialize Variable
		      $result='';
	   	    $email = $_POST['email'];
          $password = $_POST['password'];
         $type = $_POST['type'];
		  // Query database for row exist or not
          $sql = 'SELECT * FROM client WHERE  email= :email AND password = :password';
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
