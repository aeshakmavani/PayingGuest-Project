<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
   
  
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       
		   
?>



<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

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
            </style>
</head>

    <body>
       <!-- Start Header Area -->
  <?php include_once('includes/header.php');?>
  <!-- End Header Area -->
        
            <div class="site animated zoomIn">
                <div class="sketch">
                    <div class="bee-sketch red"></div>
                    <div class="bee-sketch blue"></div>
                </div>

                <h1 class="animated zoomIn">Oh no!
                    <small>Something went wrong. Please Try Again Later.</small>
                    <div class="col-sm-12 text">
                        <a href="index.php" class="abcd">Go Back</a>
            </div></h1>
                
            </div>
        

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
  }}
  ?>