<?php

$host='127.0.0.1';
$username='root';
$pwd='admin';
$db="traveltodo";

$con=mysqli_connect($host,$username,$pwd,$db) or die('Unable to connect');

if(mysqli_connect_error($con))
{
  echo "Failed to Connect to Database ".mysqli_connect_error();
}

$name = isset($_POST['Query']) ? $_POST['Query'] : '';

$sql="SELECT * FROM hotel WHERE Name LIKE '%$name%'";

$query=mysqli_query($con,$sql);

if($query)
{
    while($row=mysqli_fetch_array($query))
  {
    $data[]=$row;
  }

    print(json_encode($data));

}else
{
  echo('Not Found ');
}
mysqli_close($con);

?>