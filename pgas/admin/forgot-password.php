<?php
session_start();
require_once('../EMAIL.php');
error_reporting(0);
include('includes/dbconnection.php');


if(isset($_POST['submit']))
  {
    //$contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tblowner where  Email='$email' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $otp= rand(10000,99999);
                            //$otp="12345";
                            $to=$email;
                            $e=new Email();
                            $from="Humming House";
                            $subject="OTP verification";
                            $message="Your Requested otp is : $otp";
                            
                            if($e->send($from,$subject,$message,$to))
                            {
                              $_SESSION['otp']=$otp;
                                    if($_SESSION['otp']!=NULL)
                                    {
                                        $_SESSION['email']=$email;
                                        header("location:otp.php");
                                    }
                    //            }
                            }
                            else
                            {
                                echo "<p style='color:red;'>OTP Not Sent!!!!!!</p>";
                            }
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<head>
<title>Paying Guest Accomodation System | Forgot </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
  <h2>Forgot Password</h2>
    <form action="#" method="post" name="login">
      <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
      <input type="email" class="ggg" name="email" placeholder="Enter Email Address" required="true">
      <!-- <input class="ggg"  type="text" name="contactno" required="" placeholder="Mobile Number">
      -->
      
      
        <div class="clearfix"></div>
        <input type="submit" value="RESET" name="submit">
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
