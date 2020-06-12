
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilnumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $repass=md5($_POST['repeatpassword']);
    if($password!=$repass){
      $msg="*Password and Repeat Password field does not match";
    }else{

    $ret=mysqli_query($con, "select Email from tblowner where Email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tblowner(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}
}

 ?>


<!DOCTYPE html>
<head>
<title>Humming House || Owner Registration </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">

<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>

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
<div class="reg-w3">
<div class="w3layouts-main animated zoomIn">
    <h2 class="animated flipInX">Register Now</h2>
  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <form action="#" method="post">
      <input type="text" class="ggg animated1 flipInX" name="name" placeholder="NAME" required="true">
      <input type="email" class="ggg animated1 flipInX" name="email" placeholder="E-MAIL" required="true">
      <input type="text" class="ggg animated1 flipInX" name="mobilnumber" placeholder="PHONE" required="true" maxlength="10" pattern="[0-9]+">
      <input type="password" class="ggg animated1 flipInX" name="password" placeholder="PASSWORD" required="true">
      <input type="password" class="ggg animated1 flipInX" name="repeatpassword" placeholder="REPEAT PASSWORD" required="true">
                        <h4 class="animated1 flipInX"><input type="checkbox"  required="true" />I agree to the Terms of Service and Privacy Policy</h4>
      
        <div class="clearfix animated1 flipInX"></div>
        <input type="submit" value="submit" name="submit">
    </form>
        <p class="animated1 flipInX">Already Registered.<a href="login.php" class="animated1 flipInX">Login</a></p>
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
