<?php
  if(!isset($_SESSION)){
    session_start();
  }
include_once('./dbConnection.php');
?>
<style>
        @import url('https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;600;700;800;900&display=swap');

    *{ padding:0; margin: 0; box-sizing: border-box; }

    body{ font-family: 'Recursive', sans-serif; background: black; }

    .content{  width: 100%; background-color: #131414;
        background-image: linear-gradient(135deg, #131414 0%, #000000
        100%); transform-style: preserve-3d; 
    }

    .navibar{ position: fixed; top: 0; left: 0; width: 100%; z-index: 10;
        height: 80px ;
    }
    
    .menu{ width: 100%; height: 100%; margin: 0px auto;
        padding: 0 20px; display: flex; justify-content: space-between;
        align-items: center; color: #fff;
    }
    .menu img {
      margin-top:10px;
      margin-right:20px;
      margin-bottom:10px;
      margin-left:20px;
    }
    .namelogo {
      display: flex;
    }
    .logo{
        font-size: 1.8rem; font-weight: 600; text-transform: uppercase;
        letter-spacing: 2px; line-height: 4rem; margin-top: 10px;
    }

    .logo span{ font-size: 1.8rem; margin-left: 5px; color: #F5A7A7; }

    .hamburger-menu{ height: 4rem; width: 3rem; cursor: pointer;
        display: flex; align-items: center; justify-content: flex-end;margin-right:25px; }

    .bar{ width: 1.9rem; height: 1.5px; border-radius: 2px;
        background-color: #eee; transition: 0.5s; position: relative; }

    .bar::before, .bar::after{ content: ""; position: absolute;
        width: inherit; height: inherit; background-color: #eee;
        transition: 0.5s; }

    .bar::before{ transform: translateY(-9px); }

    .bar::after{ transform: translateY(9px); }

    .main-container{ overflow: hidden; }

    .main{ position: relative; width: 100%; left: 0; z-index: 5;
        transform-origin: left; 
        transform-style: preserve-3d; transition: 0.5s;
    }

    header{ min-height: 100vh; width: 100%;
        background: url("image.jpg") no-repeat top center / cover;
        position: relative;
    }

    .overlay{ min-height: 100vh; position: absolute; width: 100%; height: 100%; top: 0;
        left: 0; background-color: rgba(0, 0, 0, 0.712);
        display: flex; justify-content: center; align-items: center;
        flex-direction: column; color: white;
    }
    .written {
      margin:20px;
      text-align:center;
      display:flex;
      flex-direction:column;
    }
    .inner{ max-width: 35rem; text-align: center; color: #fff;
        padding: 0 2rem;
    }

    .title{ font-size: 3rem; }

    .description{ margin: 10px 0; text-align: center; width: 50%;
        font-size: 1.5rem;
    } 

    .content.active .bar{ transform: rotate(360deg);
        background-color: transparent;
    }

    .content.active .bar::before{ 
        transform: translateY(0) rotate(45deg);
    }

    .content.active .bar::after{
        transform: translateY(0) rotate(-45deg);
    }

    .content.active .main{
        animation: main-animation 0.5s ease; cursor: pointer;
        transform: perspective(1300px) rotateY(20deg) translateY(10px) 
                    translateZ(310px) scale(0.5);
    }

    @keyframes main-animation{
        from{ transform: translate(0); }
        to{
            transform: perspective(1300px) rotateY(20deg) translateY(10px) 
                        translateZ(310px) scale(0.5);
        }
    }

    .links{ position: absolute; width: 18%; right: 10px; top: 0; 
        height: 100vh; z-index: 2; 
        display: flex; justify-content: flex-start; align-items: center;
        margin-left: 10px;
        padding-top:50px;
        padding-left:40px;

    }

    ul li{margin-right:5px;}

    ul{ list-style: none; }

    ul li.active a{ color: #F5A7A7; }

    .links a{ text-decoration: none; color: #eee; padding: 0.7rem 0; 
        display: inline-block; font-weight: 300;
        text-transform: uppercase; letter-spacing: 1px; transition: 0.3s;
        opacity: 0; transform: translateY(10px);
        animation: hide 0.5s forwards ease;
    }

    .links a:hover { 

      color: #F5A7A7;
      text-decoration: none; }

    .content.active .links a{ 
        animation: appear 0.5s forwards ease var(--i);
    }

    @keyframes appear{
        from { opacity: 0; transform: translateY(10px); }
        to{ opacity: 1; transform: translateY(0px); }
    }

    @keyframes hide{
        from { opacity: 1; transform: translateY(0px); }
        to{ opacity: 0; transform: translateY(10px); }
    }

    .content.active .main:hover + .shadow.one{
        transform: perspective(1300px) rotateY(20deg) translateY(10px) 
                    translateZ(230px) scale(0.5);
    }
    .content.active .main:hover{
        transform: perspective(1300px) rotateY(20deg) translateY(10px) 
                    translateZ(340px) scale(0.5);
    }
    </style>
</head>
<body>
    <div class="content">
        <div class="navibar">
            <div class="menu">
                <div class="namelogo">
                  <img src="images/logo.jpeg" alt="Web Techie" height="60px">
                  <h3 class="logo">Web<span>Techie</span></h3>
                </div>
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
        </div>

        <div class="links">
            <ul>
                <li>
                    <a href="home.php" style="--i: 0.05s">Home</a>
                </li>
                <li>
                    <a href="coursess.php" style="--i: 0.1s">Courses</a>
                </li>
                <?php
                if(isset($_SESSION['is_login'])){
                    echo '
                    <li>
                        <a href="myprofile.php" style="--i: 0.05s">My Profile</a>
                    </li>
                    <li>
                        <a href="logout.php" style="--i: 0.1s">Logout</a>
                    </li>';
                }
                else{
                    echo ' <li>
                    <a href="loginn.php" style="--i: 0.15s">Login/Sign-Up</a>
                     </li>';
                }
                ?>
                <li>
                    <a href="liveeditor.php" style="--i: 0.3s">Live Editors</a>
                </li>
                <li>
                    <a href="facts.php" style="--i: 0.35s">Facts</a>
                </li>
                <li>
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSeMc8p2dwcMhJdoys9zw7Al1EJfsLSDLbjbsJnNV2NQFRAHqQ/viewform?usp=sf_link" target="_blank" style="--i: 0.4s">Intership</a>
                </li>
                <li>
                    <a href="abt.php" style="--i: 0.45s">About Us</a>
                </li>
                <li>
                    <a href="home.php#contactform" style="--i: 0.5s">Contact Us</a>
                </li>
                <li>
                    <a href="feedback.php" style="--i: 0.55s">Feedback</a>
                </li>
            </ul>
        </div>
  </div>
    <script>
      const hamburger_menu = document.querySelector(".hamburger-menu");
      const container = document.querySelector(".content");
      const links = document.querySelector(".links");
      hamburger_menu.addEventListener("click", () =>{
          container.classList.toggle("active");

      })
    </script>
    
</body>
</html>