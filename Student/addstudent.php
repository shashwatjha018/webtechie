<?php
if(!isset($_SESSION)){
  session_start();
}
include_once('../dbConnection.php');

//If Email already registered
if(isset($_POST['checkmail']) && isset($_POST['stuemail'])){
  $stuemail=$_POST['stuemail'];
  $sql = "SELECT stu_email FROM student WHERE 
  stu_email = '".$stuemail."'";
  $result = $conn->query($sql);
  $row = $result->num_rows;
  echo json_encode($row);
}

//Insert Student

if(isset($_POST['stusignup']) && isset($_POST['username'])&&
isset($_POST['email'])&& isset($_POST['password'])){
  $stuname = $_POST['username'];
  $stuemail = $_POST['email'];
  $stupass = $_POST['password'];

  $sql = "INSERT INTO student(stu_name, stu_email, stu_pass)
  VALUES ('$stuname','$stuemail','$stupass')";

  if($conn->query($sql) == TRUE){
    echo json_encode("OK");
  }
  else {
    echo json_encode("Failed");
  }
}
//Student Login
if(!isset($_SESSION['is_login'])){
  if(isset($_POST['checklogemail']) &&
  isset($_POST['emailLog'])&& isset($_POST['passwordLog'])){
    $stuLogEmail = $_POST['emailLog'];
    $stuLogPass = $_POST['passwordLog'];
    $sql = "SELECT stu_email,stu_pass FROM student WHERE 
    stu_email = '".$stuLogEmail."' AND stu_pass = '".$stuLogPass."'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row === 1){
      $_SESSION['is_login'] = true;
      $_SESSION['stuLogEmail'] = $stuLogEmail;
      echo json_encode($row);
    }
    else if($row === 0){
      echo json_encode($row);
    }
  }
}
?>