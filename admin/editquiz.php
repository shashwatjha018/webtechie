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
//UPDATE
if(isset($_REQUEST['add'])){
  //Checking Empty Fields
  if(($_REQUEST['quiz_name'] == "")||($_REQUEST['quiz_marks'] == "")||
  ($_REQUEST['quiz_dur'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  else{
    $qid = $_REQUEST['quiz_id'];
    $cid = $_SESSION['course_id'];
    $qname = $_REQUEST['quiz_name'];
    $qmarks = $_REQUEST['quiz_marks'];
    $qdur = $_REQUEST['quiz_dur'];
    $sql = "UPDATE quiz SET q_name = '$qname',
    q_marks = '$qmarks', q_duration = '$qdur' 
    WHERE q_id = '$qid'
    ";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Quiz Updated Successfully</div>';
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
  <h1>EDIT QUIZ</h1>
   <!--When someone presses edit button-->
   <?php
  if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM quiz WHERE q_id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  } 
  ?>

  <div class="inset">
  <p>
    <label for="quiz_id">Quiz Id:</label>
    <input type="text" name="quiz_id" id="quiz_id"
    value = "<?php if(isset($row['q_id'])){echo $row['q_id'];}?>" readonly>
  </p>
  <p>
    <label for="cid">Course Id:</label>
    <input type="text" name="cid" id="cid" value = "<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly/>
  </p>
  <p>
    <label for="name">Quiz Name:</label>
    <input type="text" name="quiz_name" id="quiz_name"
    value = "<?php if(isset($row['q_name'])){echo $row['q_name'];}?>">
  </p>
  <p>
    <label for="quiz_marks">Marks per Question</label>
    <input type="text" name="quiz_marks" id="quiz_marks"
    value = "<?php if(isset($row['q_marks'])){echo $row['q_marks'];}?>">
  </p>
  <p>
    <label for="quiz_dur">Duration</label>
    <input type="text" name="quiz_dur" id="quiz_dur"
    value = "<?php if(isset($row['q_duration'])){echo $row['q_duration'];}?>">
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