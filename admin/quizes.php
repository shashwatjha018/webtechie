<?php 
  if(!isset($_SESSION)){
    session_start();
  }
  include('./header.php');
  include('./headerStyle.php');
  include('../dbConnection.php');

  if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
  }
  else{
    echo "<script> location.href='../home.php';</script>";
  }
?>
<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">Quizzes</h4>
<center>
  <div style="margin-top:20px;">
    <form class = "col-md-7 pt-3" action="" method="POST" enctype="multipart/form-data">
      <p style="display:inline" >Course Id:</p>
      <input name="checkid" id="checkid" style = "display:inline-block" 
      class="form-control form-control-sm ml-2 w-50" type="text" placeholder="Search" aria-label="Search">
      <button style = "padding:2px 12px; display:inline-block">
      <i class="fas fa-search" aria-hidden="true"></i>
      </button>
    </form>
  </div>
</center>

<?php 
$sql = "SELECT course_id FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
    $sql = "SELECT * FROM course where 
    course_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row['course_id']) == $_REQUEST['checkid']){
      $_SESSION['course_id'] = $row['course_id'];
      $_SESSION['course_name'] = $row['course_name'];
    ?>
 <!-- <h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">
 Course ID:<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>
        &nbsp &nbsp &nbsp
        Course Name : 
        <?php if (isset($row['course_name'])) {echo $row ['course_name'];}?>
 </h4> -->



<?php
    }
  }
}
?>


  <!-- Table start -->
<div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
    <table class="table" style="background:#100901;color:white">
      <thead style="background:white; color:black">
        <tr>
          <th scope="col">Quiz Id</th>
          <th scope="col">Quiz Name</th>
          <th scope="col">Quiz Marks</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label ="Quiz Id">1</td>
          <td data-label ="Quiz Name">Quiz 1</td>
          <td data-label ="Quiz Marks">20</td>
          <td data-label ="Action">
            <button type="submit" class="btn btn-info mr-3" name="view" value="View" id="view">
              <i class="fas fa-edit"></i>
            </button>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete" id="delete">
              <i class="far fa-trash-alt"></i>
            </button>
          </td>
        </tr>
        <tr>
          <td data-label ="Quiz Id">1</td>
          <td data-label ="Quiz Name">Quiz 2</td>
          <td data-label ="Quiz Marks">50</td>
          <td data-label ="Action">
            <button type="submit" class="btn btn-info mr-3" name="view" value="View" id="view">
              <i class="fas fa-edit"></i>
            </button>
            <button type="submit" class="btn btn-secondary" name="delete" value="Delete" id="delete">
              <i class="far fa-trash-alt"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- Table End -->

<?php
if(isset($_SESSION['course_id'])){
echo '
<div class="add">  
<a class="box" href="addquiz.php" style="text-decoration:none">
<i style="padding:0px 5px 0px 5px"class="fas fa-plus">
<span class="add-btn">ADD QUIZ</span>
</i>   
</a>
</div>';
}
?>
<?php include('./footer.php');?>