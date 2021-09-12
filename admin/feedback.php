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
  <h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">List Of Feedbacks</h4>
<?php 
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
?>
<div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
    <table class="table" style="background:#100901;color:white">
      <thead style="background:white; color:black">
        <tr>
          <th scope="col">Feedback ID</th>
          <th scope="col">Content</th>
          <th scope="col">Student ID</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php while ($row = $result->fetch_assoc()){
       echo '<tr>';
        echo  '<td data-label = "Course ID" scope="row">'.$row['f_id'].'</td>';
        echo  '<td data-label = "Name" style="text-align:left;width:550px;">'.$row['f_content'].'</td>';
        echo  '<td data-label ="Description">'.$row['stu_id'].'</td>';
        echo  '<td data-label ="Action">';
        echo   '
            <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["f_id"].'>
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
   No Feedbacks</h3></div></center>';
 } 
 if (isset($_REQUEST['delete'])){
  $sql = "DELETE FROM feedback WHERE 
  f_id = {$_REQUEST['id']}";
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

<?php include('./footer.php');?>






 