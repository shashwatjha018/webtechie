<?php
if(!isset($_SESSION)){
  session_start();
}
include_once('../dbConnection.php');

//Admin Login
if(!isset($_SESSION['is_admin_login'])){
  if(isset($_POST['checklogemail']) &&
  isset($_POST['emailLog'])&& isset($_POST['passwordLog'])){
    $adminLogEmail = $_POST['emailLog'];
    $adminLogPass = $_POST['passwordLog'];
    $sql = "SELECT admin_email,admin_pass FROM admin WHERE 
    admin_email = '".$adminLogEmail."' AND admin_pass = '".$adminLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row === 1){
      $_SESSION['is_admin_login'] = true;
      $_SESSION['adminLogEmail'] = $adminLogEmail;
      echo json_encode($row);
    }
    else if($row === 0){
      echo json_encode($row);
    }
  }
} 
?>