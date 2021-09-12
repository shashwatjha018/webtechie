<?php
if(!isset($_SESSION)){
  session_start();
}
if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
}else{
  echo "<script> location.href='./home.php';</script>";
}

include('./dbConnection.php');

if(isset($stuEmail)){
  $sql = "SELECT stu_img FROM student WHERE 
  stu_email = '$stuEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stu_img = $row['stu_img'];
}

// $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
$result = $conn->query("SELECT * FROM student WHERE stu_email = '$stuEmail'");
if (($result->num_rows) == 1){
  $row = $result->fetch_assoc();
  $stuId = $row["stu_id"];
  $stuName = $row["stu_name"];
  $stuOcc = $row["stu_occ"];
  $stuImg = $row["stu_img"];
}

if(isset($_REQUEST['updateStuNameBtn'])){
  if(($_REQUEST['stuName']=='')){
    $passmsg = '<p>Fill all Fields</p>';
  }else{
    $stuName = $_REQUEST["stuName"];
    $stuOcc = $_REQUEST["stuOcc"];
    $stu_image = $_FILES['stuImg']['name'] ?? null;
    $stu_image_temp = $_FILES['stuImg']['tmp_name'] ?? null;
    $stu_img_folder = './images/stu/'.$stu_image;
    move_uploaded_file($stu_image_temp, $stu_img_folder);

    $sql = "UPDATE student SET stu_name = '$stuName',
    stu_occ = '$stuOcc',stu_img = '$stu_img_folder'
    WHERE stu_email = '$stuEmail' ";

    if($conn->query($sql) == TRUE){
      $passmsg = '<p
      style = "text-align:center">
      Details Updated Successfully</p>';
    }
    else{
      if($conn->query($sql) == FALSE){
        $passmsg = '<p 
        style = "text-align:center">
        Unable to update details</p>';
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
  align-items: center;
  justify-content: center;
}

.checkout {
  width: 70%;
  max-width: 500px;
  min-width: 300px;
  height: 600px;
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
  width: 50%;
  font-family: inherit;
  color:black;
  font-size: 16px;
  padding: 5px 10px;
  cursor: pointer;
}

.button:hover {
  background: var(--main-hover);
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

#main 
{
  transition: margin-left .5s;
  padding: 16px;
}

/*animate*/


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
  <h2 class="text-center my-4">Update Profile</h2>
  <br>
  <form class="checkout-form" action="" method="POST" enctype="multipart/form-data">
    <div class="input-group">
      <label class="label" for="stuID">Student ID:</label>
      <input type="text" class="input" name="stuId" id="stuId"
      value="<?php if(isset($stuId)){echo $stuId;}?>"readonly>
    </div>
    <div class="input-group">
      <label class="label" for="stuEmail">Email:</label>
      <input type="email" class="input" name="stuEmail" id="stuEmail"
      value = "<?php if(isset($stuEmail)){echo $stuEmail;}?>" readonly>
    </div>
    <div class="input-group">
      <label class="label" for="stuName">Name:</label>
      <input type="text" class="input" name="stuName" id="stuName"
      value="<?php if(isset($stuName)){echo $stuName;}?>">
    </div>
    <div class="input-group">
      <label class="label" for="stuOcc">Occupation:</label>
      <input type="text" class="input" name="stuOcc" id="stuOcc"
      value="<?php if(isset($stuOcc)){echo $stuOcc;}?>">
    </div>
    <div class="input-group">
      <label class="label" for="stuImg">Upload Image:</label>
      <input type="file" class="input" name="stuImg" id="stuImg">
    </div>
    
    <div class="btn-cont">
      <button type="submit" class="button" name="updateStuNameBtn">
        Update</button>
      <?php if(isset($passmsg)){echo $passmsg;}?>
    </div>
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