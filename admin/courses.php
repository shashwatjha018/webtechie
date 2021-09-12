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
  <!-- Table start -->
<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">List Of Courses</h4>
<?php 
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
?>
<div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
    <table class="table" style="background:#100901;color:white">
      <thead style="background:white; color:black">
        <tr>
          <th scope="col">Course ID</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()){
       echo '<tr>';
        echo  '<td data-label = "Course ID" scope="row">'.$row['course_id'].'</td>';
        echo  '<td data-label = "Name">'.$row['course_name'].'</td>';
        echo  '<td data-label ="Description">'.$row['course_author'].'</td>';
        echo  '<td data-label ="Action">';
        echo   '<form action="editcourse.php" method="POST" class="d-inline">
        <input type="hidden" name="id" value='.$row["course_id"].'>
        <button type="submit" class="btn btn-info mr-3" name="view" value="View" id="view">
              <i class="fas fa-edit"></i>
            </button>
            </form>
            <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["course_id"].'>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete" id="delete">
              <i class="far fa-trash-alt"></i>
            </button>
            </form>';
        echo  '</td>';
      echo '</tr>';
       } ?>
      </tbody>
    </table>
 <?php } else {
   echo '<center><div class = "alert alert-success" 
   style = "text-align:center; width:500px;"><h3>
   No Courses Available</h3></div></center>';
 } 
 if (isset($_REQUEST['delete'])){
  $sql = "DELETE FROM course WHERE 
  course_id = {$_REQUEST['id']}";
  if($conn -> query($sql) == TRUE){
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

<!-- Table End -->
</div>
</div>

<br>
<div class="add">  
<a class="box" href="addcourse.php" style="text-decoration:none">
<i style="padding:0px 5px 0px 5px"class="fas fa-plus">
<span class="add-btn">ADD COURSE</span>
</i>   
</a>
</div>
<br>
<br>
<?php include('./footer.php');?>

