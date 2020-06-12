
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['pgasuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>Paying Guest Accomodation System|| User Signin</title>

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
						<span class="lnr lnr-arrow-right"></span> <a href="register.php">
							Sign in</a></p>
					<h1 class="text-white">
						Sign in
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>Sign in</strong></p>
			<div class="row mt-80">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="" name="login">
						<div class="col-md-12">

						
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required="true">
							</div>
							<a href="forgot-password.php">Forgot Password?</a>

							<div class="form-group" style="padding-top: 20px">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true">
							</div>
							
						</div>
						
						<div class="col-md-6 text-left">

							<button type="submit" value="login" name="login" class="btn primary-btn">Sign in</button>
						</div>
						<div class="col-md-6 text-left">
					<a href="register.php" class="btn primary-btn">Register</a>
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