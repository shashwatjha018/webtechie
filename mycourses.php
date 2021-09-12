
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




?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
  margin-top: 0%;
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
#team i 
        {
            font-size: 26px;
            color: #555;
        }

        #team p 
        {
            font-weight: 500;
        }

        #team .card 
        {
            border-radius: 0;
            box-shadow: 5px 5px 15px #F5A7A7;
            transition: all 0.3s ease-in;
            -webkit-transition: all 0.3s ease-in;
            -moz-transition: all 0.3s ease-in;

        }

        #team .card:hover 
        {
            background: #F5A7A7;
            border-radius: 5px;
            border: none;
            box-shadow: 5px 5px 10px #9e9e9e;
        }

        #team .card:hover h3,
        #team .card:hover i 
        {
            color: #fff;
        }
        .team h1{
    font-size: 36px;
    color:white;

}
.card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
.sideBySideForm{
display: inline-block;
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
  <div class="all-content">
  <center><div class="team">
            <h1>MY COURSES</h1>
        </div></center>
  <section id="team">
        <div class="container my-1 py-5 text-center">
      <div class="row">
      <center>
        <div class="col-sm-7">

        <?php 
        if(isset($stuEmail)){
          $sql = "SELECT co.order_id, c.course_id , c.course_name, c.course_duration, 
          c.course_desc, c.course_img, c.course_author,c.course_original_price,c.course_price FROM
          courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuEmail'";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            $arr = array();
            $i = 0; 
            while($row = $result->fetch_assoc()){ 
              $cid = $row['course_id'];
              array_push($arr,$cid);?>
            <!-- $_SESSION['cid'] = $row['course_id']; 
             -->
           

              <center>
          <div class="card mb-5 mx-auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="card-title"><?php echo $row['course_name']?></h2>
                            <p class="card-text">
                                <?php echo $row['course_desc']?><br>
                              <b>Duration : <?php echo $row['course_duration']?> </b><br>
                              <b>Author : <?php echo $row['course_author']?> </b>                             
                            </p>
                        </div>
                        <div class="col-sm-6 text-right">
                            <img class="" src="<?php echo str_replace('..','.',$row['course_img'])?>" alt="Card image cap" width="200" height="200">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small>
                        <span class="font-weight-bolder">&#8377 <?php echo $row['course_price'] ?></span></p>
                        
                        <form action="viewlessons.php" method="POST" class="sideBySideForm">
                        <input type="hidden" name="cid" value = "<?php echo $arr[$i]; ?>">
                        <button class = "btn btn-dark px-3 py-1 mb-3" type="submit" name = "btn-cid">Watch Modules</button>
                        </form> 
                        
                        <form action="shashaQuiz.php" method="POST" class="sideBySideForm">
                        <input type="hidden" name="cid" value = "<?php echo $arr[$i]; ?>">
                        <button class = "btn btn-dark px-3 py-1 mb-3" type="submit" name = "btn-cid">Take Quizes</button>
                        </form> 

                        

                </div>
          </div>
          </center>
        
              <?php
              $i++;
            }
           
          }else {
            echo'hi';
          }
        }else {echo'No';}
        print_r($arr);
        ?>
</div>
</center>
            </div>
        </div>
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