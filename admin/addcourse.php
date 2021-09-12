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

if(isset($_REQUEST['courseSubmitBtn'])){
  //Checking for empty fields
  if(($_REQUEST['course_name'] == "")||
  ($_REQUEST['course_desc'] == "")||
  ($_REQUEST['course_author'] == "")||
  ($_REQUEST['course_duration'] == "")||
  ($_REQUEST['course_price'] == "")||
  ($_REQUEST['course_original_price'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center">
    Fill all the Fields</div>';
  } 
  else{
    //Capture the Data from i/p
    $course_name = $_REQUEST['course_name'];
    $course_desc = $_REQUEST['course_desc'];
    $course_author = $_REQUEST['course_author'];
    $course_duration = $_REQUEST['course_duration'];
    $course_price = $_REQUEST['course_price'];
    $course_original_price = $_REQUEST['course_original_price'];
    $course_image = $_FILES['course_img']['name'];
    $course_image_temp = $_FILES['course_img']['tmp_name'];
    $img_folder = '../images/courseimg/'.$course_image;
    move_uploaded_file($course_image_temp,$img_folder);

    //Insert into db

    $sql = "INSERT INTO course(course_name,course_desc,
    course_author,course_img,course_duration,
    course_price,course_original_price) VALUES 
    ('$course_name','$course_desc','$course_author','$img_folder',
    '$course_duration','$course_price','$course_original_price')
    ";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Course Added Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to add course</div>';
      }
    }
  }
}
?>

<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">ADD NEW COURSE</h1>
  <div class="inset">
  <p>
  <label class="form-label" for="course_name">Course name</label>
  <input type="text" id="course_name" class="form-control" name = "course_name" />
  </p>
  <p>
  <label class="form-label" for="course_desc">Course description</label>
  <textarea cols="30" rows="5" id="course_desc" class="form-control" name = "course_desc" id="textareaa"></textarea>
  </p>
  <p>
  <label class="form-label" for="course_author">Author</label>
  <input type="text" id="course_author" class="form-control" name = "course_author" />
  </p>
  <p>
  <label class="form-label" for="course_duration">Duration</label>
  <input type="text" id="course_duration" class="form-control" name = "course_duration" />
  </p>
  <p>
  <label class="form-label" for="course_original_price">Course Original Price</label>
  <input type="number" id="course_original_price" class="form-control" name = "course_original_price" />
  </p>
  <p>
  <label class="form-label" for="course_price">Cource Selling Price</label>
  <input type="number" id="course_price" class="form-control" name = "course_price" />
  </p>
  <p>
  <label for="course_img" class="form-label">Course Image</label>
  <input class="form-control" type="file" id="course_img" name = "course_img" >
  </p>
  
  </div>
  <p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="courseSubmitBtn" id="courseSubmitBtn">
    Add Course
  </button>

  <!--Go Back btn -->
  <a href="courses.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>