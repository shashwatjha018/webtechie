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

<center>
  <div style="margin-top:20px;">
  <form action="">
  <br>
  <label style="display:inline" for="checkid">Enter Course Id:</label>
  <input style = "display:inline-block" 
  class="form-control form-control-sm ml-2 w-50" id="checkid" name="checkid" type="text" placeholder="Search" aria-label="Search">
  <button type="submit" style = "padding:2px 12px; display:inline-block">
    <i class="fas fa-search" aria-hidden="true"></i>
  </button>
  </form>
  </div>
</center>

<?php
  $sql = "SELECT course_id FROM course";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id'])
    {
      $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if(($row['course_id']) == $_REQUEST['checkid'])
      {
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
        ?>
        <h4 style="background:#F5A7A7;padding:10px; text-align:center; color:black" class="mx-4 mt-4" > Course ID:  
        <?php if (isset($row['course_id'])) { echo '<div class="add">  
 <a class="box" href="addlesson.php" style="text-decoration:none">
 <i style="padding:0px 2px 0px 2px" class="fas fa-plus">
 <span class="add-btn">ADD LESSON</span>
 </i>   
 </a>
 </div>';echo $row ['course_id'];} else{
   echo '<p>No such course available</p>';
 }?>&nbsp &nbsp &nbsp
        Course Name : 
        <?php if (isset($row['course_name'])) {echo $row ['course_name'];}?></h4>
        <?php

        $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        echo '
        <div class="mx-4 mt-4 text-center">
        <div class="table-responsive">
          <table class="table" style="background:#100901;color:white">
            <thead style="background:white; color:black">
              <tr>
                <th scope="col">Module ID</th>
                <th scope="col">Module Name</th>
                <th scope="col">Module Link</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
              while($row = $result->fetch_assoc()){
              echo '<tr>';
              echo  '<td data-label = "Lesson ID" scope="row">'.$row['lesson_id'].'</td>';
              echo  '<td data-label = "Lesson Name">'.$row['lesson_name'].'</td>';
              echo  '<td data-label ="Lesson Link">'.$row['lesson_link'].'</td>';
              echo  '<td>
              <form action="editlesson.php" method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["lesson_id"].'>
                  <button type="submit" class="btn btn-info mr-3" name="view" value="View" id="view">
                    <i class="fas fa-edit"></i>
                  </button>
                  </form>
              <form action="" method="POST" class="d-inline">
                  <input type="hidden" name="id" value='.$row["lesson_id"].'>
                  <button type="submit" class="btn btn-secondary" name="delete" value="Delete" id="delete">
                    <i class="far fa-trash-alt"></i>
                  </button>
              </form>
              </td>
              </tr>';
        }
        echo '</tbody>
          </table>
          </div>
        </div>';
      }  
      else{
        echo '<div> class="alert alert-dark mt-4" role="alert">Course Not Found ! </div>';
      }
      if (isset($_REQUEST['delete'])){
        $sql = "DELETE FROM lesson WHERE 
        lesson_id = {$_REQUEST['id']}";
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

        
  }
 }

?>  

<?php 

// if(isset($_SESSION['course_id'])){
//   echo'
// <div class="add">  
// <a class="box" href="addlesson.php" style="text-decoration:none">
// <i style="padding:0px 5px 0px 5px"class="fas fa-plus">
// <span class="add-btn">ADD LESSON</span>
// </i>   
// </a>
// </div>
//   ';
// }
// else if(!isset($_SESSION['course_id'])){
//   echo '<script>alert('.$_SESSION['course_id'].')</script>';
//   echo'
//   <div class="add">  
//   <a class="box" style="text-decoration:none">
//   <span class="add-btn">SELECT COURSE</span>
//   </i>   
//   </a>
//   </div>
//     ';
// }
?>

<?php include('./footer.php');?>