    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: Helvetica;
}

.contactus 
{

  display: flex;
  justify-content: center;
  align-items:center;
}

.contus form {
  background-color: black;
  padding-left:25px;
  padding-right:25px;
  padding-top:60px;
  margin: 12px auto;
  border: 2px solid #ccc;
  border-radius: 20px;
  position:relative;
  z-index:1;
}

.contus form > div{
  position:absolute;
  top:0;
  left:50%;
  padding:0 20px;
  transform:translate(-50%,-50%);
  background-color:black;
  border: 2px solid #ccc;
  border-radius: 20px;
  text-align:center;
}

.contus form > div > img{
  filter:invert(1);
  width:90px;
}

.contus form > input,
.contus form > textarea {
  padding: 12px;
  margin: 12px auto;
  border: 1px solid #ccc;
  color: #ddd;
  background-color: #222;
  border-radius: 4px;
  display: block;
  width: 40vw;
}

.contus form > textarea{
  height:100px;
  resize:none;
}

.contus form > input[type="submit"] {
  max-width: 20vw;
  padding-left: 1%;
  padding-right: 1%;
  cursor: pointer;
  transition: 0.35s;
}

.contus form > input[type="submit"]:hover {
  background-color: #555;
}

.stripe {
  background: #f5a7a7;
background: linear-gradient(90deg, #f5a7a7 0%, #f5a7a7 100%);
    padding: 3rem;
    height: 13rem;
    margin-top: 4rem;
    margin-right:4rem;
    transform: rotate(15deg);
    z-index: -10;
    color:black;
    font-size:18px;
}

.team h1{
    font-size: 40px;
    text-decoration: underline double 5px #F5A7A7;
}
</style>
<div class="container mt-4" id="Contact">
<center><div class="team">
            <h1>Contact Us</h1>
        </div></center>
  <br>
  <br>
      <div class="row contus ">
        <div class="col-md-7 contactus">
          <form>
            <div>
            <img src="https://cdn4.iconfinder.com/data/icons/basic-user-interface-elements/700/mail-letter-offer-256.png" alt="icon">
            </div>
            <input type="text" placeholder="Name" required>
            <input type="text" placeholder="Subject" required>
            <input type="email" placeholder="Email" required>
            <textarea placeholder="How can we help you ?" required></textarea>
            <input type="submit" value="Send">
          </form>
        </div>

        <div class="col-md-4 stripe text-center">
          <h2><b>WEB-TECHIE</b></h2>
          <P>
          444 S. Cedros Ave</span> California<br/>
            Phone: +1.555.555.5555 <br/>
            <b>www.web-techie.com</b>
          </P>
        </div>
      </div>
    </div>