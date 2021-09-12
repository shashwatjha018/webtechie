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

if(isset($_REQUEST['btn-cid'])){
  $cid = $_REQUEST['cid'];
  $_SESSION['cid'] = $cid;
}else if(isset($_REQUEST['check-btn'])){
  $cid = $_SESSION['cid'];
}
else{
  echo "<script> location.href='./home.php';</script>";
}

include('./usernav1.php');
?>
<style>
  body{
    background:black;
  }
  .box {
      height: 50px;
      background-color: #F5A7A7;
      padding: 10px;
      text-decoration: none;
      color: black;
      margin-left:30px;
      border:2px solid black;
      border-radius:5px;
    }

    .box:hover {
      color: black;
      background: white;
      height: 50px;
      padding: 10px;
      text-decoration: none;
      margin-left:30px;
      border:2px solid black;
      border-radius:5px;
    }
</style>
<br>
<br>
<a class="box" href="mycourses.php">MY COURSES</a>

<center><div style="color:white">
            <h2>Course ID:<?php echo $cid ;?></h2><br>
            <h3 style="color:#f5a7a7">List of Modules</h3><br>
        </div></center>
<div class="container">
<table class="table table-hover table-dark " style="text-align:center;">
  <thead>
    <tr style="background:white;color:black">
      <th scope="col">Module Number</th>
      <th scope="col">Module Name</th>
      <th scope="col">View Module</th>
    </tr>
  </thead>
  <?php 
    $sql = "SELECT * FROM lesson WHERE course_id = '".$cid."'";
    $result = $conn->query($sql);
    if($result->num_rows >0){
      $num=0;
      while ($row = $result->fetch_assoc()){
        if($cid == $row['course_id']){
          $num++;
          $name = $row['course_name'];
        echo '

  <tbody>
        <tr>
        <th scope="row">'.$num.'</th>
        <td>'.$row['lesson_name'].'</td>
        <td><form action="lessondetails.php" method = "POST" class="d-inline"> 
      <input type="hidden" name="lesson_id" value='.$row["lesson_id"].'>
      <button type = "submit"
      class = "btn btn-outline-primary"
      name = "lesson"
      value = "lesson">
        <i class = "fas fa-book"></i>
      </button>
      </form></td>
        </tr>
        ';
        }
      }
    }
  ?>
  </tbody>
</table>
</div>