<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <link rel="stylesheet" href="css/all.min.css">
  <style>
* {
  margin: 0;
  padding: 0;
}
nav {
  display: flex;
  padding: 0 3%;
  justify-content: space-between;
  background-color: black;
  align-items: center;

}
.nav-links {
  flex: 1;
  text-align: right;
}

.nav-links ul li {
  list-style: none;
  display: inline-block;
  padding: 8px 12px;
}

.nav-links ul li a {
  color: white;
  text-decoration: none;
  font-size: 18px;
}

.nav-links ul li::after {
  content: "";
  width: 0%;
  height: 2px;
  background-color: #F5A7A7;
  display: block;
  margin: auto;
  transition: 0.5s;
}

.nav-links ul li:hover::after {
  width: 100%;
}

a.active,
a:hover {
  padding: 5px 12px 0px 12px;
  background-color: black;
  transition: 0.5s;
}

nav .fa {
  display: none;
}

@media (max-width: 900px) {
  nav {
    width: auto;
  }
  .nav-links ul li {
    display: block;
  }

  .nav-links {
    display: none;
    position: absolute;
    background: #f44336;
    height: 100vh;
    width: 200px;
    top: 0;
    right: 0;
    text-align: center;
    z-index: 1;
    transition: 3s;
  }

  nav .fa {
    display: block;
    color: black;
    margin: 10px;
    font-size: 22px;
    cursor: pointer;
  }

  nav .fa-times {
    font-size: 30px;
    text-align: center;
  }

  .navi-links ul {
    padding: 30px;
  }

  a.active,
  a:hover {
    background-color: #f44336;
    padding: 0;
  }
}
.logo span{ font-size: 1.8rem; margin-left: 5px; color: #F5A7A7; }
.logo{
        font-size: 1.8rem; font-weight: 600; text-transform: uppercase;
        letter-spacing: 2px; line-height: 4rem; margin-top: 10px;color:white;
    }
.logoimg{
  margin-right:20px;
}
  </style>
</head>

<body>
  <nav>
  <img src="images/logo.jpeg" class="logoimg"alt="Web Techie" height="60px">
    <h3 class="logo">Web<span>Techie</span></h3>
    <div class="nav-links" id="naviLinks">
      <i class="fa fa-times" onclick="hideMenu()"></i>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="coursess.php">Courses</a></li>
        <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="liveeditor.php">Live Editor</a></li>
        <li><a href="">Internship</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="facts.php">Facts</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
  </nav>
</body>

</html>