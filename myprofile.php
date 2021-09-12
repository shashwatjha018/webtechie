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

if(isset($stuEmail)){
  $sql = "SELECT stu_name FROM student WHERE 
  stu_email = '$stuEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stuname = $row['stu_name'];
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
  height: 500px;
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
.profile{
  background:black;
  margin-top:5%;
}

.right{
  /* background:black; */
  margin-left:30%;
  margin-right:30%;
  padding-left:20px;
  margin-top:10%;
}

.right .text1 {
            font-size: 44px;
            color: white;
            text-align: left;

        }

        .right .text2 {

            font-size: 50px;
            font-weight: 550;
            animation: type 3s steps(14);
            overflow: hidden;
            white-space: nowrap;
            border-right: 4px solid white;
            width: 14ch;
            color: white;
        }



        @keyframes type {
            0% {
                width: 0ch;
            }

            50% {
                width: 14ch;
            }
        }

.blob {
  position: absolute;
  top: 0;
  left: 0;
  fill: #f5a7a7;
  width: 50vmax;
  z-index: -1;
  animation: move 10s ease-in-out infinite;
  transform-origin: 50% 50%;
}

@keyframes move {
  0%   { transform: scale(1)   translate(10px, -30px); }
  38%  { transform: scale(0.8, 1) translate(80vw, 30vh) rotate(160deg); }
  40%  { transform: scale(0.8, 1) translate(80vw, 30vh) rotate(160deg); }
  78%  { transform: scale(1.3) translate(0vw, 50vh) rotate(-20deg); }
  80%  { transform: scale(1.3) translate(0vw, 50vh) rotate(-20deg); }
  100% { transform: scale(1)   translate(10px, -30px); }
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
  <center><img src="<?php echo $stu_img ?>" alt="studentimage" width="200px" height="200px"></center>
  <a href="update.php">Update Profile</a>
  <a href="mycourses.php">My Courses</a>
  <a href="addfeedback.php">Add Feedback</a>
  <a href="spass.php">Change Password</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
  <div class="right transbox">
    <div class="text1">Hi ,<span style="color:grey;font-size:52px"> <?php echo $stuname ?> </span>! <br> Welcome to </div>
    <div class="text2">YOUR <span style="color:grey">PROFILE.</span></div>
    </div>
    <br>
    </div>
  
  <div class="blob">
  <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 310 350">
  <path d="M156.4,339.5c31.8-2.5,59.4-26.8,80.2-48.5c28.3-29.5,40.5-47,56.1-85.1c14-34.3,20.7-75.6,2.3-111  c-18.1-34.8-55.7-58-90.4-72.3c-11.7-4.8-24.1-8.8-36.8-11.5l-0.9-0.9l-0.6,0.6c-27.7-5.8-56.6-6-82.4,3c-38.8,13.6-64,48.8-66.8,90.3c-3,43.9,17.8,88.3,33.7,128.8c5.3,13.5,10.4,27.1,14.9,40.9C77.5,309.9,111,343,156.4,339.5z"/>
  </svg>
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