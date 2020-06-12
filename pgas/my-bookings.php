<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasuid']==0)) {
  header('location:logout.php');
  } else{
   
  ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Paying Guest Accomodation System|| PG Response</title>

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
							Response of PG Owner</a></p>
					<h1 class="text-white">
						My Bookings
					</h1>

				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start contact-page Area -->
	<section class="contact-page-area section-gap">
		<div class="container">
			<p style="text-align: center;color: red;font-size: 30px"><strong>My Bookings</strong></p>
			<div class="row mt-20">
				
 <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


				<div class="col-lg-12">
					<form class="row contact_form" action="" method="post" id="">
						<div class="col-md-12">

													

							<div class="form-group">

<table width="100%" border="1" style="text-align: center; font-size:18px;"  cellpadding="10">
	<tr>
<th>#</th>
<th>Booking Id</th>
<th>PG Name</th>
<th>Booking Date</th>
<th>Check-in Date</th>
<th>Check- Date</th>
<th>Status</th>
<th>Payment</th>
<th>Payment Status</th>
<th>Action</th>
>
	</tr<?php			
$id=$_SESSION['pgasuid'];
$ret=mysqli_query($con,"select tblbookpg.Id as bookid,tblbookpg.BookingNumber,tblbookpg.BookingDate,tblbookpg.CheckinDate,tblbookpg.CheckoutDate,tblbookpg.Status,tblpg.PGTitle,tblpg.RPmonth from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where Userid='$id'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	?>

<tr>
<td><?php echo $cnt;?></td>	
<td><?php echo $row['BookingNumber'];?></td>
<td><?php echo $row['PGTitle'];?></td>
<td><?php echo $row['BookingDate'];?></td>
<td><?php echo $row['CheckinDate'];?></td>
<td><?php echo $row['CheckoutDate'];?></td>
<td><?php if($row['Status']=="")
{
echo "Not Confiremed Yet";
} else {
echo $row['Status'];
}?></td>
<td><?php echo $row['RPmonth'];?></td>
<td>
	<?php
          $ret1=mysqli_query($con,"select Status from tblpayment  where BookingID='".$row['bookid']."'");
          $row1=mysqli_fetch_array($ret1);
         /* echo "<script>alert('".$bookid."')</script>";*/
         
          echo $row1['Status'];	
        ?>
</td>



<td><a href="booking-details.php?bkid=<?php echo $row['bookid'];?>"> View </a></td>


</tr>
<?php 
$cnt=$cnt+1;
}

?>

</table>
	
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