<?php 

if(!isset($_SESSION)){
  session_start();
}

include('./header.php');
include('../dbConnection.php');
include('./headerStyle.php');

if(isset($_SESSION['is_admin_login'])){
   $adminEmail = $_SESSION['adminLogEmail'];
} else{
  echo "<script> location.href='../home.php';</script>";
}

//When submit btn is pressed

if(isset($_REQUEST['requpdate'])){
  //Checking for empty fields
  if( ($_REQUEST['course_id'] == "")||
  ($_REQUEST['course_name'] == "")||
  ($_REQUEST['lesson_name'] == "")||
  ($_REQUEST['lesson_desc'] == "")||
  ($_REQUEST['lesson_theory'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center">
    Fill all the Fields</div>';
  } 
  else{
    //Capture the Data from i/p
    $course_id = $_REQUEST['course_id'];
    $course_name = $_REQUEST['course_name'];
    $lesson_name = $_REQUEST['lesson_name'];
    $lesson_id = $_REQUEST['lesson_id'];
    $lesson_desc = $_REQUEST['lesson_desc'];
    $lesson_theory = $_REQUEST['lesson_theory'];
    $lesson_link = $_FILES['lesson_link']['name'];
    // $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
    $lesson_link_folder = '../lessonvid/'.$lesson_link;
    // move_uploaded_file($lesson_link_temp,$lesson_link_folder);
    $lesson_notes = $_FILES['lesson_notes']['name'];
    // $lesson_notes_temp = $_FILES['lesson_notes']['tmp_name'];
    $lesson_notes_folder = '../lessonnotes/'.$lesson_notes;
    // move_uploaded_file($lesson_notes_temp,$lesson_notes_folder);

    //Update into db

    $sql = "UPDATE lesson SET 
    lesson_id = '$lesson_id', 
    lesson_name = '$lesson_name',
    course_id = '$course_id',
    lesson_desc = '$lesson_desc', 
    lesson_theory = '$lesson_theory',
    course_name = '$course_name', 
    lesson_link = '$lesson_link_folder',
    lesson_notes = '$lesson_notes_folder'
    WHERE lesson_id = '$lesson_id'
    ";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Module Details Updated Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to update course details</div>';
      }
    }
  }
}
?>

<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">UPDATE MODULE DETAILS</h1>

  <!--When someone presses edit button-->
  <?php
  if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM lesson WHERE lesson_id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  } 
  ?>
<div class="inset">
  <p>
    <label for="course_id">Course Id</label>
    <input type="text" name="course_id" id="course_id" 
    value = "<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>"
    readonly>
  </p>
  <p>
    <label for="course_name">Course Name</label>
    <input type="text" name="course_name" id="course_name" 
    value = "<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>" 
    readonly>
  </p>
  <p>
    <label for="lesson_id">Module Id</label>
    <input type="text" name="lesson_id" id="lesson_id" 
    value = "<?php if(isset($row['lesson_id'])){echo $row['lesson_id'];}?>"
    readonly>
  </p>
  <p>
    <label for="lesson_name">Module Name</label>
    <input type="text" name="lesson_name" id="lesson_name"
    value = "<?php if(isset($row['lesson_name'])){echo $row['lesson_name'];}?>">
  </p>
  <p>
    <label for="lesson_desc">Module Description</label>
    <textarea name="lesson_desc" id="lesson_desc">
    <?php if(isset($row['lesson_desc'])){echo $row['lesson_desc'];}?>
    </textarea>
  </p>
  <p>
    <label for="lesson_theory">Module Theory</label>
    <textarea name="lesson_theory" id="lesson_theory" cols="30" rows="8">
    <?php if(isset($row['lesson_theory'])){echo $row['lesson_theory'];}?>
    </textarea>
  </p>
  <p>
    <label for="lesson_link">Module Video Link</label>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" 
    src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];}?>"
    allowfullscreen></iframe>
    </div>
    <input type="file" name="lesson_link" id="lesson_link">
  </p>
  <p>
    <label for="lesson_notes">Module Notes Link</label>
    <a href="<?php if(isset($row['lesson_notes'])){echo $row['lesson_notes'];}?>" target="_blank">notes</a>
    <input type="file" name="lesson_notes" id="lesson_notes">
  </p>
  </div>
  <p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="requpdate" id="requpdate">
    Update
  </button>

  <!--Go Back btn -->
  <a href="lessons.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>