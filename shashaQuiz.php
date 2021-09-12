<?php
if (!isset($_SESSION)){
  session_start();
}

include('./dbConnection.php');

if (isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
  // $cid = $_SESSION['cid'];
  // echo $cid;
}else{
  echo "<script> location.href='./home.php';</script>";
}

if(isset($_REQUEST['btn-cid'])){
  $cid = $_REQUEST['cid'];
  $_SESSION['cid'] = $cid;
} else if(isset($_REQUEST['check-btn'])){
  $cid = $_SESSION['cid'];;
}
else{
  echo "<script> location.href='./home.php';</script>";
}

// if(isset($_REQUEST['check-btn'])){
//    $cid = $_SESSION['cid'];;
//  }else{
//       echo "<script> location.href='./home.php';</script>";
//  }

$sql = "SELECT * FROM course WHERE course_id = '".$cid."'";
$res = $conn->query($sql);
$r = $res->fetch_assoc();
// if(isset($_REQUEST['qid_btn'])){
//    $qid = $_REQUEST['qid'];
// }
include('./usernav1.php');
?>
<style>
body {
  background:black;
}
</style>
<body>
  

<h1 class="text-center mt-5 text-light"><?php echo $r['course_name'];?> Quiz Section </h1>

<?php
// echo $cid;
$sql = "SELECT * FROM quiz WHERE course_id = '".$cid."'";
$result = $conn->query($sql);
if($result->num_rows > 0){
  echo '
  <div class="col-lg-7 m-auto d-block">
  <div class="mx-4 mt-4 text-center">
  <div class="table-responsive">
  <table class="table table-striped table-bordered table-dark">
  <thead class="thead-light">
    <tr>
      <th scope="col">Sr No.</th>
      <th scope="col">Name</th>
      <th scope="col">Marks Per Question</th>
      <th scope="col">Duration</th>
      <th scope="col">Take Quiz</th>
      <th scope="col">Result</th>
    </tr>
  </thead>
  <tbody>
  ';
  $i = 1;
while($row = $result->fetch_assoc()){
  echo '<tr>';
      echo '<th scope="row">'.$i.'</th>';
      echo '<td>'.$row['q_name'].'</td>';
      echo '<td>'.$row['q_marks'].'</td>';
      echo '<td>'.$row['q_duration'].' minutes</td>';
      $i++;
      $sql = "SELECT * FROM result WHERE q_id = '".$row['q_id']."' AND stu_email = '".$stuEmail."' ";
      $res = $conn->query($sql);
      if($res->num_rows > 0){
        while($r = $res->fetch_assoc()){
        echo "<td><center><p class='alert alert-success p-1 m-0 w-auto text-center' style='border-radius:25px'>Completed</p></center></td>";
        echo '<td>
        <center>
        <button type = "button" class = "btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fas fa-award"></i>
        </button>
        </center>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background:#f5a7a7">
                <h5 class="modal-title" style="color:black" id="exampleModalLongTitle">Result</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <table class="table">
              <tbody>
               <tr>
                  <th scope="row">Email</th>
                  <td>'.$r['stu_email'].'</td>
                </tr>
                <tr>
                  <th scope="row">No of correct options you have selected</th>
                  <td>'.$r['score'].'</td>
                </tr>
                 <tr>
                  <th scope="row">Your Total Score</th>
                  <td>'.$r['total_marks'].'</td>
                </tr>
              </tbody>
            </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
        </td>';
      }}
      else{
      echo '<td><center><form
       action="shashaQuestion.php" method = "POST" class="d-inline"> 
      <input type="hidden" name="qid" value='.$row["q_id"].'>
      <button type = "submit"
      class = "btn btn-outline-primary"
      name = "ques"
      value = "ques">
        <i class = "fas fa-pen"></i>
      </button>
      </form></center></td>';
      echo '<td><center>--</center></td>';
  echo '</tr>';}
}
echo '</tbody></table></div></div></body></html>';
} else {
  echo "<h2 class='text-center mt-2'>No quizzes assigned yet for this course<h2>";

}

?>
<button class = "btn btn-dark float-right mt-4 mr-5"><a class= "p-1" href="mycourses.php" style = "text-decoration:none;color:white;" ><i class="fas fa-hand-point-left"></i>  My Courses</a></button>

</body>