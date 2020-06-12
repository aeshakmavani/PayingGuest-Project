<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	
	<title>PG Accomodation</title>

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

	<?php include_once('includes/header.php');?>
	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex text-center align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<p class="text-white link-nav"><a href="index.php">Home </a>
						<span class="lnr lnr-arrow-right"></span> <a href="pg.php">
							PG Accomodation</a></p>
					<h1 class="text-white">
						PG Accomodation
					</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start property Area -->
	<section class="property-area section-gap relative" id="property">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-10 header-text">
					<h1>PG Accomodation  Search Result</h1>
					<p>
						Who are in extremely love with eco friendly system.
					</p>
				</div>
			</div>
			
			<div class="row">
				<?php
$state=$_POST['location'];
$pgname=$_POST['pgname'];
                    
$ret=mysqli_query($con,"select * from tblpg where StateName='$state' and PGTitle like '%$pgname%'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="owner/roomimages/<?php echo $row['Image'];?>" width="400" height="180" alt="">
							<span>For PG</span>
						</div>

						<div class="desc">
							<div class="top d-flex justify-content-between">
								<h4><a href="pg-details.php?pid=<?php echo $row['ID'];?>">PG Name: <?php echo $row['PGTitle'];?></a></h4>
								
							</div>


							<div class="middle">
								<div class="d-flex justify-content-start">
									<p>AC: <span class="gr"><?php echo $row['AC'];?></span></p>
									<p>Balcony: <span class="rd"><?php echo $row['Balcony'];?></span></p>
									<p>Laundry: <span class="rd"><?php echo $row['Furnished'];?></span></p>
								</div>
								<div class="d-flex justify-content-start">
									<p>Parking: <span class="gr"><?php echo $row['Parking'];?></span></p>
									<p>Price: <span class="rd"><?php echo $row['RPmonth'];?> P/M</span></p>
									<p>Type: <span class="rd"><?php echo $row['Type'];?></span></p>
								</div>
							</div>
							<div class="bottom d-flex justify-content-start">
								<p><span class="lnr lnr-heart"></span> <?php echo $row['StateName'];?></p>
								<p><span class="lnr lnr-bubble"></span> <?php echo $row['CityName'];?></p>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
			</div>
	</section>
	

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