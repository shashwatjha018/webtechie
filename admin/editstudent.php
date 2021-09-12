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
  if(($_REQUEST['stu_id']== "")||($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") ||
  ($_REQUEST['password'] == "") ||($_REQUEST['c_password'] == "")
  ){

    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  elseif($_REQUEST['password'] != $_REQUEST['c_password']){
    $msg = '<div class = "alert alert-danger " 
    style = "text-align:center"> Password do not match. </div>';
  }
  else{
    //Capture the Data from i/p
    $stu_id = $_REQUEST['stu_id'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password = $_REQUEST['c_password'];
    $occupation = $_REQUEST['occupation'];

    //Update into db

    $sql = "UPDATE student SET stu_id = '$stu_id',stu_name = '$name',
    stu_email = '$email',stu_pass = '$password',
    stu_occ = '$occupation'
    WHERE stu_id = '$stu_id' ";

    //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      User Details Updated Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to update user details</div>';
      }
    }
  }
}
?>

<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">UPDATE  USER  DETAILS</h1>
  <?php
  if(isset($_REQUEST['view'])){
    $sql = "SELECT * FROM student WHERE stu_id = '{$_REQUEST['id']}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  } 
  ?>
  <div class="inset">
  <p>
    <label for="stu_id">User ID</label>
    <input type="text" name="stu_id" id="stu_id"
    value = "<?php if(isset($row['stu_id'])){echo $row['stu_id'];}?>" readonly>
  </p>
  <p>
    <label for="name">Name</label>
    <input type="text" name="name" id="name"
    value = "<?php if(isset($row['stu_name'])){echo $row['stu_name'];}?>">
  </p>
  <p>
    <label for="email">Email</label>
    <input type="text" name="email" id="email"
    value = "<?php if(isset($row['stu_email'])){echo $row['stu_email'];}?>">
  </p>
  <p>
    <label for="password">Password</label>
    <input type="password" name="password" id="password"
    value = "<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];}?>">
  </p>
  <p>
    <label for="c_password">Confirm Password</label>
    <input type="password" name="c_password" id="c_password"
    value = "<?php if(isset($row['stu_pass'])){echo $row['stu_pass'];}?>">
  </p>
  <p>
    <label for="occupation">Occupation</label>
    <input type="text" name="occupation" id="occupation"
    value = "<?php if(isset($row['stu_occ'])){echo $row['stu_occ'];}?>">
  </p>
</div>
<p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="requpdate" id="requpdate">
    Update
  </button>

  <!--Go Back btn -->
  <a href="students.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>