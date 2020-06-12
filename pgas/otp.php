<!DOCTYPE html>
<html lang="zxx" class="no-js">
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
    
    <title>Paying Guest Accomodation System|| User OTP Verification</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/linearicons.css">
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
<?php include('includes/header.php');?>
    <!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex text-center align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <p class="text-white link-nav"><a href="index.php">Home </a>
                        <span class="lnr lnr-arrow-right"></span> <a href="otp.php">
                            OTP Verification</a></p>
                    <h1 class="text-white">
                        OTP Verification
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <p style="text-align: center;color: red;font-size: 30px"><strong>Enter OTP</strong></p>
            <div class="row mt-80">
                <p style="font-size:16px; color:red" align="center"><!-- <?php if($msg){echo $msg;}  ?> --></p>
                <div class="col-lg-12">
                    <form class="row contact_form" action="" method="post" id="">
                        <div class="col-md-12">

                        
                            <div class="form-group">
                                <input type="number" class="form-control" id="email" name="otp" placeholder="Enter OTP" required="true">
                            </div>
<!--                            <div class="form-group">
                                <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Enter Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
                            </div>
-->
                            
                            
                        </div>
                        
                        <div class="col-md-6 text-left">

                            <button type="submit" value="Verify" name="verify" id="verify" class="btn primary-btn">Verify OTP</button>
                        </div>
                        <div class="col-md-6 text-left">
                    
                            <a href="forgot-password.php" class="btn primary-btn">Resend OTP</a>
                    
                        </div>
                    
                        

                    </form>

                    <?php 
                   if(isset($_POST['verify']))
                   {
                        $otp=$_POST['otp'];
                        $sent=$_SESSION['otp'];
                        
                       // $result = mysqli_query($con,"SELECT * FROM otp_expiry WHERE otp='" . $otp . "'");
                       // $count  = mysqli_num_rows($result);
                     
                        
                            if(($otp==$sent))
                            { 
                            ?>
                                <script>
                                    window.location.href = 'reset-password.php';
                                </script>
                            <?php
                               // header("location:reset-password.php");
                               // if(!empty($count))
                               // {
                                   // $result = mysqli_query($con,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $otp . "'");
                                    //$success = 2;
                                    
                               /* }
                                else 
                                {
                                     echo "<p style='color:red;'>OTP Expired!!!!!</p>";
                                }*/
                            }
                            else
                            {
                                
                                echo "<p style='color:red;'>Invalide OTP</p>";
                            }
                        
                   }   
                    
                  ?>
                    
                    
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
