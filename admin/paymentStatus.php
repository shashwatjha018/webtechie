<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

if(!isset($_SESSION)){
  session_start();
}

include('./header.php');
include('../dbConnection.php');
include('./headerStyle.php');

if(isset($_SESSION['is_admin_login'])){
   $adminEmail = $_SESSION['adminLogEmail'];
} else{
  echo "<script> location.href='../home.php';</script>";
}


	// following files need to be included
	require_once("../PaytmKit/lib/config_paytm.php");
	require_once("../PaytmKit/lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>

<body>
	 <h4 class="mx-4 mt-4" style="background:#F5A7A7;padding:10px; text-align:center">Get Payment Status</h4>
 <center>
 <form action="" method="POST">
  <div style="margin-top:20px;">
  <p style="display:inline" >Order Id:</p>
  <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" 
  name="ORDER_ID" autocomplete="off" style = "display:inline-block" 
  class="form-control form-control-sm ml-2 w-50" type="text" 
  placeholder="Search" value="<?php echo $ORDER_ID ?>">

  <button style = "padding:2px 12px; display:inline-block"
  value="Status Query" type="submit"	onclick="">
    <i class="fas fa-search">
</i>
    
  </button>
  </div>
  
 </center>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
    <div class="mx-5 mt-5 text-center">
  <div class="table-responsive">
		<h2>Payment Details</h2>
		<table class="table" style="background:#100901;color:white" border="0">
			<tbody>
				<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
				<tr >
					<td scope="col"><label><?php echo $paramName?></label></td>
					<td scope="col"><?php echo $paramValue?></td>
				</tr>
				<?php
					}
				?>
        <tr>
          <td colspan=2>
          <div class="add">  
<button class="box" style="text-decoration:none" onclick=window.print()>
<i style="padding:0px 5px 0px 5px"class="fas fa-print">
<span class="add-btn">PRINT</span>
</i>   
</button>
</div>
          </td>
        </tr>
			</tbody>
		</table>
    </div>
</div>
		<?php
		}
		?>
	</form>
</body>
<?php include('./footer.php');?>
