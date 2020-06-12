<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
   

$MERCHANT_KEY = "sA9pduQt";
$SALT = "czBEObO76E";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$_SESSION['BOOKINGNUMBER']=$posted['bookednum'];
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>







<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
<script type="text/javascript">
   var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
</script>
  <title>Humming House</title>
        <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
  <!--
      CSS
      ============================================= -->
  <link rel="stylesheet" href="css/linearicons.css">=
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/nice-select.css">
  <link rel="stylesheet" href="css/ion.rangeSlider.css" />
  <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/main.css">
        <link href="css/animate.css" rel="stylesheet" type="text/css"/>
        <link href="css/failure.css" rel="stylesheet" type="text/css"/>
      
        <style>
            h1{
                color: #ea6c5d;
            }
            .abcd {
                height: 40px;
                line-height: 40px;
                padding-left: 30px;
                padding-right: 30px;
                border-radius: 25px;
                background: #ea6c5d;
                border: none;
                color: #fff;
                display: inline-block;
                font-weight: 500;
                position: relative;
            }
            .site123 {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  flex-direction: column;
  margin: 0 auto;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
}
@media only screen and (min-width: 780px) {
  .site123 {
    margin-top: 100px;
    margin-left: 400px;
    flex-direction: row;
    padding: 1em 3em 1em 0em;
  }
  
  h1 {
    text-align: left;
    order: 2;
    padding-bottom: 2em;
    padding-left: 2em;
                color: black;
  }
  
  .sketch {
    order: 1;
  }
}
            </style>
</head>

    <body onload="submitPayuForm()">
       <!-- Start Header Area -->
  <?php include_once('includes/header.php');?>
  <!-- End Header Area -->
        

 <?php if($formError) { ?>
  
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

      <table>
<!--        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>

-->         
        <tr>
          <td><input name="amount" value="<?php echo $_GET['pay']; ?>" type="hidden" /></td>
          <td><input name="bookednum"  value="<?php echo $_GET['bknum']; ?>" type="hidden"/></td>
          <td><input name="firstname" id="firstname" value="<?php echo $_GET['username']; ?>" type="hidden"/></td>
       
          <td><input name="email" id="email" value="<?php echo $_GET['email']; ?>" type="hidden"/></td>
          
          <td><input name="phone" value="<?php echo $_GET['phoneno']; ?>" type="hidden"/></td>
        
          <td colspan="3"><textarea name="productinfo" type="hidden"><?php echo $_GET['productinfo']; ?></textarea></td>
        
          <td colspan="3"><input name="surl" value="http://localhost/PGAS/Success.php" size="64" type="hidden" /></td>
        
          <td colspan="3"><input name="furl" value="http://localhost/PGAS/Failure.php" size="64" type="hidden"/></td>
       
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" type="hidden" /></td>
       </tr>
        <tr>
         
        </tr>
     
 </table>
            <div class="site123 animated zoomIn">
               
                <h1 class="animated zoomIn"><u>Confirm Your Detail</u><br>
                  <table>
                   <tr><td> <small>Booking Id </td><td> <?php echo $_GET['bknum']; ?></small></td></tr>
                   <tr><td> <small>PG Name </td><td> <?php echo $_GET['productinfo']; ?></small></td></tr>
                   <tr> <td><small>Rented On</td><td> <?php echo $_GET['username']; ?></small></td></tr>
                   <tr> <td><small>Payment Fees</td><td> <?php echo $_GET['pay']; ?></small></td></tr>
                    </table>
                    <div class="col-sm-12 text">
                       <!-- <a href="#" class="abcd">Make Payment</a> -->
                         <?php if(!$hash) { ?>
                             <button type="submit" value="" class="btn primary-btn" name="submit"><p style="font-size: 25px;">Make Payment</button>
                         <?php } ?>
                        <a href="index.php" class="abcd"><p style="font-size: 25px;">Go Back</p></a>
            </div></h1>
                
            </div>

        
    </form>

  <script src="js/vendor/jquery-2.2.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
   crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/ion.rangeSlider.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
<?php
  }
  ?>