<?php
if (!isset($_SESSION)){
  session_start();
}

  include('./dbConnection.php');
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
  
  if(!isset($_SESSION['is_login'])){
    echo "<script> location.href = 'loginn.php' </script>";
  }else {
    $stuEmail= $_SESSION['stuLogEmail'];
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="GENERATOR" content="Evrsoft First Page">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Check Out page</title>
  <style>
        @import url('https://fonts.googleapis.com/css2?family=Recursive:wght@400;500;600;700;800;900&display=swap');

*{ padding:0; margin: 0; box-sizing: border-box; }

body{ font-family: 'Recursive', sans-serif; background: black;color:white; }

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

span { color: #F5A7A7; }
  </style>
</head>
<body>

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
        <br>
        <br>
        <br>

  <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3 jumbotron">
    <h3 class="mb-5">Welcome to <span>Web-Techie Payment Page</span></h3>
    <form method="post" action="./PaytmKit/pgRedirect.php">
      <div class="form-group row">
        <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
        <div class="col-sm-8">
          <input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo "ORDS" . rand(10000,99999999)?>" readonly>
        </div>      
      </div>
      <br>
      <div class="form-group row">
        <label for="CUST_ID" class="col-sm-4 col-form-label">User Email</label>
        <div class="col-sm-8">
        <input id="CUST_ID"  class="form-control" tabindex="2" maxlength="12" size="12" 
        name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){ echo $stuEmail; }?>" readonly>
        </div>      
      </div>
      <br>
      <div class="form-group row">
        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
        <div class="col-sm-8">
        <input title="TXN_AMOUNT"  class="form-control" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php if(isset($_POST['id'])){ echo $_POST['id'];}?>" readonly>
        </div>      
      </div>
      <br>
      <div class="form-group row">
        <!-- <label for="INDUSTRY_TYPE_ID" class="col-sm-4 col-form-label">INDUSTRY_TYPE_ID</label> -->
        <div class="col-sm-8">
        <input type="hidden" class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" 
        name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
        </div>      
      </div>
      <br>
      <div class="form-group row">
        <!-- <label for="CHANNEL_ID" class="col-sm-4 col-form-label">Channel ID</label> -->
        <div class="col-sm-8">
        <input type="hidden" class="form-control" tid="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
        </div>      
      </div>

      <div class="text-center">
        <input type="submit" value="Checkout" class="btn btn-dark" onclick="">
        <a href="./coursess.php" class="btn btn-secondary">Cancel</a>      
      </div>

    </form>
    <br>
    <div>
    <small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
    </div>
    </div>
    </div>
  </div>
</body>
</html>
<?php
}
?>