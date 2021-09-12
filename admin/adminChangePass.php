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

$adminEmail = $_SESSION['adminLogEmail'];
//Check if fields are empty
if(isset($_REQUEST['update'])){
  //Checking Empty Fields
  if(($_REQUEST['email'] == "")||
  ($_REQUEST['password'] == "") ||($_REQUEST['c_password'] == "")){
    $msg = '<div class = "alert alert-warning " 
    style = "text-align:center"> Fill all the fields. </div>';
  }
  elseif($_REQUEST['password'] != $_REQUEST['c_password']){
    $msg = '<div class = "alert alert-danger " 
    style = "text-align:center"> Password do not match. </div>';
  }
  else{
    $sql = "SELECT * FROM admin WHERE admin_email = '$adminEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1){
      $adminPass = $_REQUEST['password'];
      $sql = "UPDATE admin SET admin_pass= '$adminPass' 
      WHERE admin_email = '$adminEmail'";
          //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $msg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Password Changed Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $msg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to change password</div>';
      }
    }


    }
    
  }
}
?>
<?php include('./headerStyle.php');?>
<form class = "col-md-7" action="" method="POST" enctype="multipart/form-data">
  <h1 style="font-size:30px;color:#f5a7a7">CHANGE PASSWORD</h1>

  <div class="inset">
  <p>
    <label for="email">Email</label>
    <input type="text" name="email" id="email"
    value="<?php echo $adminEmail ?>" readonly>
  </p>
  <p>
    <label for="password">New Password</label>
    <input type="password" name="password" id="password">
  </p>
  <p>
    <label for="c_password">Confirm New Password</label>
    <input type="password" name="c_password" id="c_password">
  </p>
</div>
  <!-- <p>
    <center>
    <input type="submit" name="update" id="update" value="UPDATE">
    <button type="submit" id="cancel">
      <a href="#" style = "text-decoration:none;color:black">
      RESET
      </a>
    </button>
    </center>
  </p> 
   <?php if(isset($msg)){echo $msg;} ?> -->
   <p >
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-2" name="update" id="update">
    Change Password
  </button>

  <!--Go Back btn -->
  <a href="students.php"  class="btn btn-danger btn-block mb-2" >Cancel</a>
  <!--Flash Msgs -->
  <?php if(isset($msg)){echo $msg;} ?>
  </p>
</form>
<?php include('./footer.php');?>