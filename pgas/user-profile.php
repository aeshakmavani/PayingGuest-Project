<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['pgasuid'];
    $fullname=$_POST['fullname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $fathername=$_POST['fathername'];
  $dob=$_POST['dob'];
  $comaddress=$_POST['comaddress'];
    $emergencynumber=$_POST['emergencynumber'];

     $query=mysqli_query($con, "update tbluser set FullName ='$fullname', Email='$email', MobileNumber='$mobno',FatherName='$fathername',dob='$dob',ComAddress='$comaddress',EmergencyNumber='$emergencynumber' where ID='$uid'");
    if ($query) {
    $msg="User profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>Paying Guest Accomodation System|| User Profile</title>

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
						<span class="lnr lnr-arrow-right"></span> <a href="user-profile.php">
							User Profile</a></p>
					<h1 class="text-white">
						User Profile
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>User Profile</strong></p>
			<div class="row mt-10">
				
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				<?php
$uid=$_SESSION['pgasuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="">
						<div class="col-md-12">

			<div class="form-group">
						<h4 style="color:blue">Welcome Back:  <?php  echo $row['FullName'];?></h4>
							</div>	
<div class="form-group">
<b>Reg. Date:</b>  <?php  echo $row['RegDate'];?>
</div>	


<?php if($row['LastUpdationDate']!=""){ ?>			
<div class="form-group">
<b>Last Updation Date:</b>  <?php  echo $row['LastUpdationDate'];?>
</div>						
<?php } ?>
							<div class="form-group">
								<input type="text" class="form-control" id="fullname" name="fullname" value="<?php  echo $row['FullName'];?>">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['Email'];?>" readonly="true">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="fathername" name="fathername" placeholder="Father Name" required="true" value="<?php  echo $row['FatherName'];?>">
							</div>
							<div class="form-group">
								<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required='true' value="<?php  echo $row['dob'];?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="comaddress" name="comaddress" placeholder="Communication Address" required='true' value="<?php  echo $row['ComAddress'];?>">
							</div>
						<div class="form-group">
								<input type="text" class="form-control" id="emergencynumber" name="emergencynumber" placeholder="Emergency Number" required='true' maxlength="10" pattern="[0-9]+" value="<?php  echo $row['EmergencyNumber'];?>">
							</div>
						</div>
						<?php } ?>
						<div class="col-md-12 text-center">
							<button type="submit" value="submit" name='submit' class="btn primary-btn">Update</button>
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
<?php }  ?>