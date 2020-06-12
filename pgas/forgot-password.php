
<?php
session_start();
require_once('EMAIL.php');
error_reporting(0);
include('includes/dbconnection.php');


if(isset($_POST['submit']))
  {
    //$contactno=$_POST['mobilenumber'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbluser where  Email='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
    //  $_SESSION['mobilenumber']=$contactno;

    //  $_SESSION['email']=$email;
    // header('location:reset-password.php');


     	//send email
                            $otp= rand(10000,99999);
                            //$otp="12345";
                            $to=$email;
                            $e=new Email();
                            $from="Humming House";
                            $subject="OTP verification";
                            $message="Your Requested otp is : $otp";
                            
                            if($e->send($from,$subject,$message,$to))
                            {
                                //otp expiry
/*                                $result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
*/
//                                $current_id = mysqli_insert_id($conn);//returns last inserted record id
//                                if(!empty($current_id)) 
//                                {
//                                	$success=1;
//                                }
                    //            if($result)
                    //            {
                                    $_SESSION['otp']=$otp;
                                    if($_SESSION['otp']!=NULL)
                                    {
                                        $_SESSION['email']=$email;
                                        header("location:otp.php");
                                    }
                    //            }
                            }
                            else
                            {
                                echo "<p style='color:red;'>OTP Not Sent!!!!!!</p>";
                            }

    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>Paying Guest Accomodation System|| User Forget Password</title>

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
	
</head>

<body>

	<!-- Start Header Area -->
<?php include_once('includes/header.php');?>
	<!-- End Header Area -->

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex text-center align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<p class="text-white link-nav"><a href="index.php">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="forgot-password.php">
							Forgot Password</a></p>
					<h1 class="text-white">
						Forgot Password
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>Forgot Password</strong></p>
			<div class="row mt-80">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){echo $msg;}  ?> </p>
				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="" name="login">
						<div class="col-md-12">

						
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true">
							</div>
<!--							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
							</div>
-->
							
							
						</div>
						
						<div class="col-md-6 text-left">

							<button type="submit" value="login" name="submit" class="btn primary-btn">Reset</button>
						</div>
					</form>
					
					
				</div>
			</div>
		</div>
	</section>
	<!-- End contact-page Area -->

	<!-- start footer Area -->
	<?php include_once('includes/footer.php');?>
	<!-- End footer Area -->

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