<?php

if (!isset($_SESSION)){
  session_start();
}

include('./dbConnection.php');


if (isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
}else{
  echo "<script> location.href='./home.php';</script>";
}
//echo $_SESSION['qid'];
$sql = "SELECT * FROM question WHERE q_id = '{$_SESSION['qid']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ans = $row['ques_ans']; 
$n = $result->num_rows;;
$qid = $_SESSION['qid'];
// echo $result->num_rows;

//---------------Get Marks per Question----------------
$sql = "SELECT * FROM quiz WHERE q_id = '{$_SESSION['qid']}'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$marks = $row['q_marks'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/all.min.css">
  <style>
  .navi{
    display:flex;
    background:black;
    padding: 0 3%;
  }
  .logo span{ font-size: 1.8rem; margin-left: 5px; color: #F5A7A7; }
.logo{
        font-size: 1.8rem; font-weight: 600; text-transform: uppercase;
        letter-spacing: 2px; line-height: 4rem; margin-top: 10px;color:white;
    }
.logoimg{
  margin-right:20px;
  margin-top:5px;
}
body {
  background:black;
}
  </style>
  <script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
  }
</script>
  <title>Quiz</title>
</head>
<body>
<div class="navi">
<img src="images/logo.jpeg" class="logoimg"alt="Web Techie" height="60px">
    <h3 class="logo">Web<span>Techie</span></h3></div>
<div class="container mx-auto mt-5">
<div class="col-lg-6 m-auto d-block">
<table class="table table-striped table-bordered table-dark">
  <thead class="thead-light">
    <tr>
      <th id="head" colspan = "2" style="background:#f5a7a7; color:black;"><h1>Result</h1></th>
    </tr>
  </thead>
<?php

if(isset($_REQUEST['modal-btn'])){
  $count = 0;
  $result = 0;
  $total_marks = 0;
}

if(isset($_POST['btn'])){
  // echo $ans."<br>";
  if(!empty($_POST['quizcheck'])){
    $count = count($_POST['quizcheck']);
    $selected = $_POST['quizcheck'];
  // print_r($selected);
  //Get all the ques id in array
  $quesId_arr = array_keys($selected);
  //Get all the ans id in array
  $ansId_arr = array_values($selected);
  // print_r($quesId_arr)."<br>";
  // print_r($ansId_arr)."<br>";
  $rightAns = array();
  //Get the right answer in array from questions table
  foreach ($quesId_arr as $value){
    // echo $value;
    $sql = "SELECT * FROM question WHERE ques_id = '$value'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    array_push($rightAns,$row['ques_ans']);
  }
  // print_r($rightAns);
  $userAns = array();
  //Get the user ans in an array
  foreach ($ansId_arr as $value){
    // echo $value;
    $sql = "SELECT * FROM answer WHERE ans_id = '$value'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    array_push($userAns,$row['ans']);
  }
  // print_r($userAns);
  //Compare the values of rightAns and userAns to get the result
  // print_r($rightAns);
  // print_r($userAns);

  $result = 0;
  if(!empty($rightAns)){
  for ($i = 0; $i < count($rightAns); $i++)  {
      if($rightAns[$i] == $userAns[$i]){
        $result++;
      }
  }}
  $total_marks = $result * $marks;
  }
  else{
    $count = 0;
    $result = 0;
    $total_marks = 0;
  }}

  if(isset($_POST['btn']) or isset($_REQUEST['modal-btn'])){
  echo "
  <tbody>
    <tr>
      <th scope='row'>Question Attempted</th>
      <td>Out of ".$n." ,you have selected ".$count." options<br></td>
    </tr>
  ";

  
  echo "
  <tr>
  <th scope='row'>No of correct options you have selected</th>
  <td>".$result."</td>
  </tr>"
  ;
  echo "
  <tr>
  <th scope='row'>Your Total Score</th>
  <td>".$total_marks."</td>
  </tr>
  "
  ;

  //Insert into db

  $sql = "INSERT INTO result(q_id,stu_email,
  score,total_marks) VALUES 
  ('$qid','$stuEmail','$result','$total_marks')
  ";

  //Check if values added successfully in DB
  if($conn->query($sql) == TRUE){
    echo "<script><alert>Successfull</alert></script>";
  }
  else{
    if($conn->query($sql) == FALSE){
      echo "<script><alert>No</alert></script>";
    }
}
}

?>
</table>

<form method = "POST" action="shashaQuiz.php">
<button name = "check-btn" type="submit" class = "btn btn-dark float-right">
<i class="fas fa-hand-point-left">
</i>
</button>
</form>
</div>
</div>
</body>
<!--  -->
</html>