<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if(!isset($_SESSION['email']))
    {
        header("location:forgot-password.php");
    }
?>

<head>
<title>Paying Guest Accomodation System | OTP Verification </title>

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
<script src="js/jquery2.0.3.min.js"></script>
</head>

<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>OTP Verification</h2>
        <form action="#" method="post" name="login">
            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
            <input type="number" class="ggg" name="otp" placeholder="Enter OTP" required="true">
      <!-- <input class="ggg"  type="text" name="contactno" required="" placeholder="Mobile Number">
            -->
            
            
                <div class="clearfix"></div>
        <input type="submit" value="Verify OTP" name="verify" id="verify">
        </form>
        <p><a href="forgot-password.php">Resend OTP</a></p>
         <?php 
                   if(isset($_POST['verify']))
                   {
                        $otp=$_POST['otp'];
                        $sent=$_SESSION['otp'];
                        
                            if(($otp==$sent))
                            { 
                            ?>
                                <script>
                                    window.location.href = 'reset-password.php';
                                </script>
                            <?php
                             
                            }
                            else
                            {
                                
                                echo "<p style='color:red;'>Invalide OTP</p>";
                            }
                        
                   }   
                    
                  ?>
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>

</html>
