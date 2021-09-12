<?php
if (!isset($_SESSION)){
  session_start();
}

include('./dbConnection.php');

if (isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
}else{
  echo "<script> location.href='./home.php';</script>";
}

if(isset($_REQUEST['ques'])){
  $qid = $_REQUEST['qid'];
  $_SESSION['qid'] = "$qid";
}else{
  echo "<script> location.href='./shashaQuiz.php';</script>";
}
$sql = "SELECT * FROM quiz WHERE q_id = '".$qid."'";
$res = $conn->query($sql);
$r = $res->fetch_assoc(); 
$dur = $r['q_duration'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Quiz</title>
  <style>
  .navi{
    display:flex;
    background:black;
    padding: 0 3%;
  }
  .logo span{ font-size: 1.8rem; margin-left: 5px; color: #F5A7A7; }
.logo{
        font-size: 1.8rem; font-weight: 600; text-transform: uppercase;
        letter-spacing: 2px; line-height: 4rem; margin-top: 10px;color:white;
    }
.logoimg{
  margin-right:20px;
  margin-top:5px;
}
body {
  background:black;
  color:white;
}
  </style>
</head>
<body>
<div class="navi">
<img src="images/logo.jpeg" class="logoimg"alt="Web Techie" height="60px">
    <h3 class="logo">Web<span>Techie</span></h3></div>
<div class="col-lg-7 m-auto d-block">
<h1 class = "pb-5" style = "text-align:center;">Quiz Name: <?php echo $r['q_name']; ?></h1>
<h4 class = "pt-1" style = "text-align:justify; ">Note: </h4>
<p>1. Only one option is correct</p>
<p class = "mb-1">2. Submit the quiz before time. It will not submit automatically</p>
<div class = "d-flex justify-content-end">
<p class="text-black font-weight-bold my-3 align-items-center p-2 pr-3 bg-#f5a7a7 rounded ">Time Remaining-&nbsp&nbsp<span class = "bg-dark text-white p-2 font-weight-normal rounded" id="time"><?php echo $dur.': 00'; ?></span></p>
</div>
<div>

<form action = "quizCheck.php" method = "POST">
<?php
$sql = "SELECT * FROM question WHERE q_id = '".$qid."'";
$result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
$i = 1;
echo '<div class="card mb-5" style="background:black">';
foreach ($result as $row):?>

    <h4 class="card-header text-dark mb-3" style="background:#f5a7a7" ><?php echo 'Question '.$i.' : '.$row['ques'];  $i++;?></h4>
    <?php 
    $quesid = $row['ques_id']; 
    $sql = "SELECT * FROM answer WHERE ques_id = '".$quesid."'";
    $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC); 
    foreach ($result as $row):?>
    <div class="card-body" >
      <input type="radio" name="quizcheck[<?php echo $row['ques_id']; ?>]" value = "<?php echo $row['ans_id']; ?>">
      <?php echo $row['ans']; ?>
    </div>
    <div>
    <?php endforeach; ?>

    
<?php 
endforeach;
?>
<br>
<br>
<input type="submit" value="Submit" name="btn" id="btn" class = "btn btn-success m-auto d-block" style = "position:relative;bottom:0.5rem;">
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark">
        <h5 class="modal-title" id="exampleModalLongTitle">OOOPS!!!</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
      TIME IS OVER. Your answer were not recorded!
      </div>
      <div class="modal-footer">
        <form action = "quizCheck.php" method="POST">
        <button name="modal-btn" type="submit" class="btn btn-secondary">View your Result
        </button>
        </form>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script>
let t = document.getElementById("time");
console.log(t);
// let startingMinutes = <?php //echo $dur; ?>;
let startingMinutes = 1;
let time = startingMinutes * 60;
function times(){
  let minutes = Math.floor(time/60);
  console.log(minutes);
  let seconds = time % 60;
  console.log(seconds);
  seconds = seconds < 10? '0' + seconds: seconds;
  t.innerHTML = minutes + ': '+ seconds;
  time--;
  if(seconds < 1 && minutes <1){
    window.clearInterval(update);
    let btn = document.getElementById("btn");
    btn.setAttribute('disabled', true);
    $("#Modal").modal('show');
  }
  // if(seconds < time){
  //   // console.log(seconds);
  //   t.innerHTML = '$(minutes):$(seconds)';
  //   time--;
  // }
}
update = setInterval("times()",1000);

</script>
</html>