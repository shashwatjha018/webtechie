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


if(isset($_REQUEST['lesson'])){
  $lesson_id = $_REQUEST['lesson_id'];
  $_SESSION['lesson_id'] = "$lesson_id";
}else{
  echo "<script> location.href='./viewlessons.php';</script>";
}
?>
<style>
  .content {
    color:white;
    background:black;
    padding-top:50px;
    padding-bottom:50px;
    padding-left:70px;
    padding-right:70px;
  }
  .box {
      height: 50px;
      background-color: #F5A7A7;
      padding: 10px;
      text-decoration: none;
      color: black;
      border:2px solid black;
      border-radius:5px;
    }

    .box:hover {
      color: black;
      background: white;
      height: 50px;
      padding: 10px;
      text-decoration: none;
      border:2px solid black;
      border-radius:5px;
    }
</style>
<?php 
include('usernav1.php');
?>

  <?php
$sql = "SELECT * FROM lesson WHERE lesson_id = '$lesson_id'";
$result = $conn->query($sql);
if ($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    $course_name= $row['course_name'];
    $lesson_name = $row['lesson_name'];
    $lesson_theory = $row['lesson_theory'];
    $link = $row['lesson_link'];
    $notes = $row['lesson_notes'];

  }
}
          ?>
    <body>          
          <div class="content">
          <form method = "POST" action="viewlessons.php">
            <button name = "check-btn" type="submit" class = "btn btn-dark " class="box">
            VIEW MODULES
            </button>
          </form>
          <br>
          <br>
              <h3>Course Name:
    <?php echo $course_name;?>
  </h3>
  <h3>Lesson Name:
    <?php echo $lesson_name;?>
  </h3>
  <center>
  <h1>Video</h1>
  <video src="<?php echo str_replace('..','.',$link)?>" width="800" height="500" controls></video>
  </center>
  <h1>Theory</h1>
  <p>
    <?php echo $lesson_theory; ?>
  </p>
  <br>

  <h1>Notes</h1>
  <p>Click here to download notes : <a href="<?php echo str_replace('..','.',$notes)?>"class="box" target="_blank"> NOTES </a></p>


</div>
</body>