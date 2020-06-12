<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    //$contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    //$password=md5($_POST['newpassword']);
    $pass=md5($_POST['passwd']);
    $re_pass=md5($_POST['re_passwd']);
    if($pass==$re_pass)
    {

        $query=mysqli_query($con,"update tbluser set Password='$pass'  where  Email='$email'");
    }
    else
    {
        echo "<p style='color:red;'>Both passwords Should be same!!!!</p>";
    }
   if($query)
   {
		echo "<script>alert('Password successfully changed');</script>";
		header("location:signin.php");
		unset($_SESSION['email']);
		unset($_SESSION['otp']);
		session_destroy();
   }
  
  }
  ?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>Paying Guest Accomodation System|| Reset Password</title>

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
	<script type="text/javascript">
function checkpass()
{
if(document.changepassword.passwd.value!=document.changepassword.re_passwd.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.passwd.focus();
return false;
}
return true;
} 

</script>
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
						<span class="lnr lnr-arrow-right"></span> <a href="reset.php">
							Recover Password</a></p>
					<h1 class="text-white">
						Recover Password
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>Recover Password</strong></p>
			<div class="row mt-80">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="" name="changepassword" onsubmit="return checkpass();">
						<div class="col-md-12">

						
							<div class="form-group" style="padding-top: 20px">
								<input type="password" class="form-control" id="passwd" name="passwd" placeholder="New Password" required="true">
							</div>
							
							<div class="form-group" style="padding-top: 20px">
								<input type="password" class="form-control" id="re_passwd" name="re_passwd" placeholder="Confirm Password" required="true">
							</div>
							
						</div>
						
						<div class="col-md-6 text-left">

							<button type="submit" value="submit" name="submit" class="btn primary-btn">Reset</button>
						</div>
						<div class="col-md-6 text-left">
					<a href="signin.php" class="btn primary-btn">Sign in</a>
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