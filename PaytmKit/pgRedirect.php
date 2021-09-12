<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
$CHANNEL_ID = $_POST["CHANNEL_ID"];
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "http://localhost/webtechie/PaytmKit/pgResponse.php";

/*
$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
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
                  <img src="../images/logo.jpeg" alt="Web Techie" height="60px">
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
				<br>
				<br>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>