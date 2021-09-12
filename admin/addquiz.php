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


if(isset($_REQUEST['add'])){
  //Checking Empty Fields
  if(($_REQUEST['quiz_name'] == "")||($_REQUEST['quiz_marks'] == "")||
  ($_REQUEST['quiz_dur'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  else{
    $cid = $_SESSION['course_id'];
    $qname = $_REQUEST['quiz_name'];
    $qmarks = $_REQUEST['quiz_marks'];
    $qdur = $_REQUEST['quiz_dur'];
    $sql = "INSERT INTO quiz(q_name,q_marks,
    q_duration,course_id) VALUES 
    ('$qname','$qmarks','$qdur',
    '$cid')
    ";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Quiz Added Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to add quiz</div>';
      }
    }
  }
}
?>
<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1>ADD NEW QUIZ</h1>

  <div class="inset">
  <p>
    <label for="cid">Course Id:</label>
    <input type="text" name="cid" id="cid" value = "<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly>
  </p>
  <p>
    <label for="name">Quiz Name:</label>
    <input type="text" name="quiz_name" id="quiz_name">
  </p>
  <p>
    <label for="quiz_marks">Marks per Question</label>
    <input type="text" name="quiz_marks" id="quiz_marks">
  </p>
  <p>
    <label for="quiz_dur">Duration</label>
    <input type="text" name="quiz_dur" id="quiz_dur">
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