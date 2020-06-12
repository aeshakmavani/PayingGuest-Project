<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{

?>


<!DOCTYPE html>
<head>
<title>Paying Guest Accomodation System|| Booking Requests</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="table-agile-info">
 <div class="panel panel-default">
    <div class="panel-heading">
  Confirmed Request for Paying Guest
    </div>
    <div>
      <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
        <thead>
          <tr>
            <th data-breakpoints="xs">S.NO</th>
            <th>User Name</th>
            <th>Booking Number</th>
            <th>PG Name</th>
            <th>Checkin Date</th>
            <th>Booking Date</th>
            
            <th data-breakpoints="xs">Action</th>
           
           
          </tr>
        </thead>
        <?php
        $oid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select tblbookpg.ID,tblbookpg.BookingNumber,tblbookpg.CheckinDate,tblbookpg.BookingDate,tblpg.PGTitle,tbluser.FullName from  tblbookpg join tblpg on tblpg.ID=tblbookpg.Pgid join tbluser on tbluser.ID=tblbookpg.Userid where tblpg.OwnerID='$oid' && tblbookpg.Status='Confirmed'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              <td><?php  echo $row['FullName'];?></td>
                  <td><?php  echo $row['BookingNumber'];?></td>
                  <td><?php  echo $row['PGTitle'];?></td>
                  <td><?php  echo $row['CheckinDate'];?></td>
                  <td><?php  echo $row['BookingDate'];?></td>
                  <td><a href="view-requestdetails.php?viewid=<?php echo $row['ID'];?>">View Details</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
            </table>
            
            
          
    </div>
  </div>
</div>
</section>
 <!-- footer -->
     <?php include_once('includes/footer.php');?>  
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
<?php }  ?>