<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['pgasaid'] = $ret['ID'];
        header('location:dashboard.php');
    } else {
        $msg = "Invalid Details.";
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Humming House || Login </title>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet"> 

    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>

    <style>
        .animated1 {
            -webkit-animation-duration: 1s;
            animation-duration: 1.5s;
            animation-delay: 0.5s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
    </style>

</head>
<body>
    <div class="log-w3">
        <div class="w3layouts-main box animated zoomIn" style="height: 100%;">

            <h2 class="animated1 flipInX">Sign In Now</h2>
            <form action="#" method="post" name="login">
                <p style="font-size:16px; color:red" align="center"> <?php
if ($msg) {
    echo $msg;
}
?> </p>
                <input type="text" class="ggg animated1 flipInX" name="username" placeholder="User Name" required="true">
                <input type="password" class="ggg animated1 flipInX" name="password" placeholder="PASSWORD" required="true">

                <a href="forgot-password.php" class="animated1 flipInX">Forgot Password?</a>
                <div class="clearfix"></div>
                <input type="submit" class="animated1 flipInX" value="Sign In" name="login">
            </form>

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
