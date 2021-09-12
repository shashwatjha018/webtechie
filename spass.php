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

if(isset($stuEmail)){
  $sql = "SELECT stu_img FROM student WHERE 
  stu_email = '$stuEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stu_img = $row['stu_img'];
}

if(isset($_REQUEST['stuPassUpdateBtn'])){
  //Checking Empty Fields
  if(($_REQUEST['email'] == "")||
  ($_REQUEST['password'] == "") ||($_REQUEST['c_password'] == "")){
    $passmsg = '<br><p
    style = "text-align:center"> Fill all the fields. </p>';
  }
  elseif($_REQUEST['password'] != $_REQUEST['c_password']){
    $passmsg = '<br><p 
    style = "text-align:center"> Password do not match. </p>';
  }
  else{
    $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1){
      $stuPass = $_REQUEST['password'];
      $sql = "UPDATE student SET stu_pass= '$stuPass' 
      WHERE stu_email = '$stuEmail'";
          //Check if values added successfully in DB
    if($conn->query($sql) == TRUE){
      $passmsg = '<div class = "alert alert-success" 
      style = "text-align:center">
      Password Changed Successfully</div>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $passmsg = '<div class = "alert alert-danger" 
        style = "text-align:center">
        Unable to change password</div>';
      }
    }


    }
    
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  background:black;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 74px;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 5px 5px 5px 25px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: black;
  background:#F5A7A7;
  padding: 5px 5px 5px 25px;
}

.sidebar img{
  border-radius:50%;
  margin-bottom:10px;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap");

:root {
  --light: #f9f9f9;
  --dark: #1f1f1f;
  --main: #F5A7A7;
  --main-hover: #F5A7A7;
}

.updateprofile {
  display: flex;
  font-family: "Roboto", sans-serif;
  display: flex;
  justify-content: center;
}

.checkout {
  width: 90%;
  max-width: 500px;
  min-width: 300px;
  height: 450px;
  background: var(--dark);
  color: var(--light);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.8);
}


.input-group {
  width: 100%;
  padding: 20px 30px 20px 0px;
}

.label {
  color: var(--main);
  text-transform: uppercase;
  display: block;
  font-size: 14px;
  margin-bottom: 5px;
}

.input {
  font-family: inherit;
  background: none;
  border: none;
  border-radius: 0px;
  border-bottom: 1px solid var(--main);
  width: 100%;
  color: var(--light);
  font-size: 16px;
  position: relative;
}

.input::placeholder {
  color: var(--main);
}

.input:focus {
  outline: none;
  border-bottom-color: var(--light);
}

.input:focus::placeholder {
  color: var(--light);
}

.input-group.double {
  display: flex;
  justify-content: space-between;
}


.inputs {
  display: flex;
  justify-content: space-between;
}

.inputs .input {
  width: 45%;
  text-align: center;
}

.slash {
  color: var(--main);
  font-size: 18px;
}

.btn-cont {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;
}

.button {
  background: var(--main);
  border: none;
  border-radius: 0px;
  font-family: inherit;
  color:black;
  font-size: 16px;
  padding: 5px 10px;
  cursor: pointer;
  margin-right:30px;
}

.button:hover {
  background: var(--main-hover);
}
/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>
<?php

include('usernav.php');
?>


<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <center><img src="<?php echo $stu_img; ?>" alt="studentimage" width="200px" height="200px"></center>
  <a href="update.php">Update Profile</a>
  <a href="mycourses.php">My Courses</a>
  <a href="addfeedback.php">Add Feedback</a>
  <a href="spass.php">Change Password</a>
</div>

<div id="main">

  <button class="openbtn" onclick="openNav()">☰</button>  
  <div class="updateprofile">
  <section class="checkout">
  <h2 class="text-center my-4">Change Password</h2>
  <br>
  <form class="checkout-form">
    <div class="input-group">
      <label class="label" for="email">Email:</label>
      <input type="email" class="input" name="email" id="email"
      value="<?php if(isset($stuEmail)){echo $stuEmail;}?>"readonly>
    </div>
    <div class="input-group">
      <label class="label" for="password">New Password:</label>
      <input type="password" class="input" name="password" id="password">
    </div>
    <div class="input-group">
      <label class="label" for="c_password">Confirm New Password:</label>
      <input type="password" class="input" name="c_password" id="c_password">
    </div>
    
    <div class="btn-cont">
      <button type="submit" class="button" name="stuPassUpdateBtn">
      Update</button>
      <button type="reset" class="button">Reset</button>
    </div>
    <br>
    <br>
    <?php if(isset($passmsg)){echo $passmsg;}?>
  </form>
</section>
  </div>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</body>
</html> 