<?php 
if (!isset($_SESSION)){
  session_start();
}

include('./dbConnection.php');
if (isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
}else {
  $stuEmail = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEBTECHIE</title>
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Font Awesome CSS-->
    <link rel="stylesheet" href="css/all.min.css">
  <style>
    .all-content {
      padding-top:100px;
      padding-right:18%;
      padding-left:18%;
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
    font-size: 40px;
    
    color:#F5A7A7;
}
  </style>
</head>
<body>
  <?php 
  include('navmain.php');
  ?>

  <div class="all-content">
  <section id="team">
  <center><div class="team">
            <h1>ALL COURSES</h1>
        </div></center>
        <div class="container my-3 py-5 text-center">
            <div class="row">

            <?php 
            $sql = "SELECT * FROM course ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <div class="col-md-4 col-md-4 mb-4 pt-1">
                    <div class="card h-100">
                    <img class="card-img-top img-fluid" src="'. str_replace('..','.',$row['course_img']).'" 
                    alt="Card image cap" width="163.29px" height="163.29px">
                      <div class="card-body">
                        <h2 class="card-title">'.$row['course_name'].'</h2>
                        <p clas="card-text">'.$row['course_desc'].'</p>
                      </div>';
                  $sql = "SELECT * FROM courseorder WHERE course_id = '".$course_id."' AND stu_email = '".$stuEmail."' ";
                  $res = $conn->query($sql);
                  if($res->num_rows > 0){
                   while($r = $res->fetch_assoc()){
                     echo '
                     <div class="card-footer">
                     <p></p>
                     <a class="btn btn-primary text-white font-weight-bolder" 
                        href="mycourses.php">Enrolled
                      </a>
                      </div></div>
                      </div>';
                   }}
                   else{
                     echo '<div class="card-footer">
                     <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small>
                     <span class="font-weight-bolder">&#8377 '.$row['course_price'].'</span><br>
                     </p> <a class="btn btn-primary text-white font-weight-bolder" 
                     href="coursedetail.php?course_id='.$course_id.'">Enroll</a>
                   </div></div>
                   </div>';
                   }
                  }}
            ?>
            </div>
        </div>
    </section>
    </div>
  </body>
<?php 
include('footer.php');
?>
  </html>