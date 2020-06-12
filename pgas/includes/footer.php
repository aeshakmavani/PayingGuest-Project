<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<?php

                    
$ret=mysqli_query($con,"select * from tblpages where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<h6><?php  echo $row['PageTitle'];?></h6>
						<p>
							<?php  echo $row['PageDescription'];?>
						</p>
					</div>
					<?php } ?>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6" style="">
					<div class="single-footer-widget">
						<?php

                    
$ret=mysqli_query($con,"select * from tblpages where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
						<h6><?php  echo $row['PageTitle'];?></h6>
						<p><?php  echo $row['PageDescription'];?></p>
						<?php } ?>
						
					</div>
				</div>
				

				
				
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
Paying Guest Accomodation System @ 2020 All rights reserved </p>
			</div>
		</div>
	</footer>