<?php

if(!isset($_SESSION)){
  session_start();
}

include('./header.php');
include('../dbConnection.php');


if(isset($_SESSION['is_admin_login'])){
   $adminEmail = $_SESSION['adminLogEmail'];
} else{
  echo "<script> location.href='../home.php';</script>";
}



if(isset($_REQUEST['lessonSubmitBtn'])){
  //Checking Empty Fields
  if(($_REQUEST['course_id'] == "")||
  ($_REQUEST['course_name'] == "")||
  ($_REQUEST['lesson_name'] == "")||
  ($_REQUEST['lesson_desc'] == "")||
  ($_REQUEST['lesson_theory'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  else{
    $course_id = $_REQUEST['course_id'];
    $course_name = $_REQUEST['course_name'];
    $lesson_name = $_REQUEST['lesson_name'];
    $lesson_desc = $_REQUEST['lesson_desc'];
    $lesson_theory = $_REQUEST['lesson_theory'];
    $lesson_link = $_FILES['lesson_link']['name'];
    $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
    $lesson_link_folder = '../lessonvid/'.$lesson_link;
    move_uploaded_file($lesson_link_temp,$lesson_link_folder);
    $lesson_notes = $_FILES['lesson_notes']['name'];
    $lesson_notes_temp = $_FILES['lesson_notes']['tmp_name'];
    $lesson_notes_folder = '../lessonnotes/'.$lesson_notes;
    move_uploaded_file($lesson_notes_temp,$lesson_notes_folder);

    $sql = "INSERT INTO lesson(lesson_name,lesson_desc,lesson_link,course_id,course_name,lesson_theory,lesson_notes) 
    VALUES ('$lesson_name','$lesson_desc','$lesson_link_folder','$course_id','$course_name','$lesson_theory','$lesson_notes_folder')";

    if ($conn->query($sql) == TRUE){
      $msg = '<div class="alert alert-success" role="alert" style = "text-align:center"> Module Added Successfully </div>';
    }else {
      $msg = '<div class="alert alert-danger " role="alert" style = "text-align:center"> Unable to Add Module</div>';
    }
  }
}
?>
<?php 
  include('./headerStyle.php');
?>
<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">ADD NEW MODULE</h1>

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
    <label for="lesson_name">Module Name</label>
    <input type="text" name="lesson_name" id="lesson_name">
  </p>
  <p>
    <label for="lesson_desc">Module Description</label>
    <textarea name="lesson_desc" id="lesson_desc"></textarea>
  </p>
  <p>
    <label for="lesson_theory">Module Theory</label>
    <textarea name="lesson_theory" id="lesson_theory" cols="30" rows="8"></textarea>
  </p>
  <p>
    <label for="lesson_link">Module Video Link</label>
    <input type="file" name="lesson_link" id="lesson_link">
  </p>
  <p>
    <label for="lesson_notes">Module Notes Link</label>
    <input type="file" name="lesson_notes" id="lesson_notes">
  </p>
  </div>
  <p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="lessonSubmitBtn" id="lessonSubmitBtn">
    Add Module
  </button>

  <!--Go Back btn -->
  <a href="lessons.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>