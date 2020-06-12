<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>

<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="dashboard.php" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <?php
$adid=$_SESSION['pgasaid'];
$ret=mysqli_query($con,"select AdminName from tbladmin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
                <img alt="" src="images/2.png">
                <span class="username"><?php echo $name; ?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="admin-profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="change-password.php"><i class="fa fa-cog"></i> Change Password</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end--> 
</div>
</header>