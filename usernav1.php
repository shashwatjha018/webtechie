<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebTECHIE</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
.footerr {
      position: relative;
      bottom: 0;
      width: 100%;
      margin-bottom: 0px;
      background-color: #282828;
      color: white;
      text-align: center;
      font-family: sans-serif;
      font-weight: 300;
      padding-top: 5px;
      padding-bottom: 3px;
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
        <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeMc8p2dwcMhJdoys9zw7Al1EJfsLSDLbjbsJnNV2NQFRAHqQ/viewform?usp=sf_link" target="_blank">Internship</a></li>
        <li><a href="abt.php">About Us</a></li>
        <li><a href="facts.php">Facts</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </div>
    <i class="fa fa-bars" onclick="showMenu()"></i>
  </nav>