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

        $query=mysqli_query($con,"update tblowner set Password='$pass'  where  Email='$email'");
    }
    else
    {
        echo "<p style='color:red;'>Both passwords Should be same!!!!</p>";
    }
   if($query)
   {
    echo "<script>alert('Password successfully changed');</script>";
    header("location:login.php");
    unset($_SESSION['email']);
    unset($_SESSION['otp']);
    session_destroy();
   }
  
  }
  ?>


<!DOCTYPE html>
<head>
<title>Paying Guest Accomodation System | Reset Password </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="assets/js/modernizr.min.js"></script>
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
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Recover Password</h2>
		<form action="" method="post" name="changepassword" onsubmit="return checkpass();">
			<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
			<input class="ggg" type="password" required="true" id="passwd" name="passwd" placeholder="New Password">
      <input class="ggg" type="password" name="re_passwd" id="re_passwd" required="true" placeholder="Confirm Your Password">
			
			
			
				<div class="clearfix"></div>
				<input type="submit" value="Reset" name="submit">
		</form>
		<p><a href="login.php">Sign In</a></p>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
