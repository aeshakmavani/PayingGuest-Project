<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

//if today is check out date of any room then it will autometically available for others...and availableroom feild value update here....
$today=date('Y-m-d');
$query=mysqli_query($con, "select * from tblbookpg");
$fivedays_ago = date('Y-m-d', strtotime('-5 days'));

//echo "<script type='text/javascript'>alert('$fivedays_ago');</script>";
while ($row=mysqli_fetch_array($query)) {
	$checkoutdate=$row['CheckoutDate'];
	
	if($checkoutdate>=$today){
		$query2=mysqli_query($con, "select AvailableRooms from tblpg where ID='".$row['Pgid']."'");
          $row1=mysqli_fetch_array($query2);
          $emptyroom=$row1['AvailableRooms'];
          $updateemptyroom=$emptyroom+1;

          $query3=mysqli_query($con,"update tblpg set AvailableRooms='$updateemptyroom' where ID='".$row['Pgid']."'");
          if($query3){
          		//delete record from table payment
          		//$query5=mysqli_query($con, "delete ");
          }else{
            echo "<script type='text/javascript'>alert('Problem in Room Availability Updation.');</script>";
          }
	}elseif (($checkoutdate>=$fivedays_ago) && ($checkoutdate<$today)) {
		//notify to user that make payment for next month if user want to stay otherwise ignore notification
		$query4=mysqli_query($con,"select * from tblpayment");
		while ($row2=mysqli_fetch_array($query4)){
			
		}

	}	
}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>

	<title>Humming House</title>
	<link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
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
	<section class="home-banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen align-items-end justify-content-center">
				<div class="banner-content col-lg-12 col-md-12">
					<h1>Humming House</h1>
					<div class="search-field">
						<form class="search-form" method="post" action="search-result.php">
							<div class="row">
								<div class="col-lg-12 d-flex align-items-center justify-content-center toggle-wrap">
									<div class="row">
										<div class="col">
											<h4 class="search-title">Search Properties PG</h4>
										</div>
									
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<select name="location" class="form-control" required>
<option value="">Choose State</option>
<?php $query=mysqli_query($con,"select * from tblstate");
while($row=mysqli_fetch_array($query))
{
?>    
<option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName'];?></option>
<?php } ?> 
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
									<input type="text" name="pgname" placeholder="Enter Name-of-PG" class="app-select form-control" required>
	
								
								</div>
								<div class="col-lg-3 col-md-6 col-xs-6">
	<button class="primary-btn">Search Properties<span class="lnr lnr-arrow-right"></span></button>
								</div>


							</div>
						</form>
					</div>
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
					<h1>PG Accomodation in Various States or Cities</h1>
					<p>
						Who are in extremely love with eco friendly system.
					</p>
				</div>
			</div>
			
			<div class="row">
				<?php

                    
$ret=mysqli_query($con,"select * from tblpg where IsActive=1 order by rand() limit 9");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	$im=$row['Image'];
	$im1[]=explode(",", $im);
?>
				<div class="col-lg-4">
					<div class="single-property">
						<div class="images">
							<img class="img-fluid mx-auto d-block" src="owner/roomimages/<?php echo $row['Image'];?>" width="400" height="180" alt="">
							<!--<img class="img-fluid mx-auto d-block" src="
							<?php echo $row['Image'];?>" width="400" height="180" alt="">-->
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
								<?php if($row['AvailableRooms']<1){ ?>
										<p><span <span class="rd">Room not available</span></p>
								<?php }else{ ?>
									<a href="pg-details.php?pid=<?php echo $row['ID'];?>"><span class="gr">View Details</span></a>

								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
			</div>
	</section>
	

	<!-- Start About Area -->
	
	<!-- End About Area -->

	<!-- Start city Area -->
	
	<!-- End city Area -->

	<!-- Start testomial Area -->
	
	<!-- End testomial Area -->

	<!-- Start blog Area -->
	
	<!-- End blog Area -->

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