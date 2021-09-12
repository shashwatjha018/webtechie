<!-- <?php 
session_start();
?> -->
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
  .about{
	cursor: pointer;
	background-color: black;
	color: white;
	padding-top: 20px;
	padding-bottom: 30px;
}
.about h1 {
	padding: 10px 0;
	margin-bottom: 20px;
  color:#f5a7a7;
}
.about h2 {
	opacity: .8;
  margin-bottom:10px;
}
.about span {
  margin-bottom:30px;
	display: block;
	width: 100px;
	height: 100px;
	line-height: 100px;
	margin:auto;
	border-radius:50%;  
	font-size: 40px;
	color: white;
	opacity: 0.7;
	background-color: #f5a7a7;
	border: 2px solid #4C0822;

	webkit-transition:all .5s ease;
 	moz-transition:all .5s ease;
 	os-transition:all .5s ease;
 	transition:all .5s ease;

}
.about-item:hover span{
  margin-bottom:30px;
	opacity: 1;	
	border: 2px solid #4C0822;
	font-size: 42px;
	-webkit-transform: scale(1.1,1.1) rotate(360deg) ;
	-moz-transform: scale(1.1,1.1) rotate(360deg) ;
	-o-transform: scale(1.1,1.1) rotate(360deg) ;
	transform: scale(1.1,1.1) rotate(360deg) ;
}
.about-item:hover h2{
	opacity: 1;
	-webkit-transform: scale(1.1,1.1)  ;
	-moz-transform: scale(1.1,1.1)  ;
	-o-transform: scale(1.1,1.1)  ;
	transform: scale(1.1,1.1) ;
}
.about .lead{
	color: white;
	font-size: 18px;
  margin-bottom:10px;
}

.all-content {
      padding-top:100px;
      padding-right:18%;
      padding-left:18%;
    }
    .about{
      color:white;
    
    }
    /*Team*/

.team{
    width: 20%;
    color:white;
}

.team h1{
    font-size: 40px;
    border-bottom: 4px double #f5a7a7;
    border-bottom-width: 20px;
}

.pic{

    width: 50%;
}

.pic img{
    height: 250px;
    width: 250px;
}

.image{
    display: block;

}

.overlay{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #1a1b1b8e;
    overflow: hidden;
    width: 250px;
    height: 0;
    transition: .5s ease;
}

.pic:hover .overlay{
    height: 100%;
}

.text{
    color: white;
    font-size: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
}

.team-column{
	width: 100%;
	height: 100%;
    display: flex;
}

.team-row{
    width: 33.33%;
    position: relative;
    margin: auto;
    padding: 32px;
}

@media(max-width: 900px){
	.team-column{
        display: block;
        margin: auto;
    }

    .pic img{
        height: 350%;
        width: 350%;
    }

    .overlay{
        width: 350%;
        font-size: 10px;
        overflow: hidden;
    }
}

/*testimonials*/

.wrapper{
  margin-top: 50px;
}

.wrapper-heading{
    width: 70%;
}

.wrapper h1{
  color:white;
  font-size: 50px;
  margin-bottom: 60px;
  text-align: center;
  border-bottom: 0.35em double #f5a7a7;
}

.t{
  display: flex;
  justify-content: center;
  width: auto;
  text-align: center;
  flex-wrap: wrap;
}

.t .team_member{
  background: #fff;
  margin: 5px;
  margin-bottom: 50px;
  width: 300px;
  padding: 20px;
  line-height: 20px;
  color: #8e8b8b;
  position: relative;
}

.t .team_member h3{
  color: #fa8908;
  font-size: 26px;
}

.t .team_member p.role{
  color: #ccc;
  margin: 12px 0;
  font-size: 12px;
  text-transform: uppercase;
}

.t .team_member .team_img{
  position: absolute;
  top: -50px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background: #fff;
}

.t .team_member .team_img img{
  width: 100px;
  height: 100px;
  padding: 5px;
}


.smoothSlideContainer{
  background-color:white;
  position:absolute;
  height:60%;
  width:60%;
  overflow:hidden;
  margin-left:18%;
  margin-bottom:5%;
}

#person img
{
  position:absolute;
  height:100%;
  right:0;
  z-index:1;
  -webkit-animation: personslideout 6s ease-in-out infinite;
          animation: personslideout 6s ease-in-out infinite;
}



        #team i 
        {
            font-size: 26px;
            color: #555;
        }

        #team p 
        {
            font-weight: 500;
        }

        #team .card 
        {
            border-radius: 0;
            box-shadow: 5px 5px 15px #F5A7A7;
            transition: all 0.3s ease-in;
            -webkit-transition: all 0.3s ease-in;
            -moz-transition: all 0.3s ease-in;
        }

        #team .card:hover 
        {
            background: #F5A7A7;
            border-radius: 5px;
            border: none;
            box-shadow: 5px 5px 10px #9e9e9e;
        }

        #team .card:hover h3,
        #team .card:hover i 
        {
            color: #fff;
        }

</style>
<?php
    include('navmain.php');
    ?>
<div class="all-content">
<section class="text-center about">
      <h1>About US</h1>
      <br>
      <br>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200" >
            <span class="fas fa-star"></span>
            <h2>Goals</h2>
            <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
            <span class="fas fa-info"></span>
            <h2>Culture</h2>
            <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
          <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
            <span class="fas fa-file"></span>
            <h2>Future Projects</h2>
            <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
          </div>
          
        </div>
        
      </div>
    </section>
    <br>
    <br>
    <br>
    
    <center><div class="team">
            <h1>Team</h1>
        </div></center>
    <center>
      
        <div class="about">
            <p>
                A well curated list of courses and their contents were put together
                by our faculties. These faculties have unique teaching methods and
                innovatiove ideas for you to to make use of. Here is some information
                on the faces behind this website. We will be readilty available to
                clarify any doubts regarding the working of our website. You are most
                likely to see some of these faces throughtout the courses. Go ahead
                and read on!
            </p>
        </div>
      </center>
      <br><br>
        <section id="team">
        <div class="container my-3 py-5 text-center">
            <div class="row">
                <div class="col-lg-5 col-md-6 pt-1"style="margin-left:5%;">
                    <div class="card h-100">
                        <div class="card-body">
                            <img class="img-fouild rounded w-75 mb-3"
                                src="images/ni1.jpeg"
                                alt="Nidhi">
                            <h3>Nidhi Rathi</h3>
                            <h5>Software Engineer</h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, recusandae.</p>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 pt-1"style="margin-right:5%;">
                    <div class="card h-100">
                        <div class="card-body">
                            <img class="img-fouild rounded w-75 mb-3"
                                src="images/sj1.jpeg"
                                alt="lucy">
                            <h3>Shashwat Jha</h3>
                            <h5>FrontEnd Developer</h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi, recusandae.</p>
                            <div class="d-flex flex-row justify-content-center">
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="p-4">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <?php
include('footer.php');
?>
        </div>
