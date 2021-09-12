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
if(isset($_REQUEST['ques'])){
  $qid = $_REQUEST['id'];
}
else {
  echo "<script> location.href='quiz.php';</script>";
}
$sql = "SELECT * FROM question WHERE q_id = '".$qid."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
?>
<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">Questions</h4>
<div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
    <table class="table" style="background:#100901;color:white">
      <thead style="background:white; color:black">
        <tr>
          <th scope="col">Quiz Id</th>
          <th scope="col">Question ID</th>
          <th scope="col">Question</th>
          <th scope="col">Answer</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      <?php while($row = $result->fetch_assoc()){
      echo '<tr>';
      echo '<th scope="row">'.$row['q_id'].'</th>';
      echo '<td>'.$row['ques_id'].'</td>';
      echo '<td>'.$row['ques'].'</td>';
      echo '<td>'.$row['ques_ans'].'</td>';
      echo '<td>
        <form action="" method = "POST" class="d-inline"> 
          <input type="hidden" name="id" value='.$row["ques_id"].'>
          <button type = "submit"
          class = "btn btn-outline-danger"
          name = "delete"
          value = "delete">
            <i class = "far fa-trash-alt"></i>
          </button>
        </form>
      </td>';
    echo '</tr>';
  } ?>
      </tbody>
    </table>
    </div>
</div>
    <?php 
    } else 
    {echo '<h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">Question Not found</h4>';}

if (isset($_REQUEST['delete'])){
  $sql = "DELETE FROM question WHERE 
  ques_id = {$_REQUEST['id']}";
  $sql1 = "DELETE FROM answer WHERE 
  ques_id = {$_REQUEST['id']}";
  if($conn -> query($sql) == TRUE && $conn -> query($sql1) == TRUE ){
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

<div class="add mt-5 px-2">  
<a class="box" href="quiz.php" style="text-decoration:none">
<i style="padding:0px 5px 0px 5px"class="fas fa-hand-point-left">
<span class="add-btn"></span>
</i>   
</a>
</div>
<?php if(isset($msg)){echo $msg;} ?>
<!--Table End -->