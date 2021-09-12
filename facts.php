<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale= 1.0" >
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Facts</title>
            <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
      <style>
    .all-content {
      padding-top:100px;
      padding-right:18%;
      padding-left:18%;
    }

    /*SWIPER*/

.swiper-container {
    width: 100%;
    padding-bottom: 10px;
}

.swiper-slide {
    background-position: center;
    background-size: cover;
    width: 300px;
    height: 300px;
}

.swiper-slide .description {
    position: absolute;

    width: 100%;
    left: 50%;
    transform: translate(-50%,50%);
    opacity: 1;
    text-shadow: 4px 4px 4px rgba(221, 14, 14, 0.5),
    -5px 0px 4px rgba(255,255,255,0.5);
    background-color: rgba(0, 0, 0, 0.863);
    font-size: 20px;
    font-weight: 200;
    color: rgb(255, 166, 0);
    text-align: center;
    font-family: 'Abril Fatface', cursive;;
}

.team h1{
    font-size: 40px;
    color:#f5a7a7;
}

.team p{
    color:rgb(247, 245, 244);
}

      </style>
        </head>

    <body>
  <?php
  include('navmain.php');
  ?>
  <div class="all-content">
        <!--swiper slider-->
        <center><div class="team">
            <h1>FACT FRIDAY</h1>
        </div><br></center>
        <center>
            <p style="color:rgb(247, 245, 244);font-size:24px;">Did you know ?</p>
        </center>

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(images/1.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(images/2.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(images/3.jpeg);"></div>
            <div class="swiper-slide" style="background-image: url(images/3.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(images/4.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(images/5.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(images/6.jpeg);"></div>
            <div class="swiper-slide" style="background-image: url(images/7.jpeg);"></div>
            <div class="swiper-slide" style="background-image: url(images/8.jpeg);"></div>
            
        <div class="swiper-pagination"></div>
    </div>
    </div>
</div>
<br>
<br>


    </body>
    <?php
    include('footer.php');
    ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $(".menu-icon").on("click", function(){
                $("nav ul").toggleClass("showing");
            });
        });

        $(window).on("scroll", function(){
            if($(window).scrollTop()){
                $('nav').addClass('black');
            }
            else{
                $('nav').removeClass('black');
            }
        });

    </script>

<script>
var swiper = new Swiper('.swiper-container', {
effect: 'coverflow',
grabCursor: true,
centeredSlides: true,
slidesPerView: 'auto',
coverflowEffect: {
rotate: 50,
stretch: 0,
depth: 100,
modifier: 1,
slideShadows: true,
},
pagination: {
el: '.swiper-pagination',
},

loop: true,
autoplay: {
delay: 2500,
disableOnInteraction:false,
}

});
</script>
    <!--Jquery and bootstrap javascript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
