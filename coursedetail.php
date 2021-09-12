<?php 
if (!isset($_SESSION)){
  session_start();
}

include('./dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    </style>
</head>
<body>
<?php 
  include('navmain.php');
?>
<div class="all-content">
      <section id="team">
      <div class="container mt-5">
      <?php 
      if (isset($_GET['course_id'])){
        $course_id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

      }
      ?>
    <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <b><h3 class="card-title">Course Name: <?php echo $row['course_name'] ?></h3></b>
                                <p class="card-text">Description:<?php echo $row['course_desc'] ?> </p>
                                <b><h5 class="card-text">Duration: <?php echo $row['course_duration'] ?></h5></b>
                            </div>
                            <div class="col-md-4 text-right">
                                <img  src="<?php echo str_replace('..','.',$row['course_img'])?>"  alt="Course Image" width="200" height="200">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <form action="checkout.php" method="post">
                          <b><p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small>
                          <span class="font-weight-bolder">&#8377 <?php echo $row['course_price'] ?></span></p></b>
                          <input type="hidden" name="id" value="<?php echo $row['course_price'] ?>">
                        <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" name="Buy">Buy Now</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
<div class="container">
<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Module Number</th>
      <th scope="col">Module Name</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = "SELECT * FROM lesson";
    $result = $conn->query($sql);
    if($result->num_rows >0){
      $num=0;
      while ($row = $result->fetch_assoc()){
        if($course_id == $row['course_id']){
          $num++;
        echo '
        <tr>
        <th scope="row">'.$num.'</th>
        <td>'.$row['lesson_name'].'</td>
        </tr>
        ';
        }
      }
    }
  ?>
  </tbody>
</table>
</div>
</section>
</div>
</body>
</html>