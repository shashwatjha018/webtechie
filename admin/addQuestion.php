<?php
if(!isset($_SESSION)){
  session_start();
}
include('./header.php');
include('./headerStyle.php');
include('../dbConnection.php');

if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
}
else{
  echo "<script> location.href='../home.php';</script>";
}
if(isset($_REQUEST['add_q'])){
  // $_SESSION['q_id'] = $_REQUEST['id'];
  // echo $_SESSION['q_id'];
  $sql = "SELECT * FROM quiz WHERE q_id = '{$_REQUEST['id']}'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}

if(isset($_REQUEST['add'])){
  //Checking Empty Fields
  if(($_REQUEST['quiz_ques'] == "")||($_REQUEST['op1'] == "")||
  ($_REQUEST['op2'] == "")||($_REQUEST['op3'] == "")||($_REQUEST['op4'] == "")
  ||($_REQUEST['corr'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  else{
    $qid = $_REQUEST['qid'];
    $ques = $_REQUEST['quiz_ques'];
    $op1 = $_REQUEST['op1'];
    $op2 = $_REQUEST['op2'];
    $op3 = $_REQUEST['op3'];
    $op4 = $_REQUEST['op4'];
    $ans = $_REQUEST['corr'];

    $sql = "INSERT INTO question(ques,ques_ans,q_id) VALUES 
    ('$ques','$ans','$qid')";
    $result = $conn->query($sql);
    $ques_id = $conn->insert_id; //get id of last row
    echo $ques_id;
    //Check if values added successfully in DB
    // if($conn->query($sql) == TRUE){
    //   echo "<script><alert>Question Added Successfully</alert></script>";
    // }
    // else{
    //   if($conn->query($sql) == FALSE){
    //     echo "<script><alert>Error</alert></script>";
    //   }
    // }

    // $sql = "SELECT * FROM question ORDER BY ques_id DESC LIMIT 1";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $ques_id = $row['ques_id'];

    $sql = "INSERT INTO answer(ans,ques_id) VALUES ('$op1', '$ques_id')";
    $sql1 = "INSERT INTO answer(ans,ques_id) VALUES ('$op2', '$ques_id')";
    $sql2 = "INSERT INTO answer(ans,ques_id) VALUES ('$op3', '$ques_id')";
    $sql3 = "INSERT INTO answer(ans,ques_id)  VALUES ('$op4', '$ques_id')";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE && $conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Question Added Successfully</div>';
    }
    else{
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to add Question</div>';
    }
  }
}
?>
<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1>ADD NEW QUESTION</h1>

  <div class="inset">
  <p>
    <label for="qid">Quiz Id:</label>
    <input type="text" name="qid" id="qid" value="<?php if(isset($row['q_id'])){echo $row['q_id'];}?>" readonly>
  </p>
  <p>
    <label for="ques">Enter your Question here</label>
    <input type="text" name="quiz_ques" id="quiz_ques">
  </p>
  <p>
    <label for="op1">Option 1</label>
    <input type="text" name="op1" id="op1">
  </p>
  <p>
    <label for="op2">Option 2</label>
    <input type="text" name="op2" id="op2">
  </p>
  <p>
    <label for="op3">Option 3</label>
    <input type="text" name="op3" id="op3">
  </p>
  <p>
    <label for="op4">Option 4</label>
    <input type="text" name="op4" id="op4">
  </p>
  <p>
    <label for="corr">Correct Answer</label>
    <input type="text" name="corr" id="corr">
  </p>
    <center>
    <input type="submit" name="add" id="add" value="ADD">
    <button type="submit" id="cancel">
      <a href="quiz.php" style = "text-decoration:none;color:black">
      CANCEL
      </a>
    </button>
    </center>
  </p>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
</form>
<?php include('./footer.php');?>