
<header class="default-header">
       
<div class="menutop-wrap">
            <div class="menu-top container">
                <div class="d-flex justify-content-end align-items-center">
                    <ul class="list">
                        <li><a href="tel:7574997061">Humming House</a></li>
                        <li><a href="admin/login.php">Admin</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-menu">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="index.php">home</a></li>
                            <li><a href="pg.php">PG</a></li>
                            <li><a href="about-us.php">about</a></li>
                            
                            
                             <?php 
                        if(strlen($_SESSION['pgasuid']==0)) {?> 
                        <li><a href="owner/login.php">Owner</a></li>
                        <li><a href="register.php">login / register</a></li>
                                                <?php } ?>

                            <li><a href="contact.php">Contact</a></li>
                             <?php if (strlen($_SESSION['pgasuid']>0)) {?>
                           <!-- <li><a href="apply-forpg.php">Book Your PG</a></li>-->
                           
                            <li class="menu-has-children"><a href="">My Account</a>
                                <ul>
                                    <li><a href="user-profile.php">My Profile</a></li>
                                    <li><a href="my-bookings.php">My Bookings</a></li>
                                    <li><a href="change-password.php">Change Password</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                        </li>
                           
                        </ul>
                    </nav>
                    <!--######## #nav-menu-container -->
                </div>
            </div>
        </div>
    </header>