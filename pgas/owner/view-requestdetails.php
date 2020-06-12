<?php  
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{

    if(isset($_POST['submit']))
  {
    
    $vid=$_GET['viewid'];
    $ressta=$_POST['status'];
    $remark=$_POST['remark'];
 
    
      
   $query=mysqli_query($con, "update  tblbookpg set Remark='$remark', Status='$ressta' where ID='$vid'");
    if ($query) {
    $msg="Owner Remark has been updated.";
    if($ressta=="Confirmed"){
          $ret1=mysqli_query($con,"select tblbookpg.Id as bookid,tblbookpg.Userid,tblbookpg.BookingNumber,tblbookpg.Pgid,tblpg.RPmonth from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$vid'");
          $row=mysqli_fetch_array($ret1);

          //room manage functionality...<start>
          $query2=mysqli_query($con, "select AvailableRooms from tblpg where ID='".$row['Pgid']."'");
          $row1=mysqli_fetch_array($query2);
          $emptyroom=$row1['AvailableRooms'];
          $updateemptyroom=$emptyroom-1;

          $query3=mysqli_query($con,"update tblpg set AvailableRooms='$updateemptyroom' where ID='".$row['Pgid']."'");
          if($query3){

          }else{
            $msg="Problem in Room Availability Updation.";
          }
          //echo "<script>alert('$updateemptyroom');</script>";
          //<end> room manage

          $query1=mysqli_query($con, "INSERT INTO tblpayment(Userid,Pgid,BookingId,PBookingNumber,Payment,Status) values('".$row['Userid']."','".$row['Pgid']."','".$row['bookid']."','".$row['BookingNumber']."','".$row['RPmonth']."','Pending')");
          
          /*echo "<script>alert('".$row['Pgid']."')</script>";*/
          if($query1)
          {
            $msg="Make Sure Your payment done before CheckIn Date";
          }
          else
          {
            $msg="Something Went Wrong. Please try again MKAE SURRE";
          }
      }
      else{
        $msg="Something Went Wrong. Please try again CONFORM";
      }
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

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
    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <div class="panel-heading">
     Paying Guest Details
    </div>
    <div>
<?php
        
        $vid=$_GET['viewid'];
        $oid=$_SESSION['pgasoid'];
$ret=mysqli_query($con,"select tblbookpg.BookingNumber, tblbookpg.CheckinDate,tblbookpg.UserMsg,tblbookpg.Remark, tblbookpg.Status,tblbookpg.RemDate,tblpg.PGTitle,tblpg.StateName,tblpg.CityName,tbluser.FullName,tbluser.Email,tbluser.MobileNumber from tbluser left join tblbookpg on tblbookpg.Userid=tbluser.ID left join tblpg on tblbookpg.Pgid=tblpg.ID where tblbookpg.ID='$vid'");

while ($row=mysqli_fetch_array($ret)) {

?>

      <table border="1" class="table table-bordered mg-b-0">
        
  <tr>
    <th>Booking Number </th>
    <td><?php  echo $row['BookingNumber'];?></td>
  </tr>
   <tr>
    <th>Checkin Date</th>
    <td><?php  echo $row['CheckinDate'];?></td>
  </tr>
<tr>
    <th>Message</th>
    <td><?php  echo $row['UserMsg'];?></td>
  </tr>

<tr>
    <th>Name Of PG</th>
    <td><?php  echo $row['PGTitle'];?></td>
  </tr>

  <tr>
    <th>State</th>
    <td><?php  echo $row['StateName'];?></td>
  </tr>



<tr>
    <th>City Name</th>
    <td><?php echo $row['CityName']; ?></td>
  </tr>


<tr>
<th>Full Name</th>
<td>
<?php echo $row['FullName']; ?>
  </td>
  </tr>
  <tr>
<th>Email</th>
<td>
<?php echo $row['Email']; ?>
  </td>
  </tr>
  <tr>
<th>Mobile Number</th>
<td>
<?php echo $row['MobileNumber']; ?>
  </td>
  </tr>
<tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Confirmed Yet";
}
else
{
  echo $row['Status'];
}

     ;?></td>
  </tr>
  </table>
  <table border="1" class="table table-bordered mg-b-0">
<?php if($row['Status']==""){ ?>
<form method="post" name="submit">
<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="remark" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>
  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Cancelled" selected="true">Cancelled</option>
     <option value="Confirmed">Confirmed</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Update</button></td>
  </tr>
  </form>
<?php } else { ?>

<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>


<tr>
<th>Remark date</th>
<td>
<?php echo $row['RemDate']; ?>
  </td>
  </tr>

 

<?php } ?>

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
<?php }  ?>



<!--
      if($ressta=="Confirmed"){
          $ret1=mysqli_query($con,"select tblbookpg.Id as bookid,tblbookpg.Userid,tblbookpg.BookingNumber,tblpg.RPmonth from tblbookpg join tblpg on tblpg.id=tblbookpg.Pgid where tblbookpg.ID='$vid'");
          $row=mysqli_fetch_array($ret1);

          $query1=mysqli_query($con, "INSERT INTO tblpayment(Userid,Pgid,BookingId,Payment,Status) values('".$row['Userid']."','".$row['Pgid']."','".$row['BookingNumber']."','".$row['RPmonth']."','Panding')");

          if($query1)
          {
            $msg="Make Sure Your payment done before CheckIn Date";
          }
          else
          {
            $msg="Something Went Wrong. Please try again";
          }
      }
      else{
        $msg="Something Went Wrong. Please try again";
      }
      -->
  