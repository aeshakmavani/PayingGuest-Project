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
    
    <!-- Site Title -->
    <title>PG Accomodation details Details</title>

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
                        <span class="lnr lnr-arrow-right"></span>
                        <a href="particularpg-details.php">
                            My Booking
                        </a>
                        
                        </p>
                    <h1 class="text-white">
                       Booking Details
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!--  Blog Area -->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row mt-80">
                 <?php
 $bookid=intval($_GET['bkid']);
$ret=mysqli_query($con,"select * from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$bookid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img" align="center">
<img src="owner/roomimages/<?php echo $row['Image'];?>" alt="" height='350' width="1000" style="border:#000 solid 2px;" ></div>
 <h2 align="center" style="padding-top:2%"><?php echo $row['PGTitle'];?>'s PG Booking Details</h2>
 </div>
  <div class="col-lg-12 col-md-9 blog_details"> 
<table border="1" class="table table-bordered mg-b-0">
                    
  <tr>
    <th>Booking Id</th>
    <td><?php  echo $row['BookingNumber'];?></td>
     <th>Booking Date</th>
    <td><?php  echo $row['BookingDate'];?></td>
  </tr>   
   <tr>
    <th>Check-in Date</th>
    <td><?php  echo $row['CheckinDate'];?></td>
    <th>Status</th>
    <td><?php if($row['Status']=="")
{
echo "Not Confiremed Yet";
} else {
echo $row['Status'];
}?></td>
  </tr>
  <tr>
    <th>Payment Status</th>
      <td colspan="3"><?php
          $ret1=mysqli_query($con,"select * from tblpayment  where BookingID='$bookid'");
          $row1=mysqli_fetch_array($ret1);
          /*echo "<script>alert('".$bookid."')</script>";*/
         if($row1['Status']=="Pending")
         {
            $ret2=mysqli_query($con, "select * from tblbookpg join tbluser on tblbookpg.Userid=tbluser.ID where tblbookpg.ID='$bookid'");
            $row2=mysqli_fetch_array($ret2);
            if($row2['ID']==NULL){echo "404:User not Found";}else{


        ?>
        
          <a href="payment.php?bkid=<?php echo $row['ID']?>&bknum=<?php  echo $row['BookingNumber'];?>&pay=<?php  echo $row1['Payment'];?>&username=<?php  echo $row2['FullName'];?>&email=<?php  echo $row2['Email'];?>&phoneno=<?php  echo $row2['MobileNumber'];?>&productinfo=<?php  echo $row['PGTitle'];?>"> Pay now <span class="lnr lnr-arrow-right" ></span> </a>
          
<!--
          <button type="button" id="paymentbtn" class="btn btn-primary" >Pay Now<span class="lnr lnr-arrow-right" ></span></button>

          <script type="text/javascript">
              document.getElementById("paymentbtn").onclick = function () {
                  window.location.href = 'payment.php';
                  // window.location.href = "somepage.php?w1=" + hello + "&w2=" + world;
              };
          </script>
-->
<!--          
          <input type="button" id="btnQueryString"  class="btn btn-primary" value="Pay Now" />
          <script type="text/javascript">
              $(function () {
                  $("#btnQueryString").bind("click", function () {
                      var url = 'payment.php';
                      window.location.href = url;
                  });
              });
          </script>
-->
          <?php
          }
          } else {
          echo $row1['Status'];
        }?>
      </td>
  </tr>
  <tr><th>User Remark</th>
    <td colspan="3"><?php  echo $row['UserMsg'];?></td>
      

  </tr>  
   <tr>
       <th>Owner Remark</th>
    <td colspan="3"><?php  echo $row['Remark'];?></td>
  </tr>                 
<tr>
    <th>Owner Remark Date</th>
    <td colspan="3"><?php  echo $row['RemDate'];?></td>
  </tr>
 </table>
 <h2 align="center" style="color:blue">PG Details</h2>
  </div>                     
                     
<div class="col-lg-6 col-md-9 blog_details">
<table border="1" class="table table-bordered mg-b-0">
                    
  <tr>
    <th>State</th>
    <td><?php  echo $row['StateName'];?></td>
  </tr>   
   <tr>
    <th>City</th>
    <td><?php  echo $row['CityName'];?></td>
  </tr>
  <tr>
    <th>Rent Per Month</th>
    <td><?php  echo $row['RPmonth'];?></td>
  </tr>  
   <tr>
    <th>Number of Rooms</th>
    <td><?php  echo $row['norooms'];?></td>
  </tr>                 
<tr>
    <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
  </tr>
 </table>

  <table border="1" class="table table-bordered mg-b-0">
<tr align="center">
<td style="color: red; font-size: 25px" colspan="2">Meals which offer by PG</td>
</tr>  
  <tr>
    <th>Breakfast</th>
    <td><?php  echo $row['MealsBreakfast'];?></td>
  </tr> 
  <tr>
    <th>Lunch</th>
    <td><?php  echo $row['MealLunch'];?></td>
  </tr>
  <tr>
    <th>Dinner</th>
    <td><?php  echo $row['MealDinner'];?></td>
  </tr>                   
   </table>



  </div>

   <div class="col-lg-6 col-md-9 blog_details"> 
    <table border="1" class="table table-bordered mg-b-0">     
<tr align="center">
  <td style="color: red; font-size: 25px" colspan="2">Facilities</td>
</tr>
      <tr>
    <th>Electricity</th>
    <td><?php  echo $row['Electricity'];?></td>
  </tr> 
  <tr>
    <th>Parking</th>
    <td><?php  echo $row['Parking'];?></td>
  </tr> 
  <tr>
    <th>Refregerator</th>
    <td><?php  echo $row['Refregerator'];?></td>
  </tr> 
  <tr>
    <th>Full Furnished</th>
    <td><?php  echo $row['Furnished'];?></td>
  </tr> 
  <tr>
    <th>AC</th>
    <td><?php  echo $row['AC'];?></td>
  </tr> 
  <tr>
    <th>Balcony</th>
    <td><?php  echo $row['Balcony'];?></td>
  </tr> 
  <tr>
    <th>Table/Study Lamp</th>
    <td><?php  echo $row['StudyTable'];?></td>
  </tr> 
  <tr>
    <th>Laundry</th>
    <td><?php  echo $row['Laundry'];?></td>
  </tr>
  <tr>
    <th>Security</th>
    <td><?php  echo $row['Security'];?></td>
  </tr>
  </table>
                  
                  

      <?php } ?>  


                        </div>
                     
                    </div>
                
            
        </div>
    </section>
    <!--  Blog Area -->

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