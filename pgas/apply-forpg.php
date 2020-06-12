<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
	$id=$_POST['id'];
$userid=$_SESSION['pgasuid'];
$chkin=$_POST['chkin'];
$msg=$_POST['message'];
$booknumber=mt_rand(100000000, 999999999);

$query=mysqli_query($con,"insert into tblbookpg(Userid,Pgid,CheckinDate,UserMsg,BookingNumber) values('$userid','$id','$chkin','$msg','$booknumber') ");
if($query)
{
  $msg="Booking detail has been sent to owner.";   
} else {
  $msg="Something Went Wrong. Please try again.";     
}
}


  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>Paying Guest Accomomdation System||Booking</title>

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
						<span class="lnr lnr-arrow-right"></span> <a href="apply-forpg.php">
							Book Your PG</a></p>
					<h1 class="text-white">
						Book Your PG
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>Book Your PG</strong></p>
			<div class="row mt-80">
				
				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?></p>
						<div class="col-md-12">


<div class="form-group">
							<p style="font-size: 18px;color: black">Check In Date: <input type="date" class="form-control" id="chkin" name="chkin" required="true"></p>
							</div>

							<div class="form-group">
								 <select class="form-control m-bot15" name="id" id="id" required="true">
                                <option value="">Choose PG</option>
                                <?php $query=mysqli_query($con,"select * from tblpg");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['PGTitle'];?></option>
                  <?php } ?> 
                            </select>
							</div>

							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" required="true"></textarea>
							</div>
						</div>
						
						<div class="col-md-12 text-center">
							<button type="submit" value="submit" class="btn primary-btn" name="submit">Submit</button>
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
<?php } ?>