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
?>
<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center;">Get Report</h4>
<center>
<form action="" method="POST">
  <div style="margin-top:20px">
    <p style="display:inline">Start Date:</p>
    <input id="startdate" name="startdate" style="display:inline-block" class="form-control form-control-sm ml-2 w-50" type="date" 
    placeholder="Search"
      aria-label="Search">
    <button style="padding:2px 12px; visibility:hidden">
      <i class="fas fa-search" aria-hidden="true"></i>
    </button>
    <p>to</p>
    <p style="display:inline">End Date:</p>
    <input id="enddate" name="enddate" style="display:inline-block" class="form-control form-control-sm ml-2 w-50" type="date" 
    placeholder="Search"
      aria-label="Search">
    <button type="submit" name="searchsubmit" style="padding:2px 12px; display:inline-block">
      <i class="fas fa-search" aria-hidden="true"></i>
    </button>
  </div>
  </form>
</center>

<?php 

if(isset($_REQUEST['searchsubmit'])){
  $startdate = $_REQUEST['startdate'];
  $enddate = $_REQUEST['enddate'];

  $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    echo '
    <div class="mx-4 mt-4 text-center">
    <div class="table-responsive">
      <table class="table" style="background:#100901;color:white">
        <thead style="background:white; color:black">
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Course ID</th>
            <th scope="col">Student Email</th>
            <th scope="col">Order Date</th>
            <th scope="col">Payment Status</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>';
        while($row = $result->fetch_assoc()){
          echo '
          <tr>
            <td data-label="ORDERID">'.$row["order_id"].'</td>
            <td data-label="COURSE ID">'.$row["course_id"].'</td>
            <td data-label="Student Email">'.$row["stu_email"].'</td>
            <td data-label="ORDER DATE">'.$row["status"].'</td>
            <td data-label="PAYMENT STATUS">'.$row["order_date"].'</td>
            <td data-label="AMOUNT">'.$row["amount"].'</td>
          </tr>';
        }
        echo '
        </tbody>
  
      </table>
    </div>
  </div>
    ';

  }else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No records Found !</div>";
  }
}

?>

<div class="add">
  <button class="box" style="text-decoration:none" onclick=window.print()>
    <i style="padding:0px 5px 0px 5px" class="fas fa-print">
      <span class="add-btn">PRINT</span>
    </i>
  </button>
</div>

<?php include('./footer.php');?>