<?php
      if(!isset($_SESSION)){
        session_start();
      }
    include('navmain.php');
    include('./dbConnection.php');
    ?>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
		<style>
        .all-content {
      padding-top:10px;
      padding-right:12%;
      padding-left:12%;
    }
        body{
            background:black;
        }
        .feedback{
            background:black;
            padding:20px;
            padding-left:7%;
            padding-right:7%;
        }
        .testimonial{
            margin: 0 20px 40px;
        }
        .testimonial .testimonial-content{
            padding: 35px 25px 35px 50px;
            margin-bottom: 35px;
            background: #fff;
            position: relative;
        }
        .testimonial .testimonial-content:before{
            content: "";
            position: absolute;
            bottom: -30px;
            left: 0;
            border-top: 15px solid #718076;
            border-left: 15px solid transparent;
            border-bottom: 15px solid transparent;
        }
        .testimonial .testimonial-content:after{
            content: "";
            position: absolute;
            bottom: -30px;
            right: 0;
            border-top: 15px solid #718076;
            border-right: 15px solid transparent;
            border-bottom: 15px solid transparent;
        }
        .testimonial-content .testimonial-icon{
            width: 50px;
            height: 45px;
            background: #0CCA4A;
            text-align: center;
            font-size: 22px;
            color: #fff;
            line-height: 42px;
            position: absolute;
            top: 37px;
            left: -19px;
        }
        .testimonial-content .testimonial-icon:before{
            content: "";
            border-bottom: 16px solid #05A739;
            border-left: 18px solid transparent;
            position: absolute;
            top: -16px;
            left: 1px;
        }
        .testimonial .descriptionn{
            font-size: 15px;
            font-style: italic;
            color: #8a8a8a;
            line-height: 23px;
            margin: 0;
        }
        .testimonial .titlee{
            display: block;
            font-size: 18px;
            font-weight: 700;
            color: #525252;
            text-transform: capitalize;
            letter-spacing: 1px;
            margin: 0 0 5px 0;
        }
        .testimonial .post{
            display: block;
            font-size: 14px;
            color: #0CCA4A;
        }
        .owl-theme .owl-controls{
            margin-top: 20px;
        }
        .owl-theme .owl-controls .owl-page span{
            background: #ccc;
            opacity: 1;
            transition: all 0.4s ease 0s;
        }
        .owl-theme .owl-controls .owl-page.active span,
        .owl-theme .owl-controls.clickable .owl-page:hover span{
            background: #0CCA4A;
        }
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
  width: 270px;
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

		</style>


<br>
    <br>
    <br>
    <div class="all-content">
            <div class="wrapper">
          <center><div class="wrapper-heading">
              <h1>What Experts say about Us</h1><br><br></div></center>
            <div class="t">
              <div class="team_member">
                <div class="team_img">
                  <img src="https://i.imgur.com/2pGPLrl.png" alt="Team_image">
                </div><br><br><br>
                <h3>Paul Doe</h3>
                <p class="role">UI developer</p>
                <p>This is a fascinating initiative. It not only helps the
                    privileged but also the not privileged sections of the society.
                    The UI course offered here is commendable. The sheer depth of
                    the course along with the easy to follow directions makes it
                    extraordinary.
                </p>
              </div>
              <div class="team_member">
                <div class="team_img">
                  <img src="https://i.imgur.com/jQj1I8E.png" alt="Team_image">
                </div><br><br><br>
                <h3>Rosie Meg</h3>
                <p class="role">Tester</p>
                <p>This program is nothing short of what it claims to be.
                    These courses offer an interactive platform within them for people
                    to converse at all times and for the experts to answer questions
                    posted in the expert opinion section. It has a huge application of
                    abstraction as well as intergrity.
                </p></div>
              <div class="team_member">
                <div class="team_img">
                  <img src="https://i.imgur.com/2Necikc.png" alt="Team_image">
                </div><br><br><br>
                <h3>Alex Wood</h3>
                <p class="role">Support Lead</p>
                <p>It provides
                    a great learning experience by the site itself being an example of
                    what can be accomplished. The special additions in the course for
                    students to deal with almost every kind of error and hosting issues
                    is a much needed tool and thats what places Webi-Fi among the top.
                </p>
              </div>
            </div>
          </div>
          </div>

    <div class="wrapper">
          <center><div class="wrapper-heading">
              <h1>What Users say about Us</h1><br><br></div></center>
              </div>

    <div class="feedback">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">

                            <?php 
                $sql = "SELECT s.stu_name,s.stu_occ,f.f_content 
                FROM student AS s JOIN feedback AS f ON
                s.stu_id = f.stu_id";
                $result=$conn->query($sql);
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        $stuname = $row['stu_name'];
                        $stuocc = $row['stu_occ'];
                        $content = $row['f_content'];
                        echo'

                    <div class="testimonial">
                        <div class="testimonial-content">
                            <div class="testimonial-icon">
                                <i class="fa fa-quote-left"></i>
                            </div>
                            <p class="descriptionn">
                                '.$content.'
                            </p>
                        </div>
                        <h3 class="titlee">'.$stuname.'</h3>
                        <span class="post">'.$stuocc.'</span>
                    </div> 
                    ';
                                }
                            }else {echo '<script><alert>Hi</alert></script>';}
            ?> 
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:3,
            itemsDesktop:[1000,3],
            itemsDesktopSmall:[980,2],
            itemsTablet:[768,2],
            itemsMobile:[650,1],
            pagination:true,
            navigation:false,
            slideSpeed:1000,
            autoPlay:true
        });
    });
</script>
