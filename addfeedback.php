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

$sql = "SELECT * FROM student WHERE 
stu_email = '$stuEmail'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$stuId = $row['stu_id'];

if(isset($_REQUEST['submitFeedbackBtn'])){
  if(($_REQUEST['f_content'] == "")){
    $passmsg = '<br><center><p>Fill all Fields</p></center>';
  }else{
    $fcontent = $_REQUEST["f_content"];

    $sql = "INSERT INTO feedback (f_content,stu_id) 
    VALUES ('$fcontent','$stuId')";

    if($conn->query($sql) == TRUE){
      $passmsg = '<br><p
      style = "text-align:center">
      Feedback Added Successfully</p>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $passmsg = '<br><p 
        style = "text-align:center">
        Unable to add feedback</p>';
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

#main 
{
  transition: margin-left .5s;
  padding: 0px 16px;
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
  <br>
  <h2>Add Feedback</h2><br>
  <h4 class="text-center my-4">Share your Experience With Us !</h4>
  <br>
  <form class="checkout-form">
    <div class="input-group">
      <label class="label" for="stuId">Student ID:</label>
      <input type="text" class="input" name="stuId" id="stuId"
      value="<?php if(isset($stuId)){echo $stuId;}?>"readonly>
    </div>
    <div class="input-group">
      <label class="label" for="f_content">Write Feedback:</label>
      <textarea class="input" name="f_content" rows="5" cols="30"
      id="f_content"></textarea>
    </div>
    
    <div class="btn-cont">
    <center>
      <button type="submit" class="button" name="submitFeedbackBtn">
      Submit</button></center>
    </div>
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