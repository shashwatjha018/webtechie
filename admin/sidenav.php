<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- bootstrap 5 css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
  <!-- BOX ICONS CSS-->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!-- Font awesome css -->
  <link rel="stylesheet" href="../css/all.min.css">
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    min-height: 100vh;
    background-color: #464446;
  }

  .side-navbar {
    width: 250px;
    height: 100%;
    position: fixed;
    margin-left: -300px;
    background-color: #100901;
    transition: 0.5s;

  }
  .side-navbar a{
    text-decoration:none;
    color:white;
  }

  .nav-link:active,
  .nav-link:focus,
  .nav-link:hover {
    background-color:#D8D9CA;
    color:black;
 
  }

  .my-container {
    transition: 0.4s;
  }

  .active-nav {
    margin-left: 0;
  }

  /* for main section */
  .active-cont {
    margin-left: 250px;
  }
  
  .nav-link i {
    color: #F5A7A7;
  }

  #menu-btn 
  {
    background-color:#464446;
    color: #fff;
    margin-left: -40px;
  }

  .my-container input {
    border-radius: 2rem;
    padding: 2px 20px;
  }
</style>
</head>

<body>
  <!-- Side-Nav -->
  <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
      <center><img src="../images/name.jpeg" width="200px" alt="Web Techie" style="margin:10px">
  </center>
      <a href="admindash.php">    
      <li class="nav-link">
        <i class="bx bxs-dashboard"></i>
        <span class="mx-2">Dashboard</span>
      </li>
      </a>
      <a href="courses.php">
      <li class="nav-link">        
        <i class="fas fa-scroll"></i>
        <span class="mx-2">Courses</span>        
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-book"></i>
        <span class="mx-2">Lessons</span>
      </li>
      </a>
      <a href="">
      <li class="nav-link">        
        <i class="fas fa-question"></i>
        <span class="mx-2">Quizzes</span>        
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-users"></i>
        <span class="mx-2">Users</span>
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-table"></i>
        <span class="mx-2">Get Report</span>
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-money-check"></i>
        <span class="mx-2">Payment Status</span>
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-comments"></i>
        <span class="mx-2">Feedback</span>
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-key"></i>
        <span class="mx-2">Change Password</span>
      </li>
      </a>
      <a href="">
      <li href="#" class="nav-link">
        <i class="fas fa-sign-out-alt"></i>
        <span class="mx-2">Logout</span>
      </li>
      </a>
    </ul>
    <span class=" h4 w-100" style="text-align:center">
      <a href=""><i class="bx bxl-instagram-alt text-white"></i></a>
      <a href=""><i class="bx bxl-twitter px-2 text-white"></i></a>
      <a href=""><i class="bx bxl-facebook text-white"></i></a>
    </span>

  </div>

  <!-- Main Wrapper -->
  <div class="p-1 my-container active-cont">
    <!-- Top Nav -->
    <nav class="navbar top-navbar px-5" 
        style="background:black">
      <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
      <h3 style="color:#D8D9CA">Admin Area</h3>
    </nav>
    <!--End Top Nav -->
  </div>
  <script>
    var menu_btn = document.querySelector("#menu-btn");
    var sidebar = document.querySelector("#sidebar");
    var container = document.querySelector(".my-container");
    menu_btn.addEventListener("click", () => {
      sidebar.classList.toggle("active-nav");
      container.classList.toggle("active-cont");
    });
  </script>
  <!-- bootstrap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" 
  crossorigin="anonymous"></script>
  <!--Font Awesome javascript-->
  <script src="../js/all.min.js"></script>

</body>

</html>