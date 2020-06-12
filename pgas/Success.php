<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$status=$_POST["status"];
$bookingnumber=$_SESSION['BOOKINGNUMBER'];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="czBEObO76E";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }


		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {
         

		   



if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
    $query=mysqli_query($con,"update tblpayment set Status='Paid' where PBookingNumber='$bookingnumber'");
   
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
      
        <style>
            h1{
                color: #ea6c5d;
            }
            </style>
</head>

    <body>
       <!-- Start Header Area -->
  <?php include_once('includes/header.php');?>
  <!-- End Header Area -->
        
        <!-- start banner Area -->
  <section id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
      <div class="row d-flex text-center align-items-center justify-content-center">
        <div class="about-content col-lg-12">
          
          <h1 class=" animated zoomIn">
            THANK YOU<br><br>
                                                
          </h1>
                                    <h2 class="text-black-50 animated zoomIn">
                                        Your Order Is Successful<br><br>
                                               <?php echo "Your transaction ID for this transaction is <b>".$txnid."</b><br><br>
                                                We have received a payment of <b>".$amount."</b>/- INR" ?><br><br>
                                    </h2>
                                    
        </div>
      </div>
    </div>
  </section>
  <!-- End banner Area -->


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