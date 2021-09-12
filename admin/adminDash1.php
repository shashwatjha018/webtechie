<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  
  include('./header.php');
  include('../dbConnection.php');
  include('./headerStyle.php');

  if(isset($_SESSION['is_admin_login'])){
     $adminEmail = $_SESSION['adminLogEmail'];
  } else{
    echo "<script> location.href='../home.php';</script>";
  }

  $sql="SELECT * FROM course";
  $result=$conn->query($sql);
  $totalcourse= $result->num_rows;

  $sql="SELECT * FROM student";
  $result=$conn->query($sql);
  $totalstu= $result->num_rows;

  $sql="SELECT * FROM courseorder";
  $result=$conn->query($sql);
  $totalsold= $result->num_rows;

  
?>
<br>

<!-- cards start -->
<div class="row" style="color:black;">
  <div class="col-md-4 text-center">
    <div class="card m-3" style="background:#63cce7">
      <div class="card-body">
        <h5 class="card-title">Courses</h5>
        <h1 class="card-text"><?php echo $totalcourse; ?></h1>
        <a href="courses.php" class="btn">View</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 text-center ">
    <div class="card m-3" style="background:#52fe20">
      <div class="card-body">
        <h5 class="card-title">Students</h5>
        <h1 class="card-text"><?php echo $totalstu; ?></h1>
        <a href="students.php" class="btn">View</a>
      </div>
    </div>
  </div>
  <div class="col-md-4 text-center">
    <div class="card m-3" style="background:#fe7b99">
      <div class="card-body">
        <h5 class="card-title">Sold</h5>
        <h1 class="card-text"><?php echo $totalsold; ?></h1>
        <a href="getReport.php" class="btn">View</a>
      </div>
    </div>
  </div>
</div>
<br>

<!-- cards end -->

<!-- Table start -->

<div class=" text-center">
<h4 class="" style="background:#F5A7A7;padding:10px; text-align:center;">Order Details</h4>
<?php 
$sql = "SELECT * FROM courseorder";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo'
  
  <div class="table-responsive">
  <table class="table mx-2 mt-2" style="background:#100901;color:white">
    <thead class="thead-light">
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Course ID</th>
        <th scope="col">Student Email</th>
        <th scope="col">Order Date</th>
        <th scope="col">Amount</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
      echo '
      <tr>
        <td data-label ="Order ID" scope="row">'.$row["order_id"].'</td>
        <td data-label ="Course ID" >'.$row["course_id"].'</td>
        <td data-label = "Student Email">'.$row["stu_email"].'</td>
        <td data-label = "Order Date" >'.$row["order_date"].'</td>
        <td data-label = "Amount" >'.$row["amount"].'</td>
        <td data-label = "Action" >
        <form action="" method="POST" class="d-inline">
        <input type="hidden" name="id" value='.$row["co_id"].'>
        <button type="submit" class="btn btn-secondary" name="delete" value="Delete" id="delete">
          <i class="far fa-trash-alt"></i>
        </button></form>
        </td>
      </tr>';
    }
    echo '
    </tbody>
  </table>
</div>

  ';
} else {
  "No data";
}

if (isset($_REQUEST['delete'])){
  $sql = "DELETE FROM courseorder WHERE 
  co_id = {$_REQUEST['id']}";
  if($conn -> query($sql) == TRUE){
    echo '<h1 class = "alert alert-success">
    Deleted Record Successfully !
    </h1>';
    echo '<meta http-equiv="refresh" 
    content="0"; URL=?deleted"/>';
  }
  else{
    echo '<h1 class = "alert alert-danger">
    Unable to Delete Data
    </h1>';
  }
}

?>

</div>
<?php include('./footer.php');?>