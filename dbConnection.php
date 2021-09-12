<?php
$db_host='localhost';
$db_user='root';
$db_password= '';
$db_database='el_db';

// Create Connection
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_database);

if($conn -> connect_error){
  die("Connection failed");
}
// else {
//   echo "Connected";
// }


if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>