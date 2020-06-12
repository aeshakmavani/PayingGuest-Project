<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $ownerid=$_SESSION['pgasoid'];
    $statename=$_POST['state'];
    $cityname=$_POST['city'];
    
    $pgname=$_POST['pgname'];
    $typepg=$_POST['typepg'];
    $rpmonth=$_POST['rpmonth'];
    $norooms=$_POST['norooms'];
    $address=$_POST['address'];
    $roomimages=$_POST['roomimages'];
    $electricity=$_POST['electricity'];

    $parking=$_POST['parking'];
    $ref=$_POST['refregerator'];
    $furnished=$_POST['furnished'];
    $ac=$_POST['ac'];
    $balcony=$_POST['balcony'];
    $table=$_POST['table'];
    $laundry=$_POST['laundry'];
    $security=$_POST['security'];
     $breakfast=$_POST['breakfast'];
      $lunch=$_POST['lunch'];
     $dinner=$_POST['dinner'];

     $pgpic=$_FILES["roomimages"]["name"];
     $extension = substr($pgpic,strlen($pgpic)-4,strlen($pgpic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//r
    $roomactive=1;
$roompic=$pgpic.$extension;
     move_uploaded_file($_FILES["roomimages"]["tmp_name"],"roomimages/".$roompic);
    $query=mysqli_query($con, "insert into tblpg(OwnerID,StateName, CityName, PGTitle, Type, RPmonth,norooms,AvailableRooms,Address,Electricity,Parking,Refregerator,Furnished,AC,Balcony,StudyTable,Laundry,Security,MealsBreakfast,MealLunch,MealDinner,IsActive,Image) value('$ownerid','$statename','$cityname','$pgname','$typepg','$rpmonth','$norooms','$norooms','$address','$electricity','$parking','$ref','$furnished','$ac','$balcony','$table','$laundry','$security','$breakfast','$lunch','$dinner','$roomactive','$roompic')");
    if ($query) {
    $msg="PG details has been submitted.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }
}
  ?>
<!DOCTYPE html>
<head>
<title>Humming House || PG Form </title>

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

<script>
function getCity(val) { 
  $.ajax({
type:"POST",
url:"get-city.php",
data:'sateid='+val,
success:function(data){
$("#city").html(data);
}});
}
 </script>

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
    <div class="form-w3layouts">
    
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                List Your PG
            </header>
            <div class="panel-body">
                <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">PG Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="pgname" class="form-control" required="true">
                        </div>
                    </div>
               

   <div class="form-group">
<label class="col-sm-3 control-label">Type of PG:</label>
<div class="col-sm-6">
<input type="radio" name="typepg" id="typepg" value="Boys" checked="true">
 Boys
<input type="radio" name="typepg" id="typepg" value="Girls">
Girls
<input type="radio" name="typepg" id="typepg" value="Both">
Both
</div>
                            </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose State</label>
                        <div class="col-lg-6">
                            <select class="form-control m-bot15" name="state" id="state" onChange="getCity(this.value);">
                                <option value="">Choose State</option>
                                <?php $query=mysqli_query($con,"select * from tblstate");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName'];?></option>
                  <?php } ?> 
                            </select>

                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose City</label>
                        <div class="col-lg-6">
                            <select class="form-control m-bot15" name="city" id="city" required="true">
              
                            </select>

                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rent Per Month</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="rpmonth" name="rpmonth" type="text" required="true" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Number of Rooms</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="norooms" id="norooms" required="true" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="address" id="address" value="" required="true"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <input type="file" class="form-control" name="roomimages" id="roomimages" value="">
                        </div>
                    </div>
                    <hr />
                    <div class="form-group has-success">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="text-align: center; color: red">Facilities</label>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Electricity</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="electricity" name="electricity" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="electricity" name="electricity" value="No"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Parking</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="parking" name="parking" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="parking" name="parking" value="No" required="true"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Refregerator</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="refregerator" name="refregerator" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="refregerator" name="refregerator" value="No"> No
                            </label>
                          </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Full Furnished</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="furnished" name="furnished" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="furnished" name="furnished" value="No"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">AC</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="ac" name="ac" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="ac" name="ac" value="No"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Balcony</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="balcony" name="balcony" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="balcony" name="balcony" value="No"> No
                            </label>
                          </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Table/Study Lamp</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="table" name="table" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="table" name="table" value="No"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Laundry</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="laundry" name="laundry" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="laundry" name="laundry" value="No"> No
                            </label>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Security</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="radio" id="security" name="security" value="Yes" required="true"> Yes
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" id="security" name="security" value="No"> No
                            </label>
                          </div>
                    </div>
                    <hr />
                    <div class="form-group has-success">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="text-align: center; color: red">Meals</label>
                        
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose meals which you offer with PG</label>
                        <div class="col-lg-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="breakfast" name="breakfast" value="Yes"> Breakfast
                            </label>
                            <label class="checkbox-inline">
                                 <input type="checkbox" id="lunch" name="lunch" value="Yes"> Lunch
                            </label>
                            <label class="checkbox-inline">
                                 <input type="checkbox" id="dinner" name="dinner" value="Yes"> Dinner
                            </label>

                        </div>
                    </div>

                    <hr />
<div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                    </div>
                                </div>

                </form>
            </div>
        </section>



        <!-- page end-->
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
<?php  } ?>
