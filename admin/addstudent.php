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


//Check if fields are empty
if(isset($_REQUEST['stuSubmitBtn'])){
  //Checking Empty Fields
  if(($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") ||
  ($_REQUEST['password'] == "") ||($_REQUEST['c_password'] == "") ||
  ($_REQUEST['occupation'] == "")){

    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  elseif($_REQUEST['password'] != $_REQUEST['c_password']){
    $msg = '<div class = "alert alert-danger " 
    style = "text-align:center"> Password do not match. </div>';
  }
  else{
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password = $_REQUEST['c_password'];
    $occupation = $_REQUEST['occupation'];

    $sql = "INSERT INTO student (stu_name,stu_email,stu_pass,stu_occ)
    VALUES ('$name','$email','$password','$occupation')";

        //Check if values added successfully in DB
        if($conn->query($sql) == TRUE){
          $msg = '<div class = "alert alert-success" 
          style = "text-align:center">
          User Added Successfully</div>';
        }
        else{
          if($conn->query($sql) == FALSE){
            $msg = '<div class = "alert alert-danger" 
            style = "text-align:center">
            Unable to add user</div>';
          }
        }
  }
}
?>

<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">ADD NEW USER</h1>

  <div class="inset">
  <p>
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
  </p>
  <p>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
  </p>
  <p>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <label for="c_password">Confirm Password</label>
    <input type="password" name="c_password" id="c_password">
  </p>
  <p>
    <label for="occupation">Occupation</label>
    <input type="text" name="occupation" id="occupation">
  </p>
</div>
<p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="stuSubmitBtn" id="stuSubmitBtn">
    Add User
  </button>

  <!--Go Back btn -->
  <a href="students.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>