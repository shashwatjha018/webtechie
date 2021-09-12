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
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
    $sql = "SELECT * FROM course where 
    course_id = {$_REQUEST['checkid']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(($row['course_id']) == $_REQUEST['checkid']){
      $_SESSION['course_id'] = $row['course_id'];
      // $_SESSION['course_name'] = $row['course_name'] ?? null;
      $_SESSION['course_name'] = $row['course_name'];
    ?>

 <h4 style="background:#F5A7A7;padding:10px; text-align:center; color:black" class="mx-4 mt-4" > Course ID:  
        <?php if (isset($row['course_id'])) { echo '<div class="add">  
 <a class="box" href="addquiz.php" style="text-decoration:none">
 <i style="padding:0px 2px 0px 2px" class="fas fa-plus">
 <span class="add-btn">ADD QUIZ</span>
 </i>   
 </a>
 </div>';echo $row ['course_id'];} else{
   echo '<p>No such course available</p>';
 }?>&nbsp &nbsp &nbsp
        Course Name : 
        <?php if (isset($row['course_name'])) {echo $row ['course_name'];}?></h4>

<?php
$sql = "SELECT * FROM quiz WHERE course_id = {$_REQUEST['checkid']}";
$result = $conn->query($sql);
if($result->num_rows > 0){
?>
<!-- Table start -->
<div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
    <table class="table" style="background:#100901;color:white">
      <thead style="background:white; color:black">
        <tr>
          <th scope="col">Quiz Id</th>
          <th scope="col">Course ID</th>
          <th scope="col">Quiz Name</th>
          <th scope="col">Quiz Marks</th>
          <th scope="col">Duration</th>
          <th scope="col">View Questions</th>
          <th scope="col">Add Question</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = $result->fetch_assoc()){
      echo '<tr>';
      echo '<th scope="row">'.$row['q_id'].'</th>';
      echo '<td>'.$row['course_id'].'</td>';
      echo '<td>'.$row['q_name'].'</td>';
      echo '<td>'.$row['q_marks'].'</td>';
      echo '<td>'.$row['q_duration'].'</td>';
      echo '<td><form action="question.php" method = "POST" class="d-inline"> 
      <input type="hidden" name="id" value='.$row["q_id"].'/>
      <button type = "submit"
      class = "btn btn-outline-primary"
      name = "ques"
      value = "ques">
        <i class = "fas fa-eye"></i>
      </button>
      </form></td>';
      echo '<td><form action="addQuestion.php" method = "POST" class="d-inline"> 
      <input type="hidden" name="id" value='.$row["q_id"].'/>
<button type = "submit"
class = "btn btn-outline-warning"
name = "add_q"
value = "add_q">
  <i class = "fas fa-plus"></i>
</button>
</form></td>'; 
      echo '<td>
      <form action="editquiz.php" method = "POST" class="d-inline"> 
        <input type="hidden" name="id" value='.$row["q_id"].'>
      <button type = "submit"
        class = "btn btn-outline-info"
        name = "view"
        value = "view">
        <i class = "fas fa-pen"></i>
      </button>
      </form>
        <form action="" method = "POST" class="d-inline"> 
          <input type="hidden" name="id" value='.$row["q_id"].'>
          <button type = "submit"
          class = "btn btn-outline-danger"
          name = "delete"
          value = "delete">
            <i class = "far fa-trash-alt"></i>
          </button>
        </form>
      </td>';    
    echo '</tr>';
  } }?>
      </tbody>
    </table>
  </div>
</div>
<!-- Table End -->
<?php
    }
    else {
      echo '<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">Course Not found</h4>';
    }
  }
}
if (isset($_REQUEST['delete'])){
  $sql = "DELETE FROM quiz WHERE 
  q_id = {$_REQUEST['id']}";
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

  


<?php include('./footer.php');?>